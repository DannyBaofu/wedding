<?php 
    session_start();
    $id = $_POST["id"];
    $quantity = $_POST["quantity"];

    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"][$id] = $quantity;
    } else {
        $_SESSION["cart"][$id] += $quantity;
    }

    /*
    $_SESSION["cart] = [
        1=>1,
        2=>5

    ];
    
    */
?>