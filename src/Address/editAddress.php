<?php
    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {
        if(!empty($_POST)) {

            // Lay thong tin tu client gui len
            $id = $_GET['id'];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $city = $_POST["city"];
            $province = $_POST["province"];
            $district = $_POST["district"];
            $address = empty($_POST["address"]) ? "" : $_POST["address"];
            $note = empty($_POST["note"]) ? "" : $_POST["note"];
            
            $sql = "UPDATE address SET home='$address', note='$note',district='$district',city='$city',province='$province',phone='$phone' WHERE id=$id";
            $response = execute($sql);
            if($response) {
                $_SESSION['alert'] = "Sửa địa chỉ thành công";
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