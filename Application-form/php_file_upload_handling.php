<?php

include 'connect.php'; // Gọi file kết nối DB

function showInfor()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Danh sách các trường cần hiển thị
        $fields = [
            "first" => "First Name",
            "last" => "Last Name",
            "mail" => "Email",
            "position" => "Position",
            "date" => "Date",
            "employed" => "Status",
            "selfEmployed" => "Status",
            "unemployed" => "Status",
            "student" => "Status",
            "link" => "Link",
            "file" => "Resume",
            "referFirst" => "Reference First Name",
            "referLast" => "Reference Last Name",
            "referenceMail" => "Reference mail"
        ];

        foreach ($fields as $key => $label) {
            if (!empty($_POST[$key])) {
                $value = htmlspecialchars($_POST[$key]);
                if ($key === "mail") {
                    if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                        echo "$label:  $value <br>";
                    } else {
                        echo "$label: Email is not valid <br>";
                    }
                } elseif ($key === "date") {
                    $today = new DateTime();
                    $todayString = $today->format('Y-m-d');
                    if ($_POST[$key] > $todayString) {
                        echo "$label:  $value <br>";
                    } else {
                        echo "$label: date is not valid <br>";
                    }
                } elseif ($key === "file") {
                    $ext = strtolower(pathinfo($_POST[$key], PATHINFO_EXTENSION));
                    if ($ext === "pdf") {
                        echo "$label:  $value <br>";
                    } else {
                        echo "$label: file is not valid <br>";
                    }
                } else {
                    echo "$label:  $value <br>";
                }
            }
        }
    }
}

showInfor();


// 🛠️ Lấy dữ liệu từ form và làm sạch dữ liệu để tránh SQL Injection
$first = mysqli_real_escape_string($conn, $_POST['first']);
$email = mysqli_real_escape_string($conn, $_POST['mail']);

// 🛠️ Thực hiện truy vấn an toàn hơn
$sql = "INSERT INTO users (first_name, email) VALUES ('$first', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được lưu thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}

// 🔐 Đóng kết nối
$conn->close();
