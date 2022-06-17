<?php 
    include_once("../MySQL/dbprocess.php");
    if( !empty($_GET['id']) ) {
        $id = $_GET['id'];
        $address = executeResult( "SELECT * FROM account INNER JOIN address on account.id = address.userID WHERE address.id='$id' ");
    }
?>

            <div class="row">
            <!-- Left -->
            <div class="col-lg-8">
                <div class="accordion" id="accordionPayment">
                    <!-- Credit card -->
                    <div class="accordion-item mb-3">
                        <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Người nhận hàng</label>
                                        <input type="text" required name="name" class="form-control" placeholder="" value="<?=$address[0]['name']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" required class="form-control" name="phone" placeholder="" value="<?=$address[0]['phone']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Thành phố/Tỉnh</label>
                                        <input type="text" required name="city" class="form-control" placeholder="" value="<?=$address[0]['city']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Quận/Huyện</label>
                                        <input type="text" required class="form-control" name="province" placeholder="" value="<?=$address[0]['province']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                        <label class="form-label">Xã/Phường</label>
                                        <input type="text" required class="form-control" name="district" placeholder="" value="<?=$address[0]['district']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Địa chỉ nhà</label>
                                            <textarea type="text" class="form-control" name="address" placeholder="" ><?=$address[0]['home']?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label">Ghi chú</label>
                                            <textarea type="text" class="form-control" name="note" placeholder="" ><?=$address[0]['note']?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
