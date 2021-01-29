<?php 
require_once '../connection.php';

$id = intval($_POST['event_id']);
$address1 = htmlspecialchars($_POST['address1']);
$address2 = htmlspecialchars($_POST['address2']);
$description1 = htmlspecialchars($_POST['description1']);
$description2 = htmlspecialchars($_POST['description2']);
$time_date = htmlspecialchars($_POST['time_date']);
$time = htmlspecialchars($_POST['time']);
//If the admin wants to update the image.
if ($_FILES['img1']['name'] != "" && $_FILES['img2']['name'] != "") {
    $img_name1 = $_FILES['img1']['name'];
    $img_name2 = $_FILES['img2']['name'];
    $img_path1 = "/assets/img/$img_name1";
    $img_path2 = "/assets/img/$img_name2";
    move_uploaded_file($_FILES['img1']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path1);
    move_uploaded_file($_FILES['img2']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path2);

	$query = "UPDATE events SET address1 = ?, address2 = ?, description1 = ?, description2 = ?,time_date = ?,time = ?, img1 = ? ,img2 = ? WHERE event_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssssssi', $address1, $address2, $description1,$description2,$time_date,$time, $img_path1 ,$img_path2,$id);
	$stmt->execute();
	$stmt->close();
    $cn->close();
} else { //admin only wants to update the details
	$query = "UPDATE events SET address1 = ?, address2 = ?, description1 = ?, description2 = ?,time_date = ?,time = ? WHERE event_id = ?";
	$stmt = $cn->stmt_init();
    if(!$stmt->prepare($query)){
    echo "error";
    die();
    }
	$stmt->bind_param('ssssssi', $address1, $address2, $description1,$description2,$time_date,$time,$id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}

header("Location: /");
