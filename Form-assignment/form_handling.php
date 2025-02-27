<?php
function sumUP()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        if (is_numeric($num1) && is_numeric($num2)) {
            $sum = $num1 + $num2;
            echo "So thu nhat la: $num1 <br>";
            echo "So thu nhat la: $num2 <br>";
            echo "Gia tri tong la: $sum";
        }
    }
};
sumUP();
