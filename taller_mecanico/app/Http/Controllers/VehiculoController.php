<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\MarcaVehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('marca')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $marcas = MarcaVehiculo::all();
        return view('vehiculos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculo,placa',
            'id_marca' => 'required|exists:marca_vehiculo,id_marca',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado correctamente.');
    }

    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $marcas = MarcaVehiculo::all();
        return view('vehiculos.edit', compact('vehiculo', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'placa' => 'required|string|max:20|unique:vehiculo,placa,' . $id . ',id_vehiculo',
            'id_marca' => 'required|exists:marca_vehiculo,id_marca',
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
