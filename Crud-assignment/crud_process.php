<?php
include 'crud_connect.php';

// Nhận dữ liệu từ form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Cập nhật DB
$sql = "UPDATE employee_infor SET name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thành công!";
    echo "<br><a href='crud_main.php'>Quay lại danh sách</a>";
} else {
    echo "Lỗi: " . $conn->error;
}
