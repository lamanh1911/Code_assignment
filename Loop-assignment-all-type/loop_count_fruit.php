<?php
$fruits = ["apple", "banana", "apple", "orange", "banana", "apple"];
$countApple = array_count_values($fruits);
echo "Số lượng táo là: " . $countApple["apple"];
?>