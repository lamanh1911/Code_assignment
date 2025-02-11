<?php 
$numberA = 10.75;
$numberA_inter = (int)$numberA;
echo $numberA_inter;

echo "<br>";

$result = sqrt($numberA_inter);
echo $result;

echo "<br>";

echo round($result,0);

echo "<br>";

$numberB = rand(1,20);

echo "So A là :" . $numberA_inter;
echo "<br>";
echo "So B là : " . $numberB;
echo "<br>";
echo "Ket qua A - B la :" . ($numberA_inter - $numberB);
echo "<br>";
echo "Ket qua A + B la :" . ($numberA_inter + $numberB);
echo "<br>";
echo "Ket qua A * B la :" . ($numberA_inter * $numberB);
echo "<br>";
echo "Ket qua A / B la :" . intdiv($numberA_inter, $numberB);
echo "<br>";
echo "Ket qua phan du cua A/b la : " . ($numberA_inter % $numberB)
?>