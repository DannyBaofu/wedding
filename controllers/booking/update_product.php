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
if ($_FILES['image']['name'] != "" && $_FILES['image2']['name'] != "" && $_FILES['image3']['name'] != "" ) {
	$img_name = $_FILES['image']['name'];
	$img_name2 = $_FILES['image2']['name'];
	$img_name3 = $_FILES['image3']['name'];
	$img_path = "/assets/img/$img_name";
	$img_path2 = "/assets/img/$img_name2";
	$img_path3 = "/assets/img/$img_name3";
	move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path);
	move_uploaded_file($_FILES['image2']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path2);
	move_uploaded_file($_FILES['image3']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path3);

	$query = "UPDATE packages SET name = ?, price = ?, description = ?, img = ?,img2 = ?,img3 = ?, category = ? WHERE package_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssssii', $name, $price, $description, $img_path,$img_path2,$img_path3, $cat_id, $id);
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
