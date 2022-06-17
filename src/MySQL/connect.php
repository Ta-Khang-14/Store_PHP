<?php
    include("config.php");

    $conn = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASE);
    mysqli_set_charset($conn, "utf8");

    if(!$conn) {
        header("Location: error.html");
    }
?>