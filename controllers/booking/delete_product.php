<?php  
require_once '../connection.php';
$id = intval($_GET['id']);

$query = "DELETE FROM packages WHERE package_id = $id";
$cn->query($query);
header("Location: /");


//FOREIGN KEY CONSTRAINT



