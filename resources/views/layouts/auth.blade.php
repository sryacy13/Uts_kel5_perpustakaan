<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Digital</title>

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

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            backdrop-filter: blur(6px); /* Efek blur latar belakang */
            background-color: rgba(255, 255, 255, 0.2); /* transparansi lembut */
        }

        .card-login {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            width: 100%;
            max-width: 950px;
        }

        .login-left {
            background: linear-gradient(to bottom right, #3b82f6, #60a5fa);
            color: white;
            padding: 3rem;
            text-align: center;
        }

        .login-left h2 {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .login-left img {
            width: 90%;
            max-width: 220px;
            margin-top: 2rem;
        }

        .login-form {
            padding: 3rem;
        }

        .login-form h4 {
            font-weight: 600;
        }

        .icon-login {
            width: 60px;
            height: auto;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.15rem rgba(59,130,246,0.25);
        }

        .btn-primary {
            background-color: #3b82f6;
            border: none;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .login-left {
                display: none;
            }

            .login-form {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        @yield('content')
    </div>
</body>
</html>
