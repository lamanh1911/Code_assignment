<?php
require_once '../includes/database.php';
require_once 'employees.php';

$database = new Database();
$db = $database->connect();
$employee = new Employee($db);
if ($_POST) {
    $employee->name = $_POST['name'];
    $employee->email = $_POST['email'];
    $employee->address = $_POST['address'];
    $employee->phone = $_POST['phone'];
    if ($employee->create()) {
        header('Location: ../index.php');
    }
}
?>
<!DOCTYPE html>

<head>
    <title>Job Application Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/add_employee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form class="employee-create-form" id="employee-create-form" method="post" action="add_employee.php" novalidate enctype="multipart/form-data">
        <div class="create-form-header">
            <div class="add-title">Add employee</div>
        </div>
        <div class="modal-body">
            <div class="name-input">
                <label>Name</label><br>
                <input type="text" id="name" name="name">
                <span class="error" id="nameError"></span>
            </div>
            <div class="email-input">
                <label>Email</label><br>
                <input type="text" id="email" name="email">
                <span class="error" id="emailError"></span>
            </div>

            <div class="address-input">
                <label>Address</label><br>
                <textarea id="address" name="address"></textarea>
                <span class="error" id="addressError"></span>
            </div>
            <div class="phone-input">
                <label>Phone</label><br>
                <input type="text" id="phone" name="phone">
                <span class="error" id="phoneError"></span>
            </div>
        </div>
        <div class="buttons">
            <a class="back" href="http://localhost/Code_assignment/Crud_bootstrap_assignment/index.php">Back</a>
            <div class="add" id="submit"><button type="submit" class="btn btn-success">Add</button></div>
        </div>
    </form>
</body>