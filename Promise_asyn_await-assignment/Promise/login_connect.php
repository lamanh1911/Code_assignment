<?php
sleep(3);
// Nhận dữ liệu từ fetch, cú pháp mặc định
$data = json_decode(file_get_contents("php://input"), true);

$username = $data['userName'] ?? ''; //chỗ này là nếu $data['userName'] tồn tại thì gán cho biến, ko có thì gán là rỗng
$password = $data['passWord'] ?? '';
// Kết nối database (MySQLi)
$conn = new mysqli("localhost", "root", "", "login_db");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn kiểm tra tài khoản
$stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) {
        echo "Đăng nhập thành công!";
    } else {
        echo "Sai mật khẩu!";
    }
} else {
    echo "Không tìm thấy người dùng!";
}
$conn->close();
