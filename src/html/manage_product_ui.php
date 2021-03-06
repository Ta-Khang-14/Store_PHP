<?php 
    session_start(); 
    include_once("../MySQL/dbprocess.php");

    $sumRecord = executeResult("SELECT count(*) as SL FROM product")[0]['SL'];
    $next = !empty($_GET['next']) ? $_GET['next'] : 2;
    $prev = !empty($_GET['prev']) ? $_GET['prev'] : 0;
    $prev = $prev < 0 ? 0 : $prev;
    $countSum = !empty($_GET['countSum']) ? $_GET['countSum'] : 0;
    $limit = !empty($_GET['limit']) ? $_GET['limit'] : 5;
    $offset = $prev * $limit;

    $sql = "SELECT * FROM product";
    $products = executeResult($sql);
    
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="btn btn-danger m-4" style="max-width: 200px;" id="addNewProduct">
                Thêm mới sản phẩm
            </div>
            <div class="card-body">
                <div class="table-responsive project-list">
                    <table class="table project-table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <th style="text-align: start;" scope="col">ID</th>
                                <th style="text-align: start;" scope="col">Thời gian tạo</th>
                                <th style="text-align: start;" scope="col">Tên</th>
                                <th style="text-align: start;" scope="col">Giá</th>
                                <th style="text-align: start;" scope="col">Số lượng bán</th>
                                <th style="text-align: start;" scope="col">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($products as $item) {
                                    $id = $item['id'];
                                    $sumQuery = executeResult("SELECT sum(quantity) AS SLB FROM order_detail GROUP BY idProduct HAVING idProduct='$id'");
                                    $sum = !empty($sumQuery) ? $sumQuery[0]['SLB'] : 0;
                                    $link =  $item['isDeleted'] == 1 ? '<a href="../Product/deleteProduct.php?id='.$item['id'].'&status=0" class="text-success m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-check m-0"></i></a> '
                                        : '<a href="../Product/deleteProduct.php?id='.$item['id'].'&status=1" class="text-danger delete-order" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>';
                                    echo '
                                    <tr>
                                        <th scope="row">'.$id.'</th>
                                        
                                        <td>
                                            '.$item['createdAt'].'
                                        </td>
                                        <td>'.$item['name'].'</td>
                                        <td>
                                            '.number_format($item['price']).'
                                        </td>
                                        <td>
                                            '.$sum.'
                                        </td>
                                        <td>
                                            <div class="action text-center">
                                                <a href="#" data-id="'.$id.'" class="text-success m-0 change-product" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-pencil"></i></a> <br/>
                                                '.$link.'
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