@extends('layouts.app')

@section('title', 'Mis materias')

@section('content')

    <h1>Mis materias</h1>
    <p class="subtitle">Administra tus materias y consulta tus calificaciones.</p>

    <a href="{{ route('subjects.create') }}" class="btn btn-primary">
        + Agregar materia
    </a>

    <div style="margin-top: 25px;">

        @forelse($subjects as $subject)

            <div class="card">

                <h2>{{ $subject->nombre }}</h2>

                <p style="color: #777; margin: 10px 0;">
                    Profesor: {{ $subject->profesor ?? 'No especificado' }}
                </p>

                <div style="margin-top: 15px;">

                    <a href="{{ route('subjects.show', $subject->id) }}"
                       class="btn btn-primary">
                        Ver calificaciones
                    </a>

                    <a href="{{ route('subjects.edit', $subject->id) }}"
                       class="btn btn-secondary">
                        Editar
                    </a>

                    <form action="{{ route('subjects.destroy', $subject->id) }}"
                          method="POST"
                          style="display: inline;"
                          onsubmit="return confirm('¿Estás seguro de eliminar esta materia?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="card">
                <h3>No hay materias registradas</h3>
                <p style="margin-top: 10px; color: #777;">
                    Comienza agregando tu primera materia.
                </p>
            </div>

        @endforelse

    </div>

@endsection
