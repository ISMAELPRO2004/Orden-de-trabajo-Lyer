@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Vehículo</h1>

    <form action="{{ route('vehiculos.update', $vehiculo->id_vehiculo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Placa</label>
            <input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}" required>
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <select name="id_marca" class="form-control" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}" {{ $vehiculo->id_marca == $marca->id_marca ? 'selected' : '' }}>
                        {{ $marca->marca }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
