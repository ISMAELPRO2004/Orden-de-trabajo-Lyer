@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Orden de Trabajo</h1>

    <form action="{{ route('ordenes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="fecha_creacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Número de Orden</label>
            <input type="number" name="numero_orden" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Cliente</label>
            <select name="id_cliente" class="form-control" required>
                <option value="">Seleccione cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombres }} {{ $cliente->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Vehículo</label>
            <select name="id_vehiculo" class="form-control" required>
                <option value="">Seleccione vehículo</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id_vehiculo }}">{{ $vehiculo->placa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="id_estado_orden" class="form-control" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id_estado_orden }}">{{ $estado->estado }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Kilometraje</label>
            <input type="number" name="kilometraje_entrada" class="form-control">
        </div>

        <div class="mb-3">
            <label>Horometraje</label>
            <input type="number" name="horometraje_entrada" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
