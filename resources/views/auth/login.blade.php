<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(45deg, #6b48ff, #6b48ff33);
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 400px;
            min-height: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(21, 21, 21, 0.1);
            overflow: hidden;
            margin: 20px;
        }

        .form-container {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            padding: 30px;
            transition: transform 0.6s ease-in-out;
        }

        .sign-in-container {
            transform: translateX(0);
            z-index: 2;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(0);
            z-index: 5;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(-100%);
        }

        h1 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .input-group {
            position: relative;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            background: #f7f7f7;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            background: #fff;
            box-shadow: 0 0 0 2px #6b48ff;
        }

        button {
            background: #6b48ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5a3cd9;
        }

        .toggle-btn {
            margin-top: 20px;
            background: none;
            color: #6b48ff;
            text-decoration: none;
        }

        .toggle-btn:hover {
            background: #f7f7f7;
        }

        .error {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="/login" class="loginForm">
            @csrf
            <h1>Login</h1>
            @if ($errors->any())
                <p class="error">{{ $errors->first('error') }}</p>
            @endif
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
            <a href="{{route('register')}}" class="toggle-btn">Don't have an account? Sign up!</a>
        </form>
    </div>
    </div>
</body>
</html>