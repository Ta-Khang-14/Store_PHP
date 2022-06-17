<?php
    include_once("../MySQL/dbprocess.php");
    $idProduct = $_GET['idProduct'];
    $idCart = $_GET['idCart'];
    $productQuery = 
        "DELETE FROM cart_detail WHERE idProduct = '$idProduct' AND idCart='$idCart'";
    $response = execute($productQuery);
    if($response) {
        header("Location: ../html/cart_ui.php");
    }
?>