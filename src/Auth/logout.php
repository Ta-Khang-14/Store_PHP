<?php 
    session_start();
    if(isset($_SESSION['infor'])) {
        $_SESSION['infor'] = null;
    }
    header("Location: ../html/index.php");
?>