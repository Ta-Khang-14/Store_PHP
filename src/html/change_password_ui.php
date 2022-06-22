<div class="row">
        <!-- Left -->
        <div class="col-lg-12">
            <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3 card p-4">
                    <form action="../Auth/changePassword.php" method="post" id="collapseCC" class="accordion-collapse collapse show blabla" data-bs-parent="#accordionPayment" style="">
                        <div class="accordion-body">
                            <div class="row flex-column">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Mật khẩu cũ</label>
                                    <input type="password" required name="password" class="form-control" id="new-0" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" required class="form-control" name="newPassword" id="new-1" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                    <label class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" required name="confirmPassword" class="form-control" id="new-2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 mt-2" id="themmoidiachi">
                                           Đổi mật khẩu</button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="red-danger" style="color: red;"></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
    <script>
        let err ="";
        $(".blabla").on("submit", function(e) {
        
            err="";
            let numbers = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{4,}$/;
            
            if( $('#new-1').val() != $('#new-2').val()) {
                err = "Mật khẩu không trùng khớp";
            }
            if( !$('#new-2').val().match(numbers)) {
                err = "Mật khẩu chứa ít nhất 4 kí tự trong đó có: Kí tự hoa, thường, số";
            }
            if( !$('#new-1').val().match(numbers)) {
                err = "Mật khẩu chứa ít nhất 4 kí tự trong đó có: Kí tự hoa, thường, số";
            }
            if( !$('#new-0').val().match(numbers)) {
                err = "Mật khẩu chứa ít nhất 4 kí tự trong đó có: Kí tự hoa, thường, số";
            }
            console.log(err);
            if(!err) {
                $("#blabla").submit();
            } else {
                e.preventDefault();
                $(".red-danger").text(err);
            }
        })
    </script>