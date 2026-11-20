
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mis Calificaciones')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #243447;
            color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
        }

        .container {
            width: 85%;
            max-width: 1100px;
            margin: 40px auto;
            min-height: 65vh;
        }

        h1 {
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 9px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        textarea {
            min-height: 100px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #edf1f5;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #777;
        }

        @media(max-width: 650px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .container {
                width: 94%;
            }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <a href="{{ route('subjects.index') }}" class="logo">
            MY GRADES
        </a>

        <nav>
            <a href="{{ route('subjects.index') }}">Materias</a>
            <a href="{{ route('subjects.create') }}">+ Nueva materia</a>
        </nav>
    </header>

    <main class="container">

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

    <footer>
        Sistema de Calificaciones | Homework 7 - Laravel
    </footer>

</body>
</html>
