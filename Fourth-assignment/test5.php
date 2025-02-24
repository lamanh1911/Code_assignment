<?php
$value = "abc";
function checkValueType($value){
    if(is_numeric($value)){
        if(is_int($value)){
            echo "la gia tri so nguyen";
        } else{
            echo "la gia tri so thap phan";
        }
    } else {
        echo "khong phai gia tri so";
    }
}
checkValueType($value);
echo "<br>";

function compareValue($value1,$value2){
    echo "value1 :" . json_encode($value1,JSON_PRESERVE_ZERO_FRACTION) . "," . "value2 :" . json_encode($value2,JSON_PRESERVE_ZERO_FRACTION);
    echo "<br>";

    // cung kieu cung gia tri
    if($value1 === $value2){
        echo "cung kieu cung gia tri";
        return ;
    }
    // Khac kieu cung gia tri
    if ($value1 == $value2 && gettype($value1) !== gettype($value2)){
        echo "khac kieu nhung cung gia tri";
        return ;
    }

    if ($value1 != $value2) {
        echo "khac nhau hoan toan";
    }
}
compareValue(10,10);
echo "<br>";
compareValue("10",10);
echo "<br>";
compareValue(10,9);
echo "<br>";
compareValue(10.0,10);
echo "<br>";
compareValue("halo",10);
?>