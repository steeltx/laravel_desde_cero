<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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

    /**
     * Mostrar todos los registros
     */
    public function index()
    {
        return view('products.index')->with([
            'products' =>  Product::all()
        ]);
    }

    /**
     * Formulario para crear un registro
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Guardar un registro
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess('Producto creado correctamente');
    }

    /**
     * Mostrar un registro
     */
    public function show(Product $product)
    {
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    /**
     * Formulario editar registro
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with([
            'product' => $product
        ]);
    }

    /**
     * Actualizar registro
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess('Producto editado correctamente');
    }

    /**
     * Eliminar registro
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess('Producto eliminado correctamente');
    }
}
