
<?php
include 'crud_connect.php'; // Gọi file kết nối DB
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents("php://input"); // lấy raw JSON từ JS gửi
    $data = json_decode($json, true);         // chuyển JSON thành mảng PHP

    if (isset($data['selected']) && is_array($data['selected'])) {
        $ids = $data['selected'];

        $ids = array_map('intval', $data['selected']); // tránh SQL injection
        $idList = implode(',', $ids); // chuyển thành chuỗi: 1,2,3,...

        $sql = "DELETE FROM employee_infor WHERE id IN ($idList)";
        if ($conn->query($sql) === TRUE) {
            echo "Đã xoá thành công các ID: $idList";
        } else {
            echo "Lỗi khi xoá: " . $conn->error;
        }
    } else {
        echo "Không có mảng hợp lệ được gửi lên!";
    }
}

$conn->close();
?>
