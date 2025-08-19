<?php
require_once 'includes/database.php';
require_once 'employees/employees.php';

$database = new Database();
$db = $database->connect();
$employee = new Employee($db);
$stmt = $employee->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <div class="header">
            <div class="header-title">
                <h2>Manage <b>Employees</b></h2>
            </div>
            <div class="header-action">
                <div class="delete-button"><button type="button" class="btn btn-danger" id="deleteBtn">
                        <i class="fa fa-minus-circle"></i>Delete</button>
                </div>
                <div class="add-button">
                    <a href="http://localhost/Code_assignment/Crud_bootstrap_assignment/employees/add_employee.php">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i>Add New Employee</button>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkAll" id="checkAll" name="optionAll"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><input type="checkbox" class="checkbox" id="<?= $row['id'] ?>" name="<?= $row['id'] ?>" value="<?= $row['id'] ?>"></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td>
                            <div class="action">
                                <div class="edit"><a href="http://localhost/Code_assignment/Crud_bootstrap_assignment/employees/update_employee.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen" style='color:#ffc107;margin-right: 25px;font-size: 20px;'></i></a></div>
                                <div class="delete"><a href="employees/delete_employee.php=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"><i class='fas fa-trash' style='color:red;font-size: 20px;'></i></a></div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById("checkAll").addEventListener("change", function() {
            const isChecked = this.checked; //.checked sẽ trả về trạng thái là true or false
            console.log(isChecked);
            checkedBoxes = document.querySelectorAll(".checkbox");
            checkedBoxes.forEach(cb => {
                cb.checked = isChecked
            })
        })

        document.getElementById("deleteBtn").addEventListener("click", function() {
            const checkedBoxes = document.querySelectorAll(".checkbox:checked");
            const ids = []
            checkedBoxes.forEach(cb => ids.push(cb.value));

            if (ids.length === 0) {
                alert("Chưa chọn dòng nào!");
                return;
            }

            fetch("employees/delete_employee_checkbox.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ // Gửi dữ liệu dạng JSON
                        ids: ids
                    })
                })
                .then(res => res.text()) // Lấy phản hồi server dưới dạng text
                .then(data => {
                    alert(data); // Hiển thị kết quả xoá (do PHP trả về)
                    location.reload(); // Tải lại trang để thấy dữ liệu đã xoá
                })
        })
    </script>
</body>

</html>