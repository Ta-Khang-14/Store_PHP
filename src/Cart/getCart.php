<?php
    include_once("../helper/getRequest.php");
    include_once("../MySQL/dbprocess.php");
    if(!empty($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }

        $productQuery = 
            "SELECT * FROM cart INNER JOIN cart_detail ON cart.id = idCart 
                INNER JOIN product ON idProduct = product.id
                WHERE cart.idUser = '$idUser' AND isDeleted=0";
        $product = executeResult($productQuery);
    }
?>