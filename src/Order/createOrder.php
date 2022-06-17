<?php 

    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {

        include_once("../Cart/getCart.php");

        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $note = "";
        $address = "";

        if(!empty($_POST['note'])) {
            $note = $_POST['note'];
        }

        if(!empty($_POST['address'])) {
            $address = $_POST['address'];
        }
        $createdAt = date("Y-m-d");
        $createOrderQuery = "INSERT INTO orders( idUser, name, address, phone, city, province, district, note, status, createdAt) 
            VALUES ('$idUser','$name','$address','$phone','$city','$province','$district','$note','Đang giao hàng','$createdAt')";

        $response = execute($createOrderQuery);
        
        $orders = executeResult("SELECT * FROM orders WHERE idUser = '$idUser'");
        $idOrder = $orders[count($orders)-1]['id'];
        if($response) {
            foreach($product as $item) {
                $idProduct = $item['idProduct'];
                $quantity = $item['quantity'];
                $total = $item['total'];
                $price = $item['price'];
                $addProductQuery = "INSERT INTO order_detail(idOrder, idProduct, quantity, price, total) 
                    VALUES ('$idOrder','$idProduct','$quantity','$price','$total') ";
                $done = execute($addProductQuery);
                if($done) {
                    $cartQuery = "SELECT * FROM cart WHERE idUser = '$idUser'";
                    $cartId = executeResult($cartQuery)[0]['id'];
                    $removeProduct = "DELETE FROM cart_detail WHERE idCart='$cartId' AND idProduct='$idProduct'";
                    execute($removeProduct);
                    $_SESSION['alert'] = "Đặt hàng thành công!";
                }
                
            }
        }
    } else {
            $_SESSION['alert'] = "Có lỗi xảy ra!";
    }
    header("Location: ../html/index.php");
?>