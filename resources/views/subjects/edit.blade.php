@extends('layouts.app')

@section('title', 'Editar materia')

@section('content')

    <h1>Editar materia</h1>
    <p class="subtitle">Modifica la información de esta materia.</p>

    <div class="card">

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre de la materia</label>

                <input type="text"
                       name="nombre"
                       value="{{ old('nombre', $subject->nombre) }}"
                       required>

                @error('nombre')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Nombre del profesor</label>

                <input type="text"
                       name="profesor"
                       value="{{ old('profesor', $subject->profesor) }}">

                @error('profesor')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Actualizar materia
            </button>

            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

@endsection
