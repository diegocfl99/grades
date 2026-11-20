<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Subject;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Mostrar formulario para registrar actividad
    public function create($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);

        return view('activities.create', compact('subject'));
    }

    // Guardar nueva actividad
    public function store(Request $request, $subject_id)
    {
        $request->validate([
            'tipo' => 'required|max:100',
            'calificacion' => 'required|numeric|min:0|max:100',
            'fecha' => 'required|date',
            'observaciones' => 'nullable'
        ]);

        $subject = Subject::findOrFail($subject_id);

        $subject->activities()->create([
            'tipo' => $request->tipo,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
            'observaciones' => $request->observaciones
        ]);

        return redirect()->route('subjects.show', $subject_id)
            ->with('success', 'Actividad registrada correctamente.');
    }

    // Mostrar formulario para editar actividad
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        return view('activities.edit', compact('activity'));
    }

    // Actualizar actividad
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|max:100',
            'calificacion' => 'required|numeric|min:0|max:100',
            'fecha' => 'required|date',
            'observaciones' => 'nullable'
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update($request->only([
            'tipo',
            'calificacion',
            'fecha',
            'observaciones'
        ]));

        return redirect()->route('subjects.show', $activity->subject_id)
            ->with('success', 'Actividad actualizada correctamente.');
    }

    // Eliminar actividad
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $subject_id = $activity->subject_id;

        $activity->delete();

        return redirect()->route('subjects.show', $subject_id)
            ->with('success', 'Actividad eliminada correctamente.');
    }
}
