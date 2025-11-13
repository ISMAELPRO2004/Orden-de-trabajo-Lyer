@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Vehículo</h1>

    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <select name="id_marca" class="form-control" required>
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}">{{ $marca->marca }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
