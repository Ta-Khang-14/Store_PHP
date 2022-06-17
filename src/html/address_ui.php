
    <div class="row">
        <!-- Left -->
        <div class="col-lg-12">
            <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3 card p-4">
                    <form action="../Address/addAddress.php" method="post" id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
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
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 mt-2" id="themmoidiachi">
                                           Thêm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
