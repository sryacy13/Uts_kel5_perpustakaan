<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset('img/ha1.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .overlay {
            backdrop-filter: blur(6px);
            background-color: rgba(255, 255, 255, 0.2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 1rem;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 550px;
        }

        .btn-modern {
            padding: 0.75rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            transition: 0.3s ease-in-out;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .heading-icon {
            font-size: 4.5rem; /* Diperbesar dari 3rem */
            color: #0d6efd;
        }

        .divider {
            height: 4px;
            width: 60px;
            background-color: #0d6efd;
            border-radius: 2px;
            margin: 1rem auto;
        }
    </style>
</head>
<body>
    <div class="overlay">
        @yield('content')
    </div>
</body>
</html>
