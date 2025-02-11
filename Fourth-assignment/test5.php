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
    echo "value1 :" . json_encode($value1) . "," . "value2 :" . json_encode($value2);
    echo "<br>";
    if(gettype($value1) === gettype($value2)){   
        if($value1 === $value2){
            echo "cung kieu du lieu & cung gia tri";
        } else {
            echo "cung kieu du lieu & khac gia tri";
        }
    } else {
        echo "khac kieu du lieu";
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