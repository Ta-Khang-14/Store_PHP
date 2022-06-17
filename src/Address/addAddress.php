<?php
    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }
    
        if(!empty($_POST)) {

            // Lay thong tin tu client gui len
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $city = $_POST["city"];
            $province = $_POST["province"];
            $district = $_POST["district"];
            $address = empty($_POST["address"]) ? "" : $_POST["address"];
            $note = empty($_POST["note"]) ? "" : $_POST["note"];
            
            $sql = "INSERT INTO address(userID, home, note, district, city, province,phone) VALUES ('$idUser','$address','$note','$district','$city','$province','$phone')";
            $response = execute($sql);
            if($response) {
                $_SESSION['alert'] = "Thêm địa chỉ thành công";
            } else {
                $_SESSION['alert'] = "Có lỗi xảy ra";
            }
            header("Location: ../html/me.php");
        }

    } else {
        $_SESSION['alert'] = "Bạn cần đăng nhập!";
        header("Location: ../html/index.php");
    }
?>