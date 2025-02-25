<?php
$students = [
    ["name" => "Nguyen A", "scores" => [8, 7, 9, 6]],
    ["name" => "Le B", "scores" => [6, 8, 7, 9]],
    ["name" => "Tran C", "scores" => [7, 7, 7, 7]]
];

foreach($students as $student){
    foreach ($student as $key => $value){
        if (is_array($value)){
            echo "$key: " . implode(", ", $value) . "<br>";
        } else {
            echo "$key: $value <br>";
        }
    }
}
?>