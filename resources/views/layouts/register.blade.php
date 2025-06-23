<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Perpustakaan Digital</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset('img/hih.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            backdrop-filter: blur(4px);
            background-color: rgba(255, 255, 255, 0.2); /* sedikit buram dan terang */
        }

        .card-register {
            background: rgba(255, 255, 255, 0.93);
            border-radius: 20px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 820px; /* Lebih ramping dari sebelumnya */
            display: flex;
        }

        .register-left {
            background: linear-gradient(to bottom right, #3b82f6, #60a5fa);
            color: white;
            padding: 2rem;
            text-align: center;
            flex: 1;
        }

        .register-left h2 {
            font-weight: 700;
        }

        .register-left img {
            width: 90%;
            max-width: 200px;
            margin-top: 1.5rem;
        }

        .register-form {
            flex: 1;
            padding: 2rem 2.5rem;
            background-color: rgba(255, 255, 255, 0.95);
        }

        .register-form h4 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .register-form img {
            width: 70px;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.1rem rgba(59,130,246,0.25);
        }

        .btn-primary {
            background-color: #3b82f6;
            border: none;
            border-radius: 30px;
            padding: 8px 28px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        @media (max-width: 768px) {
            .register-left {
                display: none;
            }

            .card-register {
                flex-direction: column;
                max-width: 95%;
            }

            .register-form {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        @yield('content')
    </div>
</body>
</html>
