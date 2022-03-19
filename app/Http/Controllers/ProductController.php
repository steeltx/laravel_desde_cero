<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function create(){
        return 'Formulario crear producto';
    }

    public function store(){
        //
    }

    public function show($product){
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
