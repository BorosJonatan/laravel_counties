<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counties App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f5f5f5;
            color: #222;
        }

        header {
            background: #1f2937;
            color: white;
            padding: 1rem 2rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1rem;
            margin: 0;
            padding: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .button,
        button {
            display: inline-block;
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 8px;
            padding: 0.7rem 1rem;
            text-decoration: none;
            cursor: pointer;
        }

        .button.secondary {
            background: #6b7280;
        }

        .button.danger,
        button.danger {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 0.9rem;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            vertical-align: top;
        }

        form.inline {
            display: inline;
        }

        label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        textarea {
            min-height: 120px;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert.success {
            background: #dcfce7;
            color: #166534;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
        }

        .stars {
            color: #f59e0b;
            font-size: 1.1rem;
            letter-spacing: 0.08rem;
        }

        .muted {
            color: #6b7280;
        }

        .film-poster {
            width: 100%;
            max-width: 320px;
            height: auto;
            border-radius: 12px;
            display: block;
            margin-bottom: 1rem;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .film-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }

        .film-meta p {
            margin: 0.4rem 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('counties.index') }}">Counties</a></li>
                <li><a href="{{ route('cities.index') }}">Cities</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>