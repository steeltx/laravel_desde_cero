@extends('layouts.master')

@section('content')
    <h1>Crear un producto</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-row">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-row">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" name="description" required>
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input type="number" min="1.00" step="0.01" class="form-control" name="price" required>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" class="form-control" name="stock" required>
        </div>
        <div class="form-row">
            <label for="status">Estado</label>
            <select name="status" class="custom-select" required>
                <option value="" selected> - Seleccione - </option>
                <option value="available">Disponible</option>
                <option value="unavailable">No Disponible</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Crear un producto</button>
        </div>
    </form>


@endsection