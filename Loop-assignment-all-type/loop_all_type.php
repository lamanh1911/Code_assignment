<?php
$students = [
    "A001" => ["name" => "Nguyễn Văn A", "age" => 20, "score" => 8.5],
    "A002" => ["name" => "Trần Thị B", "age" => 21, "score" => 9.0],
    "A003" => ["name" => "Lê Văn C", "age" => 19, "score" => 7.5]
];

foreach ($students as $student_id => $info) {  // lấy cả key và value của từng phần tử.
    echo "Mã sinh viên: " . $student_id . " - " . "Tên sinh viên: " . $students["$student_id"]["name"] . // In ra key tức là mã sinh viêm
    " - " . "Tuổi: " . $students["$student_id"]["age"] .
    " - " . "Điểm: "  . $students["$student_id"]["score"] . "<br>"; 
}
$listScore = array_column($students, "score");
$maxScore =  max($listScore);
echo "Điểm cao nhất là: $maxScore <br>";

$highScore = 
    array_filter($students, function ($student) { 
    return $student["score"] >= 9.0 ;
    }); //filter những sinh viên có điểm trên 9
$listScore = array_column($highScore, 'name'); //dùng array column để chuyển thành mảng 1 chiều
echo "Sinh viên có điểm cao nhất là: " . implode(", ",$listScore);
?>