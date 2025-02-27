<?php
$products = [
    "iphone" => 1000,
    "samsung" => 900,
    "xiaomi" => 500,
    "oppo" => 700
];
asort($products);

echo "Sắp xếp sản phẩm có giá trị tăng dần là: <br>";
foreach ($products as $product => $key){
echo $product . ": " . $key ."<br>";
}

?>