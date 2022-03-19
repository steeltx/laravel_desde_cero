<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return 'Lista de productos';
    }

    public function create(){
        return 'Formulario crear producto';
    }

    public function store(){
        //
    }

    public function show($product){
        return "Mostrar producto con id : ${product} ";
    }

    public function edit($product){
        return "Mostrar el formulario para editar el producto : ${product} ";
    }

    public function update($product){

    }

    public function destroy($product){

    }

}
