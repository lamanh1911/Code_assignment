<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div>
        <label>User name</label>
        <input type="text" id="userName">
        <span class="error" id="userResult"></span>
    </div>
    <div>
        <label>Password</label>
        <input type="text" id="pass">
        <span class="error" id="passResult"></span>
    </div>
    <div>
        <button type="submit" onclick="kiemTra()">Login</button>
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

    function kiemTra() {
        const userName = document.getElementById("userName").value;
        const resultName = document.getElementById("userResult");

        const passWord = document.getElementById("pass").value;
        const resultPass = document.getElementById("passResult");

        resultName.innerHTML = "⏳ Đang kiểm tra User Name...";
        resultPass.innerHTML = "⏳ Đang kiểm tra Password...";

        kiemTraUserName(userName)
            .then(kq => {
                resultName.style.color = "green";
                resultName.innerHTML = kq;
            })
            .catch(err => {
                resultName.style.color = "red";
                resultName.innerHTML = err;
            });

        kiemTraPassWord(passWord)
            .then(kq => {
                resultPass.style.color = "green";
                resultPass.innerHTML = kq;
            })
            .catch(err => {
                resultPass.style.color = "red";
                resultPass.innerHTML = err;
            });

    }
</script>

</html>