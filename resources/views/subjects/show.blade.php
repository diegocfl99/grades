
@extends('layouts.app')

@section('title', $subject->nombre)

@section('content')

    <h1>{{ $subject->nombre }}</h1>

    <p class="subtitle">
        Profesor: {{ $subject->profesor ?? 'No especificado' }}
    </p>

    <div style="margin-bottom: 20px;">

        <a href="{{ route('activities.create', $subject->id) }}"
           class="btn btn-primary">
            + Agregar actividad
        </a>

        <a href="{{ route('subjects.index') }}"
           class="btn btn-secondary">
            Volver a materias
        </a>

    </div>

    <div class="card">

        <h2>Calificaciones</h2>

        <p style="color: #777; margin: 10px 0 20px;">
            Actividades evaluables de esta materia.
        </p>

        @if($subject->activities->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Calificación</th>
                        <th>Fecha</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($subject->activities as $activity)

                        <tr>
                            <td>{{ $activity->tipo }}</td>

                            <td>{{ $activity->calificacion }}</td>

                            <td>{{ $activity->fecha }}</td>

                            <td>{{ $activity->observaciones ?? 'Sin observaciones' }}</td>

                            <td>

                                <a href="{{ route('activities.edit', $activity->id) }}"
                                   class="btn btn-secondary">
                                    Editar
                                </a>

                                <form action="{{ route('activities.destroy', $activity->id) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('¿Deseas eliminar esta actividad?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>

                                </form>

                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <p>No hay actividades registradas para esta materia.</p>

        @endif

    </div>

@endsection
