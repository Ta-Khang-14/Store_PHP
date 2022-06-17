
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive project-list">
                    <table class="table project-table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <th style="text-align: start;" scope="col">ID</th>
                                <th style="text-align: start;" scope="col">Thời gian tạo</th>
                                <th style="text-align: start;" scope="col">Địa chỉ</th>
                                <th style="text-align: start;" scope="col">Sản phẩm</th>
                                <th style="text-align: start;" scope="col">Số lượng</th>
                                <th style="text-align: start;" scope="col">Giá</th>
                                <th style="text-align: start;" scope="col">Tổng tiền</th>
                                <th style="text-align: start;" scope="col">Hủy đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include_once('../Order/getOrder.php');
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
                                        $products .= '<p>'.$a['name'].'</p>';
                                        $quantitys .= '<p>'.$a['quantity'].'</p>';
                                        $prices .= '<p>'.$a['price'].'</p>';
                                        $sum += ($a['quantity'] * $a['price']);
                                    }
                                    echo '
                                    <tr>
                                        <th scope="row">'.$item['0']['idOrder'].'</th>
                                        <td>'.$item['0']['createdAt'].'</td>
                                        <td>
                                            '.$diachi.'
                                        </td>
                                        <td>
                                            '.$products.'
                                        </td>
                                        <td>
                                            '.$quantitys.'
                                        </td>
                                        <td>
                                            '.$prices.'
                                        </td>
                                        <td>
                                            '.$sum.'
                                        </td>
                                        <td>
                                            <div class="action text-center">
                                                <a href="../Order/deleteOrder.php?id='.$item[0]['idOrder'].'" class="text-danger delete-order" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
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
                <?php include_once("../Other/pagnition.php"); ?>
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