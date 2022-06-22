<?php 
    session_start();
    include_once("../MySQL/dbprocess.php");
    if(isset($_SESSION['infor'])) {

        include_once("../Cart/getCart.php");
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }
        $id = $_GET['id'];
        $getOrderQuery = '';
        if($_SESSION['infor']['role'] == 'user') {
            $getOrderQuery = "SELECT 
                product.name,orders.city,orders.province,orders.district,orders.createdAt,orders.status,orders.phone, orders.name as 'TenNgNhan',
                order_detail.idOrder, order_detail.id, order_detail.quantity, order_detail.price,order_detail.total, orders.createdAt
                FROM orders INNER JOIN order_detail ON orders.id = idOrder
                INNER JOIN product ON product.id = idProduct WHERE idUser='$idUser' AND order_detail.idOrder='$id'" ;
            $countQuery = "SELECT count(*) as SL FROM orders";
        } else {
            $getOrderQuery = "SELECT account.name as 'userName', orders.phone, product.name,orders.city,orders.province,orders.district,orders.createdAt, orders.name as 'TenNgNhan'
                ,orders.status, order_detail.idOrder, orders.idUser, order_detail.id, order_detail.quantity, order_detail.price,
                order_detail.total, orders.createdAt FROM orders INNER JOIN order_detail ON orders.id = idOrder 
                INNER JOIN product ON product.id = idProduct INNER JOIN account ON account.id = idUser 
                WHERE order_detail.idOrder='$id'";
            $countQuery = "SELECT count(*) as SL FROM orders";
        }
        $product = executeResult($getOrderQuery);
        $sumRecord = executeResult($countQuery)[0]['SL'];
        $exist = array();
        $arrangeByOrders = array();
        for($i=0; $i < count($product); $i++) {
            $temp = array();
            if(!in_array($product[$i]['idOrder'],$exist) ) {
                array_push($temp, $product[$i]);
                array_push($exist,$product[$i]['idOrder']);

                for($j = 0; $j < count($product); $j++) {
                    if($i != $j) {
                        if($product[$i]['idOrder'] == $product[$j]['idOrder']) {
                                array_push($temp, $product[$j]);
                        }
                    }
                }
                array_push($arrangeByOrders, $temp);
            } 

        }
    }

?>
<div class="row">
    <div class="col-lg-12">        
        <div class="card">
            <div class="card-body">
                <!-- BEGIN INVOICE -->
                <div class="col-xs-12">
                    <div class="grid invoice">
                        <div class="grid-body">
                            <div class="invoice-title">
                                <br>
                                <div class="row" style="padding: 0px 15px;">
                                    <div class="col-xs-12">
                                        <h2>Hóa đơn<br>
                                        <span class="small">Hóa đơn: #<?=$arrangeByOrders[0][0]['idOrder'] ?></span></h2>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="padding: 0px 15px;">
                                <div class="col-xs-6">
                                    <address>
                                        <strong>Người nhận</strong><br>
                                        <?=$arrangeByOrders[0][0]['TenNgNhan'] ?><br>
                                        <?=$arrangeByOrders[0][0]['phone'] ?><br>
                                        <strong>Địa chỉ nhận</strong><br>
                                        <?php 
                                            if(isset($arrangeByOrders[0][0]['home'])) {
                                                echo $arrangeByOrders[0][0]['home']."<br>";
                                            }
                                            if(isset($arrangeByOrders[0][0]['note'])) {
                                                echo $arrangeByOrders[0][0]['note']."<br>";
                                            }
                                        ?>
                                       <?=$arrangeByOrders[0][0]['district'] ?><br>
                                       <?=$arrangeByOrders[0][0]['province'] ?><br>
                                       <?=$arrangeByOrders[0][0]['city'] ?><br>
                                        
                                    </address>
                                </div>
                            </div>
                            <div class="row" style="padding: 0px 15px;">
                                <div class="col-xs-6 text-left">
                                    <address>
                                        <strong>Ngày đặt hàng</strong><br>
                                        <?=$arrangeByOrders[0][0]['createdAt'] ?><br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>CHI TIẾT HÓA ĐƠN</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="line">
                                                <td class="text-left"><strong>Tên sản phẩm</strong></td>
                                                <td class="text-center"><strong>Giá</strong></td>
                                                <td class="text-center"><strong>Số lượng</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
                                                $sum = 0;
                                                foreach($arrangeByOrders[0] as $item) {
                                                    echo '
                                                        <tr>
                                                            <td><strong>'.$item['name'].'</strong></td>
                                                            <td class="text-center">'.$item['quantity'].'</td>
                                                            <td class="text-center">'.number_format($item['price']).'</td>
                                                        </tr>
                                                    ';
                                                    $sum += $item['quantity'] * $item['price'];

                                                }
                                                
                                                ?>

                                            <tr>
                                                <td colspan="2" class="text-right"><strong>Tổng tiền:</strong></td>
                                                <td class="text-center"><strong> <?=number_format($sum) ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>									
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END INVOICE -->
            </div>
        </div>
    </div>
</div>