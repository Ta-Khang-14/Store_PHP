<?php 
    session_start();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive project-list">
                    <table class="table project-table table-centered table-nowrap">
                        <thead>
                            <tr>
                                <?php 
                                    include_once("../MySQL/dbprocess.php");

                                    $next = !empty($_GET['next']) ? $_GET['next'] : 2;
                                    $prev = !empty($_GET['prev']) ? $_GET['prev'] : 0;
                                    $prev = $prev < 0 ? 0 : $prev;
                                    $limit = !empty($_GET['limit']) ? $_GET['limit'] : 5;
                                    $offset = $prev * $limit;

                                    $sql = "SELECT id, name, email, isActive FROM account WHERE role='user'";

                                    $sumRecord = executeResult("SELECT count(*) as SL FROM account WHERE role='user'")[0]['SL'];
                                    $users = executeResult($sql);
                                ?>
                                <th style="text-align: start;" scope="col">ID</th>
                                <th style="text-align: start;" scope="col">Tên</th>
                                <th style="text-align: start;" scope="col">Email</th>
                                <th style="text-align: start;" scope="col">Trạng thái</th>
                                <th style="text-align: start;" scope="col">Tùy chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($users as $item) {
                                    $status = $item['isActive'] == 0 ? "Bị khóa" : "Hoạt động";
                                    $link =  $item['isActive'] == 0 ? '<a href="../Auth/deleteUser.php?id='.$item['id'].'&status=1" class="text-success m-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" id="editAddress"><i class="fa-solid fa-check m-0"></i></a> '
                                        : '<a href="../Auth/deleteUser.php?id='.$item['id'].'&status=0" class="text-danger delete-order" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"> <i class="fa fa-remove h5 m-0"></i></a>';
                                    echo '
                                    <tr>
                                        <th scope="row">'.$item['id'].'</th>
                                        <td>'.$item['name'].'</td>
                                        <td>
                                            '.$item['email'].'
                                        </td>
                                        <td>
                                            '.$status.'
                                        </td>
                                        <td>
                                            <div class="action text-start">
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