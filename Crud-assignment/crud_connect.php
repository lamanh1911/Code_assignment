<?php
$servername = "localhost";
$username = "root"; // mặc định của XAMPP
$password = "";     // để trống nếu chưa đặt mật khẩu
$dbname = "crud_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
