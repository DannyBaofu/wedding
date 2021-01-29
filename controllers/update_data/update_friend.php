<?php 
require_once '../connection.php';

$id = intval($_POST['friend_id']);
$fullname = htmlspecialchars($_POST['fullname']);
$position = htmlspecialchars($_POST['position']);
$wedding_position = htmlspecialchars($_POST['wedding_position']);

//If the admin wants to update the image.
if ($_FILES['image']['name'] != "") {
    $img_name1 = $_FILES['image']['name'];
    $img_path1 = "/assets/img/$img_name1";
    move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$img_path1);

	$query = "UPDATE friends SET fullname = ?, position = ?, wedding_position = ?, img = ?  WHERE friends_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param('ssssi', $fullname, $position, $wedding_position, $img_path1 ,$id);
	$stmt->execute();
	$stmt->close();
    $cn->close();
} else { //admin only wants to update the details
	$query = "UPDATE friends SET fullname = ?, position = ?, wedding_position = ? WHERE friends_id = ?";
	$stmt = $cn->stmt_init();
    if(!$stmt->prepare($query)){
    echo "error";
    die();
    }
	$stmt->bind_param('sssi', $fullname, $position, $wedding_position, $id);
	$stmt->execute();
	$stmt->close();
	$cn->close();
}

header("Location: /");
