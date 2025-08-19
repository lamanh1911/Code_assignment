<?php
require_once '../includes/Database.php';
require_once 'Product.php';

$database = new Database();
$db = $database->connect();
$product = new Product($db);

$product->id = $_GET['id'];
$product->delete();
header('Location: ../index.php');