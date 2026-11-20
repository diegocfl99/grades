@extends('layouts.app')

@section('title', 'Agregar materia')

@section('content')

    <h1>Agregar nueva materia</h1>
    <p class="subtitle">Ingresa los datos de la materia que deseas registrar.</p>

    <div class="card">

        <form action="{{ route('subjects.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Nombre de la materia</label>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre') }}"
                       placeholder="Ej. Desarrollo Web"
                       required>

                @error('nombre')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Nombre del profesor (opcional)</label>

                <input type="text"
                       name="profesor"
                       value="{{ old('profesor') }}"
                       placeholder="Ej. Juan Pérez">

                @error('profesor')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar materia
            </button>

            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

@endsection
