<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dark</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .body-card {
            background-color: #1a1a1a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #444;
            color: white;
            border-radius: 5px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            color: #007BFF;
            text-decoration: none;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="body-card">
        <div class="login-card">
            <h2>Login</h2>
            <form action="/home" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password"  name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-login">Entrar</button>
                <a href="#" class="forgot-password">Esqueci minha senha</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
