<?php

    // insert, update, delete
    function execute($sql)
    {
        include('connect.php');

        // open connect
        mysqli_set_charset($conn, "utf8");

        // query
        $result = mysqli_query($conn, $sql);

        // close connect
        mysqli_close($conn);

        return $result;
    }
    
    // select
    function executeResult($sql) {

        include('connect.php');

        $result = mysqli_query($conn, $sql);
        $data = array();
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               array_push($data, $row);
            }
        }


        return $data;
    }
?>