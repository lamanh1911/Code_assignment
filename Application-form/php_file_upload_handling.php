<?php

include 'connect.php'; // Gọi file kết nối DB

function showInfor()
{
    $fileDestination = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Danh sách các trường cần hiển thị
        $fields = [
            "first" => "First Name",
            "last" => "Last Name",
            "mail" => "Email",
            "position" => "Position",
            "date" => "Date",
            "status" => "Status",
            "link" => "Link",
            "file" => "Resume",
            "referFirst" => "Reference First Name",
            "referLast" => "Reference Last Name",
            "referenceMail" => "Reference mail"
        ];

        foreach ($fields as $key => $label) {
            if ($key === "file") {
                $file = $_FILES['file'];
                $fileName = $file['name'];
                $fileTmp = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];

                // Lấy phần mở rộng
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowed = ['pdf'];

                if (in_array($fileExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 5 * 1024 * 1024) { // Dưới 5MB
                            // Đặt tên file mới để tránh trùng
                            $fileNewName = uniqid('resume_', true) . '.' . $fileExt;

                            // Đường dẫn thư mục lưu file
                            $fileDestination = 'uploads/' . $fileNewName;

                            move_uploaded_file($fileTmp, $fileDestination);

                            echo "$label:  $fileName <br>";
                        } else {
                            echo "File quá lớn! (Tối đa 5MB)";
                        }
                    } else {
                        echo "Lỗi khi upload file.";
                    }
                } else {
                    echo "Chỉ cho phép file PDF";
                }
            } else {
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
                    } else {
                        echo "$label: $value <br>";
                    }
                } else {
                    echo "$label:  Không có dữ liệu <br>";
                }
            }
        }
    }
    return $fileDestination;
}

$fileDestination = showInfor();

// 🛠️ Lấy dữ liệu từ form và làm sạch dữ liệu để tránh SQL Injection
$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['mail']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$link = mysqli_real_escape_string($conn, $_POST['link']);
$referFirst = mysqli_real_escape_string($conn, $_POST['referFirst']);
$referLast = mysqli_real_escape_string($conn, $_POST['referLast']);
$referenceMail = mysqli_real_escape_string($conn, $_POST['referenceMail']);

// 🛠️ Thực hiện truy vấn an toàn hơn
$sql = "INSERT INTO users (first_name, last_name, email, position, status, resume_path, available_date, resume_link, reference_first,reference_last, reference_email ) 
        VALUES ('$first', '$last', '$email', '$position', '$status', '$fileDestination','$date','$link','$referFirst', '$referLast','$referenceMail')";

if ($conn->query($sql) === TRUE) {
    echo "Dữ liệu đã được lưu thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}

// 🔐 Đóng kết nối
$conn->close();
