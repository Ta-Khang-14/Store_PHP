<div class="row">
        <!-- Left -->
        <div class="col-lg-12">
            <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3 card p-4">
                    <form action="../Auth/changePassword.php" method="post" id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
                        <div class="accordion-body">
                            <div class="row flex-column">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Mật khẩu cũ</label>
                                    <input type="password" required name="password" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" required class="form-control" name="newPassword" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" required name="confirmPassword" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 mt-2" id="themmoidiachi">
                                           Đổi mật khẩu</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>