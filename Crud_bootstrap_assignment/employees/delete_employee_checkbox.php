<?php
require_once '../includes/database.php';
require_once 'employees.php';

$rawData = file_get_contents("php://input"); //lấy dữ liệu raw
$data = json_decode($rawData, true); //chuyen du lieu thanh mang

if (!empty($data['ids'])) {
    $ids = array_map('intval', $data['ids']); // Chuyển tất cả ID thành số nguyên (int), để tránh nguy cơ SQL injection.
    $idList = implode(",", $ids); //Chuyển mảng ID thành chuỗi phân cách bằng dấu , – dùng trong câu SQL kiểu IN (1,2,3)

    $database = new Database();
    $db = $database->connect();
    $employee = new Employee($db);

    $employee->id = $idList;
    $employee->delete();
} else {
    echo "Không nhận được ID nào để xoá.";
}
