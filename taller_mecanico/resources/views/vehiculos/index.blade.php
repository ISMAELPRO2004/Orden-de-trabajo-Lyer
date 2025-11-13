@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vehículos</h1>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary mb-3">➕ Nuevo Vehículo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id_vehiculo }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->marca->marca ?? 'Sin marca' }}</td>
                    <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id_vehiculo) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo->id_vehiculo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
