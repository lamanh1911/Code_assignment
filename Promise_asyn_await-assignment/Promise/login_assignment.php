<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #00809d;
            font-family: cursive;
            color: #4d4b4b;
        }

        .login-form {
            border: 1px solid transparent;
            width: 30%;
            margin-left: 35%;
            margin-top: 100px;
            height: 400px;
            border-radius: 5px;
            background-color: white;
        }

        .header {
            border: 1px solid transparent;
            height: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .user-name {
            border: 1px solid transparent;
            margin-left: 40px;
        }

        input[type="text"],
        input[type="password"] {
            width: 85%;
            height: 25px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .password {
            border: 1px solid transparent;
            margin-left: 40px;
            margin-top: 15px;
        }

        .login {
            border: 1px solid transparent;
            margin-left: 40px;
            margin-top: 20px;
        }

        button {
            width: 87%;
            height: 35px;
            background-color: #00809d;
            color: white;
            font-weight: bold;
            border-radius: 3px;
            border: transparent;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #eee;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            z-index: 1000;
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 999;
            display: none;
        }
    </style>
</head>

<body>
    <form class="login-form" id="LoginForm" method="post">
        <div class="header">Login</div>
        <div class="user-name">
            <label>User name</label><br>
            <input type="text" id="userName"><br>
            <span class="error" id="userResult"></span>
        </div>
        <div class="password">
            <label>Password</label><br>
            <input type="password" id="pass"><br>
            <span class="error" id="passResult"></span>
            <div onclick="showPassword()">
                <input type="checkbox" id="checkbox">
                <span>Show Password</span>
            </div>
        </div>
        <div class="login">
            <button type="submit">Login</button>
        </div>
        <div class="overlay" id="overlay"></div>
        <div class="spinner" id="spinner"></div>
    </form>
</body>
<script src="login_js.js"></script>

</html>