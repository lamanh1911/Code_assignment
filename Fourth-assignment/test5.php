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

function formatValue($value1,$value2){
    if(is_float($value1) || is_float($value2)){
        echo "value1 :" . var_export($value1,true) . "," . "value2 :" . var_export($value2,true); //var_export chi cho so thuc
    } else {
        echo "value1 :" . json_encode($value1) . "," . "value2 :" . json_encode($value2); //cho cac kieu con lai
    }
}
function compareValue($value1,$value2){
    formatValue($value1,$value2);
    echo "<br>";
    if($value1 == $value2){   
        if(gettype($value1) === gettype($value2)){
            echo "cung kieu du lieu & cung gia tri";
        } else {
            echo "khac kieu du lieu nhung cung gia tri";
        }
    } else {
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