<?php
$students = [
    ["name" => "Nguyen A", "scores" => [8, 7, 9, 6]],
    ["name" => "Le B", "scores" => [6, 8, 7, 9]],
    ["name" => "Tran C", "scores" => [7, 7, 7, 7]]
];

function computeAverage($score){
    if(empty($score)){
        return 0;
    }
    return array_sum($score)/count($score);
} // tao mot ham de tinh trung binh 

foreach($students as $student){  // Duyệt từng học sinh trong mảng
    echo "Name : {$student['name']} <br>"; //Hien thi ten

        if (is_array($student['scores'])) //Neu score la mang thi in ra
        {                
            echo "Scores: " . implode(", ", $student['scores']) . "<br>";
            $average = computeAverage($student['scores']);
            echo "Diem trung binh la: $average <br>"; 
        }   
    }

?>