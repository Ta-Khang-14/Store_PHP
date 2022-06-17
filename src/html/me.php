<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header_store.php')?>
    <body>
        <?php include("navbar.php")?>
        <?php 
            if(!empty($_SESSION['alert'])) {
                $message = $_SESSION['alert'];
                echo "
                    <script>
                        alert('$message')
                    </script>";
                $_SESSION['alert'] = '';
            }
        ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-xl-2 col-md-12">
                    <div class="row">
                        <div class="card w-100">
                            <div class="card-body me-option">
                                <div class="table-responsive project-list">
                                        <table class="table project-table table-centered table-nowrap">
                                            <thead>
                                                <?php
                                                    if(isset($_SESSION['infor']) && $_SESSION['infor']['role'] == "admin" ) {
                                                        echo "
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#' id='admin-btn'>
                                                                        Quản lý
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#'>
                                                                    Đổi mật khẩu
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#'>
                                                                    Đăng xuất
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        ";
                                                    }
                                                ?>
                                                <?php
                                                    if(isset($_SESSION['infor']) && $_SESSION['infor']['role'] == "user" ) {
                                                        echo "
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#' id='xemdonhang'>
                                                                    Xem đơn hàng
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#' id='themdiachi'>
                                                                    Thêm địa chỉ
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='#' id='danhsachdiachi'>
                                                                    Danh sách địa chỉ
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col' id='doimatkhau'>
                                                                <a href='#'>
                                                                    Đổi mật khẩu
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th style='text-align: start;' scope='col'>
                                                                <a href='../Auth/logout.php'>
                                                                    Đăng xuất
                                                                </a>
                                                            </th>
                                                        </tr>
                                                        ";
                                                    }
                                                ?>

                                            </thead>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-md-12" id="main">

                </div>                               
                <script>
                    $("document").ready(() => {

                        $('#xemdonhang').on("click", (e) => {
                            $('#main').load("manage_order_ui.php");    
                        })
                        $('#themdiachi').on("click", (e) => {
                            $('#main').load("address_ui.php");    
                        })
                        $('#danhsachdiachi').on('click', (e) => {
                            $('#main').load("list_address_ui.php",() => {

                                let id = $('#editAddress').data('id');

                                $('#editAddress').on('click', (e) => {
                                    $.get('edit_address_ui.php', {id: id}, (data) => {
                                        $('#main').html(data);
                                    })
                                })
                            });
                        })
                        
                        $('#doimatkhau').on('click', (e) => {
                            $('#main').load("change_password_ui.php");
                        })
                    })
                </script>
            </div>
        </div>

        <?php include("footer.php")?>
        <?php include("mobile_nav.php")?>
    </body>
</html>