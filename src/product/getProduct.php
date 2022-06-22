<?php
    include("../helper/getRequest.php");

    function getProductById() {
        $value = getGet('id');
        $sql = "SELECT * FROM product WHERE id='$value' AND isDeleted=0";
        $result = executeResult($sql);

        return $result;
    }

    function getProductsByIdType() {
        $value = getGet('idType');
        $sql = "SELECT product.id, product.name, description, price, imgs FROM 
            product INNER JOIN type ON product.idType = type.id WHERE type.id='$value' AND isDeleted=0";
        
        $subSql = '';
        if( !empty($_GET['price']) ) {
            $subSql = 'AND price <= '.getGet('price');
        }
        
        if( !empty($_GET['sort']) ) {
            $column = getGet('sort');
            if (str_contains($column,'-')) {
                $type = 'ASC';
                $column = explode('-',$column)[1];
            } else {
                $type = 'DESC';
            }
            $subSql = "ORDER BY ".$column." ".$type;
        }
        $sql = $sql.$subSql;
        $result = executeResult($sql);

        return $result;
    }

    function getProductsByIdCategory() {
        $value = getGet('idCategory');
        $sql = "SELECT product.id, product.name, description, price, imgs FROM product 
            INNER JOIN type ON product.idType = type.id 
            INNER JOIN category ON type.idCategory = category.id 
            WHERE category.id='$value' AND isDeleted=0 ";

        $subSql = '';
        if( !empty($_GET['price']) ) {
            $subSql = 'AND price <= '.getGet('price');
        }

        if( !empty($_GET['sort']) ) {
            $column = getGet('sort');
            if (str_contains($column,'-')) {
                $type = 'ASC';
                $column = explode('-',$column)[1];
            } else {
                $type = 'DESC';
            }
            $subSql = "ORDER BY ".$column." ".$type;
        }
        $sql = $sql.$subSql;

        $result = executeResult($sql);

        return $result;
    }

    function getProductByQuery() {
        
    }
?>