<?php 
    session_start();
    include_once("../Cart/getCart.php");
    if(isset($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }

        $sql = "SELECT * FROM  account INNER JOIN address ON account.id = userID WHERE userID='$idUser'";
        $address = executeResult($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header_store.php')?>
    <body>
        <?php include("navbar.php");  var_dump($address);?>
        <form class="container pt-5 my-4" method="#" action="#">
            <h1 class="h3">Chọn địa chỉ</h1>
            <select type="text" required name="idAddress" class="form-control" id="form-select-1" placeholder="#">
                <option value="0">Chọn địa chỉ của bạn</option>
                <?php
                    foreach($address as $item) {
                        $detail = $item['name'].'-'.$item['phone'].'-'.$item['home'].'-'.$item['district'].'-'.$item['province'].'-'.$item['city'];
                        echo '<option value="'.$item['id'].'">'.$detail.'</option>';
                    }
                ?>
            </select>
        </form>
        <script>
            $('document').ready(() => {
                $('#form-select-1').on('change', (e) => {
                    if($('#form-select-1 option:selected').val()) {
                       let idAddrress = $('#form-select-1 option:selected').val();
                       $.get("../Order/renderOrder.php",{id: idAddrress}, (data) => {
                            $("#form-order-1").html(data);
                       })
                    }
                })
            })
        </script>
        <form class="container pt-5" method="POST"  action="../Order/createOrder.php">
            <h1 class="h3">Đặt hàng</h1>
            <div class="row">
            <!-- Left -->
            <div class="col-lg-8" id="form-order-1">
                <div class="accordion" id="accordionPayment">
                    <!-- Credit card -->
                    <div class="accordion-item mb-3">
                        <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Người nhận hàng</label>
                                        <input type="text" required name="name" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" required class="form-control" name="phone" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Thành phố/Tỉnh</label>
                                        <input type="text" required name="city" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Quận/Huyện</label>
                                        <input type="text" required class="form-control" name="province" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Xã/Phường</label>
                                        <input type="text" required class="form-control" name="district" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Địa chỉ nhà</label>
                                            <textarea type="text" class="form-control" name="address" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Ghi chú</label>
                                            <textarea type="text" class="form-control" name="note" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            <!-- Right -->
            <div class="col-lg-4">
                <div class="card position-sticky top-0">
                <div class="p-3 bg-light bg-opacity-10">
                    <h6 class="card-title mb-3">Chi tiết đơn hàng</h6>
                    <?php
                        $sum = 0;
                        foreach($product as $item) {
                            $sum += $item['total'];
                            echo '
                                <div class="d-flex justify-content-between mb-1 small">
                                    <span>'.$item['name'].'<br /><b>'.' '.$item['quantity'].' x '. number_format($item['price']).'đ</b>'.'</span> <span><b>'.number_format($item['total']).'đ</b></span>
                                </div>
                            ';
                        }
                    ?>

                    <hr>
                    <div class="d-flex justify-content-between mb-4 small">
                    <span>TOTAL</span> <strong class="text-dark"><?= number_format($sum) ?>đ</strong>
                    </div>
                    <div class="form-check mb-1 small">
                    <input class="form-check-input" required type="checkbox" value="" id="tnc">
                    <label class="form-check-label" for="tnc">
                        Tôi đồng ý với điều khoản của website
                    </label>
                    </div>
                    <div class="form-check mb-3 small">
                    </div>
                    <button class="btn btn-primary w-100 mt-2">Đặt hàng</button>
                </div>
                </div>
            </div>
            </div>
        </form>
        <?php include("footer.php")?>
        <?php include("mobile_nav.php")?>
        
    </body>
</html>