<?php
include 'crud_connect.php';

// Lấy ID từ URL
$id = $_GET['id'];

// Lấy dữ liệu từ DB để hiển thị lên form
$sql = "SELECT * FROM employee_infor WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>

<head>
    <title>Job Application Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="crud_create_employee.css">
    <link rel="stylesheet" href="crud_css.css">
</head>

<body>
    <form class="employee-create-form" id="employee-create-form" method="post" action="crud_process.php" novalidate enctype="multipart/form-data">
        <div class="create-form-header">
            <div class="add-title">Edit employee</div>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="name-input">
                <label>Name</label><br>
                <input type="text" id="name" name="name" value="<?= $user['name'] ?>">
                <span class="error" id="nameError"></span>
            </div>
            <div class="email-input">
                <label>Email</label><br>
                <input type="text" id="email" name="email" value="<?= $user['email'] ?>">
                <span class="error" id="emailError"></span>
            </div>

            <div class="address-input">
                <label>Address</label><br>
                <textarea id="address" name="address"><?= htmlspecialchars($user['address']) ?></textarea>
                <span class="error" id="addressError"></span>
            </div>
            <div class="phone-input">
                <label>Phone</label><br>
                <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>">
                <span class="error" id="phoneError"></span>
            </div>
        </div>
        <div class="buttons">
            <a class="back" href="http://localhost/Code_assignment/Crud-assignment/crud_main.php">Back</a>
            <div class="add" id="submit"><button>Update</button></div>
        </div>
    </form>
    <script src="crud_create_employee.js"></script>
</body>

</html>