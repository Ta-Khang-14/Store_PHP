<?php
    session_start();
    include_once("../MySQL/dbprocess.php");
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = join("",explode(",",$_POST['price']));
    $idType = $_POST['type'];

    $target_dir = "../assets/pictures/products/";
    $img = "";
    if (isset($_FILES['img'])) {
        if ($_FILES['img']['error'] > 0) {
            $_SESSION['alert'] = "Có lỗi xảy ra";
            header("Location: ../html/me.php");
        }
        else {
            move_uploaded_file($_FILES['img']['tmp_name'], $target_dir . $_FILES['img']['name']);
            $img = "../assets/pictures/products/". $_FILES['img']['name'];
        }
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if(isset($GET['img'])) {
            $sql = "UPDATE product SET name='$name', description='$description', 
                price='$price', imgs='$img', idType='$idType' WHERE id='$id'";
        } else {
            $sql = "UPDATE product SET name='$name', description='$description', 
                price='$price', idType='$idType' WHERE id='$id'";
        }
    } else {
        $date = date("Y-m-d");
        $sql = "INSERT INTO product(name,description, price, imgs, idType, createdAt) VALUES ('$name','$description',$price,'$img','$idType','$date')";
        
    }
    if(execute($sql)) {
        $_SESSION['alert'] = "Thành công";
        header("Location: ../html/me.php");
    }

?>