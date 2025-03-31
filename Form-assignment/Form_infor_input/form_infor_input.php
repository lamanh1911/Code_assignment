<?php

include 'connect.php'; // Gọi file kết nối DB

function showInfor()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $passWord = $_POST["password"];
        $lastName = $_POST["last"];
        $givenName = $_POST["given"];
        $sex = $_POST["sex"];
        $year = $_POST["year"];
        $month = $_POST["month"];
        $day = $_POST["day"];
        $phone = $_POST["phone"];

        if ($email !== "" && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $email . "<br>";
        }

        if (strlen($passWord) >= 8 && strlen($passWord) <= 15 && preg_match('/[a-z]/', $passWord) && preg_match('/[A-Z]/', $passWord)) {
            echo $passWord . "<br>";
        }

        if ($lastName) {
            echo $lastName . "<br>";
        }
        if ($givenName) {
            echo $givenName . "<br>";
        }
        if ($sex) {
            echo $sex . "<br>";
        }

        if (!empty($year) && !empty($month) && !empty($day)) {
            $date = new DateTime("$year-$month-$day");
            $today = new DateTime();
            if ($date < $today) {
                echo $year . "-" . $month . "-" . $day . "<br>";
            }
        }

        if (!empty($phone)) {
            if (preg_match('/^\d{2,4}-\d{3,4}-\d{4}$/', $phone)) {
                echo $phone . "<br>";
            }
        }

        if (!empty($_POST["checkpolicy"])) {
            echo "checked";
        }
    }
};
showInfor();
