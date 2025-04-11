<?php

include 'crud_connect.php'; // Gọi file kết nối DB

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$sql = "INSERT INTO employee_infor (name, email, address, phone) 
        VALUES ('$name', '$email', '$address', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được lưu thành công!";
    echo "<br><a href='crud_main.php'>Quay lại danh sách</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

// 🔐 Đóng kết nối
$conn->close();
