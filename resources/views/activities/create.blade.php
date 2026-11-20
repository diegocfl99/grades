
@extends('layouts.app')

@section('title', 'Nueva actividad')

@section('content')

    <h1>Agregar actividad evaluable</h1>

    <p class="subtitle">
        Materia: {{ $subject->nombre }}
    </p>

    <div class="card">

        <form action="{{ route('activities.store', $subject->id) }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Tipo de actividad</label>

                <select name="tipo" required>
                    <option value="">Selecciona una actividad</option>
                    <option value="Tarea">Tarea</option>
                    <option value="Actividad">Actividad</option>
                    <option value="Quiz">Quiz</option>
                    <option value="Examen parcial">Examen parcial</option>
                    <option value="Proyecto">Proyecto</option>
                    <option value="Examen final">Examen final</option>
                    <option value="Otra">Otra</option>
                </select>

                @error('tipo')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Calificación (0 a 100)</label>

                <input type="number"
                       name="calificacion"
                       min="0"
                       max="100"
                       step="0.01"
                       value="{{ old('calificacion') }}"
                       required>

                @error('calificacion')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Fecha de evaluación</label>

                <input type="date"
                       name="fecha"
                       value="{{ old('fecha') }}"
                       required>

                @error('fecha')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Observaciones (opcional)</label>

                <textarea name="observaciones"
                          placeholder="Agrega información adicional...">{{ old('observaciones') }}</textarea>

                @error('observaciones')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar actividad
            </button>

            <a href="{{ route('subjects.show', $subject->id) }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

@endsection
