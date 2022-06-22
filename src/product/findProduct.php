<?php
    include_once("../MySQL/dbprocess.php");
    $key = empty($_GET['key']) ? "" : $_GET['key'];
    $sql = "SELECT * FROM product WHERE name LIKE '%$key%' AND isDeleted=0";

    $subSql = '';
    if( !empty($_GET['price']) ) {
        $subSql = 'AND price <= '.$_GET['price'];
    }
    
    if( !empty($_GET['sort']) ) {
        $column = $_GET['sort'];
        if (str_contains($column,'-')) {
            $type = 'ASC';
            $column = explode('-',$column)[1];
        } else {
            $type = 'DESC';
        }
        $subSql = "ORDER BY ".$column." ".$type;
    }

    $sql .= $subSql;
    $product = executeResult($sql);
?>
