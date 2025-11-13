@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
