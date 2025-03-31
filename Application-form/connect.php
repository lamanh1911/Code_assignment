<?php
$servername = "localhost";
$username = "root"; // mặc định của XAMPP
$password = "";     // để trống nếu chưa đặt mật khẩu
$dbname = "my_first_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}
