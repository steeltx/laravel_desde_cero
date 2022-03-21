<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        //$products = DB::table('products')->get();

        return view('products.index');
    }

    public function create(){
        return 'Formulario crear producto';
    }

    public function store(){
        //
    }

    public function show($product){

        $product = Product::findOrFail($product);
        //$product = DB::table('products')->find($product);

        return view('products.show');

    }

    public function edit($product){
        return "Mostrar el formulario para editar el producto : ${product} ";
    }

    public function update($product){

    }

    public function destroy($product){

    }

}
