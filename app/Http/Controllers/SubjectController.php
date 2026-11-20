<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Mostrar todas las materias
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    // Mostrar formulario para crear materia
    public function create()
    {
        return view('subjects.create');
    }

    // Guardar nueva materia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:100',
            'profesor' => 'nullable|max:100'
        ]);

        Subject::create($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Materia registrada correctamente.');
    }

    // Mostrar materia y sus actividades
    public function show($id)
    {
        $subject = Subject::with('activities')->findOrFail($id);

        return view('subjects.show', compact('subject'));
    }

    // Mostrar formulario para editar
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subjects.edit', compact('subject'));
    }

    // Actualizar materia
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:100',
            'profesor' => 'nullable|max:100'
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validatedData);

        return redirect()->route('subjects.index')
            ->with('success', 'Materia actualizada correctamente.');
    }

    // Eliminar materia
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Materia eliminada correctamente.');
    }
}
