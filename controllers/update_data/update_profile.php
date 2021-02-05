<?php 
require_once '../connection.php';

$id = intval($_POST['product_id']);
$groom = htmlspecialchars($_POST['groom']);
$bride = htmlspecialchars($_POST['bride']);
$description = htmlspecialchars($_POST['description']);
$description1 = htmlspecialchars($_POST['description1']);
$date = htmlspecialchars($_POST['date']);
$h = intval($_POST['h']);
$m = intval($_POST['m']);
$s = intval($_POST['s']);
//If the admin wants to update the image.
if ($_FILES['image']['name'] != "" && $_FILES['image1']['name'] != "") {
    $img_name = $_FILES['image']['name'];
    $img1_name = $_FILES['image1']['name'];
    $img_path = "/assets/img/$img_name";
    $img1_path = "/assets/img/$img1_name";
    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path);
    move_uploaded_file($_FILES['image1']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img1_path);

	$query = "UPDATE products SET groom = ?, bride = ?, description = ?, description1 = ?,date = ?,h = ?,m = ?, s = ?, image = ?, image1 = ? WHERE product_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('sssssiiissi', $groom, $bride, $description,$description1,$date,$h,$m,$s, $img_path ,$img1_path,$id);
	$stmt->execute();
	$stmt->close();
    $cn->close();
} else { //admin only wants to update the details
	$query = "UPDATE products SET groom = ?, bride = ?, description = ?,description1 = ?,date= ? WHERE product_id = ?";
	$stmt = $cn->stmt_init();
    if(!$stmt->prepare($query)){
    echo "error";
    die();
    }
	$stmt->bind_param('sssssi', $groom, $bride, $description,$description1,$date,$id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}


header("Location: /");
