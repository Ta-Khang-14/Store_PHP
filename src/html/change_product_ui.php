<?php
    include_once("../MySQL/dbprocess.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $product = executeResult("SELECT * FROM product WHERE id='$id' AND isDeleted=0")[0];
    
?>

<div class="row">
    <div class="col-lg-12">
        <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3 card p-4">
                    <form action="../product/changeProduct.php?id=<?=$id?>" method="post" id="collapseCC" class="accordion-collapse collapse show change-product-form" data-bs-parent="#accordionPayment" enctype="multipart/form-data" style="">
                        <div class="accordion-body">
                            <div class="row flex-column">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" required name="name" class="form-control" value="<?=$product['name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input type="text" required class="form-control" id="price1" name="price" value="<?=number_format($product['price'])?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                        <textarea type="text" class="form-control"  required name="description"><?=$product['description']?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh minh họa</label>
                                        <img id="imgs" src="<?=$product["imgs"]?>" alt="" style="max-width: 160px; max-height: 160px;">
                                        <div class="btn btn-danger m-3" id="xx1">Thay đổi ảnh</div>
                                        <input type="file" id="xx2" class="form-control d-none" name="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Danh mục</label>
                                        <select type="text" class="form-control" required name="type">
                                            <?php 
                                                $type = executeResult("SELECT * FROM type");
                                                foreach($type as $ct) {
                                                    if($ct['id'] == $product['idType']) {
                                                        echo '<option selected value="'.$ct['id'].'">'.$ct['name'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$ct['id'].'">'.$ct['name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="red-danger" style="color: red;"></p>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 mt-2" id="btn-2">
                                           Sửa
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
</div>

<?php
    } else {
?>
<div class="row">
    <div class="col-lg-12">
        <div class="accordion" id="accordionPayment">
                <!-- Credit card -->
                <div class="accordion-item mb-3 card p-4">
                    <form action="../product/changeProduct.php" method="post" id="collapseCC" class="accordion-collapse collapse show change-product-form" data-bs-parent="#accordionPayment" enctype="multipart/form-data" style="">
                        <div class="accordion-body">
                            <div class="row flex-column">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm</label>
                                    <input type="text" required name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input type="text" required class="form-control" id="price1" name="price">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Mô tả</label>
                                        <textarea type="text" class="form-control"  required name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ảnh minh họa</label>
                                        <input type="file" id="xx2" class="form-control" readonly name="img">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                    <label class="form-label">Danh mục</label>
                                        <select type="text" class="form-control" required name="type">
                                            <option value="">Chọn thể loại</option>
                                            <?php 
                                                $type = executeResult("SELECT * FROM type");
                                                foreach($type as $ct) {
                                                    echo '<option value="'.$ct['id'].'">'.$ct['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="red-danger" style="color: red;"></p>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button class="btn btn-primary w-100 mt-2" id="btn-2">
                                           Thêm sản phẩm
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
</div>

<?php
    }
?>

<script>
$("document").ready(() => {
    $("#xx1").on("click", (e) => {
        $("#xx2").addClass("d-block");
        $("#imgs").addClass("d-none");
        $("#xx1").addClass("d-none");
    })
})
let err = "";
$(".change-product-form").on("submit", function(e) {
    
    err="";
    let numbers = /^[0-9]+$/;
    if( !$('#price1').val().split(",").join("").match(numbers)) {
        err = "Giá tiền sai định dạng";
    }
    if(!err) {
        $(".change-product-form").submit();
    } else {
        e.preventDefault();
        $(".red-danger").text(err);
    }
    
})
</script>