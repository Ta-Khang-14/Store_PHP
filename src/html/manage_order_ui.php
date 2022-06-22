<?php include_once('../Order/getOrder.php'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive project-list">
                    <table class="table project-table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <th style="text-align: start;" scope="col">ID</th>
                                <?php 
                                    if($_SESSION['infor']['role'] == 'admin') {
                                        echo '                                
                                            <th style="text-align: start;" scope="col">ID User</th>
                                            <th style="text-align: start;" scope="col">Tên User</th>';
                                    } else {
                                        echo '                                
                                            <th style="text-align: start;" scope="col">Tên người nhận</th>';
                                        
                                    }
                                ?>
                                <th style="text-align: start;" scope="col">Thời gian tạo</th>
                                <th style="text-align: start;" scope="col">Địa chỉ</th>
                                <th style="text-align: start;" scope="col">Tổng tiền</th>
                                <th style="text-align: start;" scope="col">Trạng thái</th>
                                <th style="text-align: start;" scope="col">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($arrangeByOrders as $item) {
                                    $diachi = '';
                                    if(isset($item['0']['address'])) {
                                        $diachi = $item['0']['address'].'-'.$item['0']['district'].'-'.$item['0']['province'].'-'.$item['0']['city'];
                                    }
                                    else {
                                        $diachi = $item['0']['district'].'-'.$item['0']['province'].'-'.$item['0']['city'];
                                    }
                                    $products = "";
                                    $quantitys = "";
                                    $prices = "";
                                    $sum = 0;
                                    foreach($item as $a) {
                                        $sum += $a['quantity'] * $a['price'];
                                    }
                                        if($_SESSION['infor']['role'] == 'admin') {
                                            $row = '
                                                <a href="../Order/changeStatus.php?id='.$item[0]['idOrder'].'" class="text-success m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-check m-0"></i></a> <br/>
                                                <a href="" data-id="'.$item[0]['idOrder'].'" class="infor-order text-success m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-circle-info"></i></a> <br/>
                                                <a href="../Order/deleteOrder.php?id='.$item[0]['idOrder'].'" class="text-danger delete-order" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
                                            ';
                                            $addRow = '
                                                <td>'.$item['0']['idUser'].'</td>
                                                <td>'.$item['0']['userName'].'</td>
                                            ';
                                        } else {
                                            $row = '
                                                <a href="" data-id="'.$item[0]['idOrder'].'" class="infor-order text-success m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-circle-info"></i></a> <br/>
                                                <a href="../Order/deleteOrder.php?id='.$item[0]['idOrder'].'" class="text-danger delete-order" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
                                            ';
                                            $addRow = '
                                                <td>'.$item['0']['TenNgNhan'].'</td>
                                            ';
                                        }

                                        echo '
                                        <tr>
                                            <th scope="row">'.$item['0']['idOrder'].'</th>
                                            '.$addRow.'
                                            <td>'.$item['0']['createdAt'].'</td>
                                            <td>
                                                '.$diachi.'
                                            </td>
                                            <td>
                                                '.number_format($sum).'
                                            </td>
                                            <td>
                                                '.$item['0']['status'].'
                                            </td>
                                            <td>
                                                <div class="action text-center">
                                                    '.$row.'
                                                </div>
                                            </td>
                                        </tr>
                                        ';
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- end project-list -->
            </div>
        </div>
    </div>
</div>
<script>
    $('document').ready(() => {
        $('.delete-order').on('click', (e) => {
            if(!confirm("Bạn có chắc muốn xóa không?")) {
                e.preventDefault();
            }
        });
    });
</script>