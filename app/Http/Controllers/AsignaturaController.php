<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();

        return response()->json([
            'asignaturas' => $asignaturas
        ]);
    }

    public function show($id)
    {
        $asignatura = Asignatura::findOrFail($id);

        return response()->json([
            'asignatura' => $asignatura
        ]);
    }

    public function store(Request $request)
    {
        $asignatura = Asignatura::create($request->all());

        return response()->json([
            'asignatura' => $asignatura
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->update($request->all());

        return response()->json([
            'asignatura' => $asignatura
        ], 200);
    }

    public function destroy($id)
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->delete();

        return response()->json(null, 204);
    }
}