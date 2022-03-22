<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        //$products = Product::all();
        //$products = DB::table('products')->get();

        return view('products.index')->with([
            'products' =>  Product::all()
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' => 'required|in:available,unavailable',

        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0){
            // se puede enviar con withErrors
            //session()->flash('error','Si es producto esta disponible debe tener stock');
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('Si es producto esta disponible debe tener stock');
        }

        $product = Product::create(request()->all());

        session()->flash('success','Producto creado correctamente');

        // return redirect()->back();
        return redirect()
            ->route('products.index')
            ->withSuccess('Producto creado correctamente');
    }

    public function show($product){

        $product = Product::findOrFail($product);
        //$product = DB::table('products')->find($product);

        return view('products.show')->with([
            'product' => $product,
        ]);

    }

    public function edit($product){
        return view('products.edit')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function update($product){

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' => 'required|in:available,unavailable',

        ];

        request()->validate($rules);

        $product = Product::findOrFail($product);
        $product->update(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess('Producto editado correctamente');
    }

    public function destroy($product){
        $product = Product::findOrFail($product);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess('Producto eliminado correctamente');
    }

}
