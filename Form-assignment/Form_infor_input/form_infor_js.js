// Tạo các tùy chọn cho dropdown Ngày
const dayDropdown = document.getElementById("day");
for (let i = 1; i <= 31; i++) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    dayDropdown.appendChild(option);
}

// Tạo các tùy chọn cho dropdown Năm (từ 1900 đến hiện tại)
const yearDropdown = document.getElementById("year");
const currentYear = new Date().getFullYear();
for (let i = currentYear; i >= 1900; i--) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    yearDropdown.appendChild(option);
}

document.getElementById("createAccountForm").addEventListener("submit", function (event) {
    let isValid = true;

    const errors = {
        email: "Please enter your email.",
        password: "Please enter your password.",
        lastName: "Last name is required",
        givenName: "Given name is required",
        sex: "Gender is required",
        year: "Year is required",
        month: "Month is required",
        day: "Day is required",
        phone: "Phone number is required",
        policy: "Please check the box to confirm you agree with our policy.",
        future: "Please select a date in the past. Your date of birth cannot be today or a future date.",
        invalidEmail: "Please enter a valid email address.",
        invalidPassword: "Invalid password. Please check again.",
        invalidPhone: "Please enter a valid phone number (e.g., 123-456-7890)."
    };

    const email = document.querySelector("#email").value.trim();
    const password = document.querySelector("#password").value.trim();
    const lastName = document.querySelector("#lastName").value.trim();
    const givenName = document.querySelector("#givenName").value.trim();
    const sex = document.querySelector("#sex").value.trim();
    const year = document.querySelector("#year").value;
    const month = document.querySelector("#month").value.trim();
    const day = document.querySelector("#day").value.trim();
    const phone = document.querySelector("#phone").value.trim();
    const checkbox = document.querySelector("#myCheckbox");

    document.querySelectorAll(".error").forEach(el => el.innerText = "");//xoá thông báo lỗi)

    // Kiểm tra email
    if (!email) setError("mailError", errors.email);
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) setError("mailError", errors.invalidEmail);

    //kiểm tra password
    if (!password) setError("passwordError", errors.password);
    else if (password.length < 8 || password.length > 15 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password))
        setError("passwordError", errors.invalidPassword)

    if (!lastName) setError("lastNameError", errors.lastName);
    if (!givenName) setError("givenNameError", errors.givenName);
    if (!sex) setError("sexError", errors.sex);
    if (!year) setError("yearError", errors.year);
    if (!month) setError("monthError", errors.month);
    if (!day) setError("dayError", errors.day);

    if (new Date(year, month - 1, day) > new Date()) setError("futureError", errors.future);
    else {
        document.getElementById("futureError").innerHTML = "";
    }

    if (!phone) setError("phoneError", errors.phone);
    else if (!/^\d{2,4}-\d{3,4}-\d{4}$/.test(phone)) setError("phoneError", errors.invalidPhone)

    if (!checkbox.checked) setError("policyError", errors.policy)

    if (!isValid) {
        event.preventDefault(); // Nếu có lỗi, ngăn form gửi đi
    }
    function setError(id, message) {
        document.getElementById(id).innerText = message;
        isValid = false;
    }
});
