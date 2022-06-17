<?php 
    include("../helper/getRequest.php");
    include("../MySQL/dbprocess.php");
    session_start();

    if(isset($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }

        $id = getGet('id');
        $product = executeResult("SELECT * FROM product WHERE id='$id'");

        $sql = "SELECT * FROM cart WHERE idUser = '$idUser'";
        $idCart = executeResult( $sql)[0]['id'];

        $productId = $product[0]['id'];
        $productPrice = $product[0]['price'];

        if(isset($_GET['quantity'])) {
            $quantity = $_GET['quantity'];
        } else {
            $quantity = 1;
        }

        $total = $quantity * $productPrice;

        $checkProductCart = "SELECT * FROM cart_detail INNER JOIN cart ON cart.id = idCart WHERE idProduct = '$productId'";
        $existsProduct = executeResult($checkProductCart);

        if(!empty($existsProduct)) {
            $updateQuantity = "UPDATE cart_detail SET quantity=cart_detail.quantity + $quantity, total=cart_detail.total + $total WHERE idProduct = '$productId'";
            if(execute($updateQuantity)) {
                $_SESSION["alert"] = "Thêm sản phẩm vào giỏ hàng thành công!";
            } else {
                $_SESSION["alert"] = "Thêm sản phẩm vào giỏ hàng thất bại!";
            }

        } else {
            $sql3 = "INSERT INTO cart_detail(idProduct, idCart, quantity, price, total) VALUES ('$productId','$idCart','$quantity','$productPrice','$total')";
            $response = execute($sql3);
            if($response) {
                $_SESSION["alert"] = "Thêm sản phẩm vào giỏ hàng thành công!";
            } else {
                $_SESSION["alert"] = "Thêm sản phẩm vào giỏ hàng thất bại!";
            }
        }
        if(isset($_GET['back'])) {
            $url = $_GET['back'];
        } else {
            $url = "index.php";
        }
        header("Location: ../html/$url");

    } else {
        header("Location: ../html/index.php");
    }
?>