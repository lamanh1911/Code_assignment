document.getElementById("applicationForm").addEventListener("submit", function (event) {
    let isValid = setMessage();
    if (!isValid) {
        event.preventDefault();
    }
})

function setMessage() {
    let isValid = true;

    const errors = {
        first: "First name is required",
        last: "Last name is required",
        email: "Email is required",
        position: "Position is required",
        date: "Position is required",
        status: "Status is required",
        link: "Link is required",
        file: "File is required",
        invalidEmail: "Please enter a valid email address.",
        invalidDate: "Please select the future date",
    }
    const firstName = document.querySelector("#first").value.trim();
    const lastName = document.querySelector("#last").value.trim();
    // const email = document.querySelector("#mail").value.trim();
    const position = document.querySelector("#position").value.trim();
    // const date = document.querySelector("#date").value.trim();
    const status = document.querySelector('#status input[type="radio"]:checked');
    const link = document.querySelector("#link").value.trim();
    const referMail = document.querySelector("#referenceMail").value.trim();

    document.querySelectorAll(".error").forEach(element =>
        element.innerText = ""
    )

    if (!firstName) {
        setError("firstError", errors.first)
    }

    if (!lastName) {
        setError("lastError", errors.last)
    }

    // if (!email) {
    //     setError("mailError", errors.email)
    // } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    //     setError("mailError", errors.invalidEmail)
    // }

    if (referMail) {
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(referMail)) {
            setError("referenceMailError", errors.invalidEmail)
        }
    }

    if (!position) {
        setError("positionError", errors.position)
    }

    // const today = new Date();
    // const year = today.getFullYear();
    // const month = String(today.getMonth() + 1).padStart(2, '0'); // thêm số 0 phía trước nếu cần
    // const day = String(today.getDate()).padStart(2, '0');

    // const formattedToday = `${year}-${month}-${day}`;
    // if (!date) {
    //     setError("dateError", errors.date)
    // } else if (date < formattedToday) {
    //     setError("dateError", errors.invalidDate)
    // }

    if (!link) {
        setError("linkError", errors.link)
    }

    if (!status) {
        setError("statusError", errors.status)
    }

    // if (fileInput.files.length === 0) {
    //     setError("fileError", errors.file)
    // }

    function setError(id, message) {
        document.getElementById(id).innerText = message;
        isValid = false;
    }

    return isValid;
}

const fileInput = document.getElementById("fileInput"); //lấy id của thẻ input type = file
const fileName = document.getElementById("fileName");

uploadBtn.addEventListener("click", function () {
    fileInput.click(); //active tính năng upload file của input type = file
});

fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        // const fileNameToLowerCase = file.name.toLowerCase();
        // if (fileNameToLowerCase.endsWith('.pdf')) {
        //     document.getElementById("fileError").innerText = "";
        fileName.value = file.name;
        // } else {
        //     document.getElementById("fileError").innerText = "Please upload a PDF file only.";
        // }
    }
    fileNameAvailable();
});

const fileAvailabe = document.getElementById("deleteUpload");
function fileNameAvailable() {
    if (fileName.value) {
        fileAvailabe.style.display = "flex";
    }
}

const fileDelete = document.getElementById("deleteUpload");
fileDelete.addEventListener("click", function () {
    fileName.value = "";
    fileAvailabe.style.display = "none";
});

document.getElementById("resetForm").addEventListener("click", function () {
    document.getElementById("applicationForm").reset();

    document.querySelectorAll(".error").forEach(element =>
        element.innerText = ""
    )
    fileAvailabe.style.display = "none";
});







