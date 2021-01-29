<?php  
require_once '../connection.php';

$id = intval($_POST['package_id']);
$name = htmlspecialchars($_POST['name']);
$price = floatval($_POST['price']);
$description = htmlspecialchars($_POST['description']);
$cat_id = intval($_POST['category']);

// var_dump($_POST);
// die();

//If the admin wants to update the image.
if ($_FILES['image']['name'] != "") {
	$img_name = $_FILES['image']['name'];
	$img_path = "/assets/img/$img_name";
	move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path);

	$query = "UPDATE packages SET name = ?, price = ?, description = ?, img = ?, category = ? WHERE package_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssii', $name, $price, $description, $img_path, $cat_id, $id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
} else { //admin only wants to update the details
	$query = "UPDATE packages SET name = ?, price = ?, description = ?, category = ? WHERE package_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('sssii', $name, $price, $description, $cat_id, $id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}

header("Location: " . $_SERVER['HTTP_REFERER']);
