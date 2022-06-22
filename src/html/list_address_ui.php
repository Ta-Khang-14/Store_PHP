
            
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive project-list">
                        <table class="table project-table table-centered table-nowrap">
                            <thead>
                                <tr>
                                    <th style="text-align: start;" scope="col">Tên người nhận</th></th>
                                    <th style="text-align: start;" scope="col">Số điện thoại</th>
                                    <th style="text-align: start;" scope="col">Địa chỉ nhà</th>
                                    <th style="text-align: start;" scope="col">Địa chỉ</th>
                                    <th style="text-align: start;" scope="col">Ghi chú</th>
                                    <th style="text-align: start;" scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                include_once('../Address/getAddress.php');

                                foreach($address as $item) {
                                    echo '
                                    <tr>
                                        <th scope="row">'.$item['name'].'</th>
                                        <td>'.$item['phone'].'</td>
                                        <td>
                                            '.$item['home'].'
                                        </td>
                                        <td>
                                            '.$item['district'].' - '.$item['province'].' - '.$item['city'].'
                                        </td>
                                        <td>
                                            '.$item['note'].'
                                        </td>
                                        <td>
                                            <div class="action text-center">
                                                <a href="#" data-id="'.$item['id'].'" class="text-success mr-4" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"> <i class="fa fa-pencil h5 m-0"></i></a>
                                                <a href="../Address/deleteAddress.php?id='.$item['id'].'" class="text-danger delete-address" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>
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
    <!-- end row -->
    <script>
    $('document').ready(() => {
        $('.delete-address').on('click', (e) => {
            if(!confirm("Bạn có chắc muốn xóa không?")) {
                e.preventDefault();
            }
        });
    });
</script>
