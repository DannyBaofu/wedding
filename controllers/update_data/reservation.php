<?php 

require_once '../connection.php';

//sanitize the inputs
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$guest = intval($_POST['guest']);
$event = intval($_POST['events']);
$message = htmlspecialchars($_POST['message']);

// var_dump($name,$email,$guest,$event,$message);
// die();
//store the product in the database

    $query = "INSERT INTO reservations (name,email,guest,events,message) VALUES (?,?,?,?,?)";
    $stmt = $cn->prepare($query);
    $stmt->bind_param("ssiis",$name,$email,$guest,$event,$message);
    $stmt->execute();
    $stmt->close();
    $cn->close();

    header("Location: /");

