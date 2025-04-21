document.getElementById("LoginForm").addEventListener("submit", function (e) {
    e.preventDefault()
    let isValid = true;

    const userName = document.getElementById("userName").value;
    const resultName = document.getElementById("userResult");

    const passWord = document.getElementById("pass").value;
    const resultPass = document.getElementById("passResult");


    if (!userName) {
        resultName.style.color = "red";
        resultName.innerHTML = "🚫 UserName is required!";
        isValid = false;
    }

    if (!passWord) {
        resultPass.style.color = "red";
        resultPass.innerHTML = "🚫 Password is required!";
        isValid = false;
    }

    const spinner = document.getElementById("spinner")
    const overlay = document.getElementById("overlay")

    if (isValid) {
        spinner.style.display = "block";
        overlay.style.display = "block";
        fetch("login_connect.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ userName, passWord })
        })
            .then(res => res.text())
            .then(data => {
                console.log(data);
                spinner.style.display = "none";
                overlay.style.display = "none"; // hoặc hiển thị ra giao diện
            })
            .catch(err => {
                console.error("Lỗi:", err);
            });
    }
})



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

