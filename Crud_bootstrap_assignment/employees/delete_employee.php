<?php
require_once '../includes/database.php';
require_once 'employees.php';

$database = new Database();
$db = $database->connect();
$employee = new Employee($db);

$employee->id = $_GET['id'];
$employee->delete();
header('Location: ../index.php');
