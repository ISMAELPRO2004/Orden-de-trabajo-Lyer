@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Órdenes de Trabajo</h1>
    <a href="{{ route('ordenes.create') }}" class="btn btn-primary mb-3">➕ Nueva Orden</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N° Orden</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Estado</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordenes as $orden)
                <tr>
                    <td>{{ $orden->numero_orden }}</td>
                    <td>{{ $orden->cliente->nombres ?? 'Sin cliente' }}</td>
                    <td>{{ $orden->vehiculo->placa ?? 'Sin vehículo' }}</td>
                    <td>{{ $orden->estado->estado ?? 'Pendiente' }}</td>
                    <td>S/ {{ number_format($orden->precio_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
