<?php 
require_once '../connection.php';

$id = intval($_POST['new_id']);
$description1 = htmlspecialchars($_POST['description1']);
$description2 = htmlspecialchars($_POST['description2']);
$description3 = htmlspecialchars($_POST['description3']);
// var_dump($id);
// die();

//If the admin wants to update the image.
if ($_FILES['img1']['name'] != "" && $_FILES['img2']['name'] != "" && $_FILES['img3']['name'] != "") {
    $img_name1 = $_FILES['img1']['name'];
    $img_name2 = $_FILES['img2']['name'];
    $img_name3 = $_FILES['img3']['name'];
    $img_path1 = "/assets/img/$img_name1";
    $img_path2 = "/assets/img/$img_name2";
    $img_path3 = "/assets/img/$img_name3";
    move_uploaded_file($_FILES['img1']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path1);
    move_uploaded_file($_FILES['img2']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path2);
    move_uploaded_file($_FILES['img3']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path3);

	$query = "UPDATE news SET img1 = ?, description1 = ?,img2 = ?, description2 = ?,img3 = ?,description3 = ? WHERE news_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssssi', $img_path1 ,$description1,$img_path2,$description2,$img_path3,$description3,$id);
	$stmt->execute();
	$stmt->close();
    $cn->close();
} else { //admin only wants to update the details
	$query = "UPDATE news SET description1 = ?, description2 = ?,description3 = ? WHERE news_id = ?";
	$stmt = $cn->stmt_init();
    if(!$stmt->prepare($query)){
    echo "error";
    die();
    }
	$stmt->bind_param('sssi', $description1,$description2,$description3,$id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}

header("Location: " . $_SERVER['HTTP_REFERER']);
