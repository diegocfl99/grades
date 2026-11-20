
@extends('layouts.app')

@section('title', 'Editar actividad')

@section('content')

    <h1>Editar actividad</h1>

    <p class="subtitle">
        Materia: {{ $activity->subject->nombre }}
    </p>

    <div class="card">

        <form action="{{ route('activities.update', $activity->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tipo de actividad</label>

                <select name="tipo" required>
                    @foreach(['Tarea', 'Actividad', 'Quiz', 'Examen parcial', 'Proyecto', 'Examen final', 'Otra'] as $tipo)
                        <option value="{{ $tipo }}"
                            {{ old('tipo', $activity->tipo) == $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
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
                       value="{{ old('calificacion', $activity->calificacion) }}"
                       required>

                @error('calificacion')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Fecha de evaluación</label>

                <input type="date"
                       name="fecha"
                       value="{{ old('fecha', $activity->fecha) }}"
                       required>

                @error('fecha')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Observaciones (opcional)</label>

                <textarea name="observaciones">{{ old('observaciones', $activity->observaciones) }}</textarea>

                @error('observaciones')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar actividad
            </button>

            <a href="{{ route('subjects.show', $activity->subject_id) }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

@endsection
