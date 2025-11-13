<?php

namespace App\Http\Controllers;

use App\Models\OrdenTrabajo;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\EstadoOrden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenTrabajoController extends Controller
{
    public function index()
    {
        $ordenes = OrdenTrabajo::with(['cliente', 'vehiculo', 'estado'])->get();
        return view('ordenes.index', compact('ordenes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::all();
        $estados = EstadoOrden::all();
        return view('ordenes.create', compact('clientes', 'vehiculos', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_creacion' => 'required|date',
            'numero_orden' => 'required|integer|unique:orden_trabajo,numero_orden',
            'id_cliente' => 'required|exists:cliente,id_cliente',
            'id_vehiculo' => 'required|exists:vehiculo,id_vehiculo',
            'id_estado_orden' => 'required|exists:estado_orden,id_estado_orden',
        ]);

        OrdenTrabajo::create([
            'fecha_creacion' => $request->fecha_creacion,
            'numero_orden' => $request->numero_orden,
            'subtotal_repuestos' => 0,
            'subtotal_servicios' => 0,
            'subtotal_terceros' => 0,
            'precio_total' => 0,
            'kilometraje_entrada' => $request->kilometraje_entrada,
            'horometraje_entrada' => $request->horometraje_entrada,
            'id_estado_orden' => $request->id_estado_orden,
            'id_cliente' => $request->id_cliente,
            'id_vehiculo' => $request->id_vehiculo,
            'id_usuario_creador' => Auth::id(),
            'id_usuario_responsable' => Auth::id(),
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Orden registrada correctamente.');
    }

    public function destroy($id)
    {
        $orden = OrdenTrabajo::findOrFail($id);
        $orden->delete();

        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada.');
    }
}
