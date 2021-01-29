<?php 

require_once '../connection.php';

//sanitize the inputs
$name = htmlspecialchars($_POST['name']);
$price = intval($_POST['price']);
$description = htmlspecialchars($_POST['description']);
$category = intval($_POST['category']);

//image 
$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmpname = $_FILES['image']['tmp_name'];
$img_path = "assets/img/$img_name";
$img_type = pathinfo($img_name,PATHINFO_EXTENSION);

$is_img = false;
$has_details = false;

//To check if the admin upload an image files
if($img_type == 'jpg' || $img_type =='jpeg' || $img_type =='png' || $img_type =="svg" || $img_type == "gif") {
    $is_img = true;
} else { 
    echo "Please upload an image file ";
}

//To check whether the admin fill out all fields
foreach($_POST as $key => $value) {
    if(empty($value)) {
        die("Please fill out all the fields");
    }else{
        $has_details = true;
    }
}

//store the product in the database
if($has_details && $is_img && $img_size > 0) {
    move_uploaded_file($img_tmpname, $SERVER["DOCUMENT_ROOT"].$img_path);
    $query = "INSERT INTO packages (name,price,description,img,category) VALUES(?,?,?,?,?)";

    $stmt = $cn->prepare($query);
    $stmt->bind_param("ssssi",$name,$price,$description,$img_path,$category);
    $stmt->execute();
    $stmt->close();
    $cn->close();

    header("Location: /");
}