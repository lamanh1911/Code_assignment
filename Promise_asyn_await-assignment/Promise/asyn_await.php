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

        .emoji {
            display: inline-block;
            animation: xoayxoay 1s linear infinite;
        }

        @keyframes xoayxoay {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="login-form">
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
            <button type="submit" onclick="kiemTra()">Login</button>
        </div>
    </div>
</body>
<script>
    function kiemTraUserName(userName) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                if (userName === "Éc Éc") {
                    resolve("UserName chính xác!");
                } else {
                    reject("🚫 UserName không tồn tại!");
                }
            }, 2000); // mô phỏng 2 giây delay
        });
    }

    function kiemTraPassWord(passWord) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                if (passWord === "191196") {
                    resolve("Password chính xác!");
                } else {
                    reject("🚫 Password sai!");
                }
            }, 2000);
        });
    }

    async function kiemTra() {
        const userName = document.getElementById("userName").value;
        const resultName = document.getElementById("userResult");

        const passWord = document.getElementById("pass").value;
        const resultPass = document.getElementById("passResult");

        resultName.innerHTML = "Đang kiểm tra User Name...";
        resultName.innerHTML = '<span class="emoji">⏳</span> ' + resultName.innerHTML;
        resultName.style.color = "#4d4b4b";
        resultPass.innerHTML = "Đang kiểm tra Password...";
        resultPass.innerHTML = '<span class="emoji">⏳</span> ' + resultPass.innerHTML;
        resultPass.style.color = "#4d4b4b";
        if (!userName) {
            resultName.innerHTML = "Hãy nhập User Name!";
            resultName.style.color = "red";
        } else {
            try {
                const kq = await kiemTraUserName(userName)
                resultName.style.color = "green";
                resultName.innerHTML = kq;
            } catch (err) {
                resultName.style.color = "red";
                resultName.innerHTML = err;
            }
        }

        if (!passWord) {
            resultPass.innerHTML = "Hãy nhập Password !";
            resultPass.style.color = "red";
        } else {
            try {
                const kq = await kiemTraPassWord(passWord)
                resultPass.style.color = "green";
                resultPass.innerHTML = kq;
            } catch (err) {
                resultPass.style.color = "red";
                resultPass.innerHTML = err;
            }
        }

    }


    function showPassword() {
        const check = document.getElementById("checkbox")
        const pass = document.getElementById("pass")
        if (check.checked) {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
        console.log(pass.type)
    }
</script>

</html>