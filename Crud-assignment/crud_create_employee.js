document.getElementById("employee-create-form").addEventListener("submit", function (event) {
    let isValid = checkValidate();
    if (!isValid) {
        event.preventDefault();
    }
})

function checkValidate() {
    let isValid = true;

    const errors = {
        nameError: "First name is required",
        emailError: "Email is required",
        addressError: "Address is required",
        phoneError: "Phone is required",
    }
    const name = document.querySelector("#name").value.trim();
    const email = document.querySelector("#email").value.trim();
    const address = document.querySelector("#address").value.trim();
    const phone = document.querySelector("#phone").value.trim();

    document.querySelectorAll(".error").forEach(element =>
        element.innerText = ""
    )

    if (!name) {
        setError("nameError", errors.nameError)
    }

    if (!email) {
        setError("emailError", errors.emailError)
    }

    if (!address) {
        setError("addressError", errors.addressError)
    }

    if (!phone) {
        setError("phoneError", errors.phoneError)
    }

    function setError(id, message) {
        document.getElementById(id).innerText = message;
        isValid = false;
    }

    return isValid;
}
