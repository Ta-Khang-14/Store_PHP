<?php 
    session_start();
    include_once("../MySQL/dbprocess.php");
    if(isset($_SESSION['infor'])) {

        include_once("../Cart/getCart.php");

        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }
        $getOrderQuery = '';
        $getOrderQuery = "SELECT 
            product.name,orders.city,orders.province,orders.district,orders.createdAt,orders.status, 
            order_detail.idOrder, order_detail.id, order_detail.quantity, order_detail.price,order_detail.total 
            FROM orders INNER JOIN order_detail ON orders.id = idOrder
            INNER JOIN product ON product.id = idProduct WHERE idUser='$idUser'";
        $product = executeResult($getOrderQuery);

        $exist = array();
        $arrangeByOrders = array();
        for($i=0; $i < count($product); $i++) {
            $temp = array();
            if(!in_array($product[$i]['idOrder'],$exist) ) {
                array_push($temp, $product[$i]);
                array_push($exist,$product[$i]['idOrder']);

                for($j = 0; $j < count($product); $j++) {
                    if($i != $j) {
                        if($product[$i]['idOrder'] == $product[$j]['idOrder']) {
                                array_push($temp, $product[$j]);
                        }
                    }
                }
                array_push($arrangeByOrders, $temp);
            } 

        }
    }

?>