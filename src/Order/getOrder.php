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

        $next = !empty($_GET['current']) ? $_GET['current']+1 : 2;
        $prev = !empty($_GET['current']) ? $_GET['current']-1 : 0;
        $limit = 8;
        $offset = $prev * $limit;
        
        $getOrderQuery = '';
        if($_SESSION['infor']['role'] == 'user') {
            $getOrderQuery = "SELECT 
                product.name,orders.city,orders.province,orders.district,orders.createdAt,orders.status, 
                order_detail.idOrder,orders.name as 'TenNgNhan', order_detail.id, order_detail.quantity, order_detail.price,order_detail.total 
                FROM orders INNER JOIN order_detail ON orders.id = idOrder
                INNER JOIN product ON product.id = idProduct WHERE idUser='$idUser'" ;
            $countQuery = "SELECT count(*) as SL FROM orders";
        } else {
            $getOrderQuery = "SELECT account.name as 'userName', product.name,orders.city,orders.province,orders.district,orders.createdAt
                ,orders.status, order_detail.idOrder, orders.idUser, order_detail.id, order_detail.quantity, order_detail.price,
                order_detail.total FROM orders INNER JOIN order_detail ON orders.id = idOrder 
                INNER JOIN product ON product.id = idProduct INNER JOIN account ON account.id = idUser ";
            $countQuery = "SELECT count(*) as SL FROM orders";
        }
        $product = executeResult($getOrderQuery);
        $sumRecord = executeResult($countQuery)[0]['SL'];

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