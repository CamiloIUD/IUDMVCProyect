<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();
        return response()->json($asignaturas);
    }

    public function show($id)
    {
        $asignatura = Asignatura::find($id);
        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }
        return response()->json($asignatura);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'creditos' => 'required|integer',
            'docente' => 'required|string',
            'prerrequisito' => 'nullable|string',
            'horas_autonomas' => 'required|integer',
            'horas_dirigidas' => 'required|integer'
        ]);

        $asignatura = new Asignatura([
            'nombre' => $request->nombre,
            'creditos' => $request->creditos,
            'docente' => $request->docente,
            'prerrequisito' => $request->prerrequisito,
            'horas_autonomas' => $request->horas_autonomas,
            'horas_dirigidas' => $request->horas_dirigidas
        ]);

        $asignatura->save();

        return response()->json($asignatura, 201);
    }

    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);
        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'required|string',
            'creditos' => 'required|integer',
            'docente' => 'required|string',
            'prerrequisito' => 'nullable|string',
            'horas_autonomas' => 'required|integer',
            'horas_dirigidas' => 'required|integer'
        ]);

        $asignatura->nombre = $request->nombre;
        $asignatura->creditos = $request->creditos;
        $asignatura->docente = $request->docente;
        $asignatura->prerrequisito = $request->prerrequisito;
        $asignatura->horas_autonomas = $request->horas_autonomas;
        $asignatura->horas_dirigidas = $request->horas_dirigidas;

        $asignatura->save();

        return response()->json($asignatura);
    }

    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);
        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }

        $asignatura->delete();

        return response()->json(['message' => 'Asignatura eliminada correctamente']);
    }

}