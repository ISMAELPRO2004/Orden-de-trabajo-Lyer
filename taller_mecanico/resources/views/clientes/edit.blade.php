@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ $cliente->nombres }}" required>
        </div>
        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $cliente->apellidos }}" required>
        </div>
        <div class="mb-3">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ $cliente->celular }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
