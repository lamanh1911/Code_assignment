<?php
include 'crud_connect.php';

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $sql = "DELETE FROM employee_infor WHERE id = $deleteId";
    $conn->query($sql);
}

// Truy vấn dữ liệu
$sql = "SELECT id, name, email, address, phone FROM employee_infor";
$result = $conn->query($sql);
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row; // Thêm từng dòng vào mảng
    }
}
?>
<!DOCTYPE html>

<head>
    <title>Job Application Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="crud_css.css">
    <link rel="stylesheet" href="crud_main.css">
</head>

<body>
    <div class="employee-management">
        <div class="management-header">
            <div class="title">Manage <b>Employees</b></div>
            <div class="delete-button" onclick="getSelectedrecord()">
                <i class="fa fa-minus-circle" style="font-size:25px"></i>
                <span>Delete</span>
            </div>

            <div class="add-button">
                <a href="http://localhost/Code_assignment/Crud-assignment/crud_create_employee.php">
                    <i class="fa fa-plus-circle" style="font-size:25px"></i>
                    <span>Add New Employee</span>
                </a>
            </div>
        </div>

        <div class="management-table">
            <table>
                <tr>
                    <th class="checkbox"><input type="checkbox"></th>
                    <th class="name">Name</th>
                    <th class="email">Email</th>
                    <th class="address">Address</th>
                    <th class="phone">Phone</th>
                    <th class="action">Action</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="checkbox"><input class="selectBox" type="checkbox" value="<?= $user['id'] ?>"></th>
                        <td><?= htmlspecialchars($user["name"]) ?></td>
                        <td><?= htmlspecialchars($user["email"]) ?></td>
                        <td><?= htmlspecialchars($user["address"]) ?></td>
                        <td><?= htmlspecialchars($user["phone"]) ?></td>
                        <td class="action">
                            <div class="edit"><a href="http://localhost/Code_assignment/Crud-assignment/crud_update.php?id=<?= $user['id'] ?>"><i class="fa-solid fa-pen" style='color:#ffc107;margin-right: 25px;font-size: 20px;'></i></a></div>
                            <div class="delete"><a href="crud_main.php?delete_id=<?= $user['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"><i class='fas fa-trash' style='color:red;font-size: 20px;'></i></a></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script>
        function getSelectedrecord() {
            const checkboxes = document.querySelectorAll('.selectBox:checked'); // chỉ lấy những ô đã tích
            const selected = Array.from(checkboxes).map(cb => cb.value); // lấy giá trị (value) của từng ô

            console.log(selected);

            if (selected.length === 0) {
                alert("Bạn chưa chọn mục nào để xoá 😅");
                return;
            }
            if (!confirm("Bạn có chắc chắn muốn xoá các mục đã chọn không? 🧹")) {
                return; // Người dùng bấm "Cancel"
                location.reload();
            }

            fetch("crud_delete.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json" // báo với PHP là mình gửi JSON
                    },
                    body: JSON.stringify({
                        selected: selected
                    })
                })
                .then(response => response.text())
                .then(data => {
                    console.log("Kết quả từ PHP:", data);
                    alert("Đã xoá thành công! 🔥");
                    location.reload(); // ✅ Reload sau khi xoá thành công
                })
                .catch(error => {
                    console.error("Lỗi:", error);
                    alert("Có lỗi xảy ra khi xoá 😢");
                });
        }
    </script>
</body>

</html>