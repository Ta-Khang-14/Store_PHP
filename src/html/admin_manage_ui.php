<?php
    if($_SESSION['infor']['role'] == 'admin') {
        echo '
        <div class="col-xl-3 col-md-6">
        <div class="card bg-pattern" id="manage-product">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-archive text-primary h4 ml-3"></i>
                    </div>
                    <p class="text-muted mb-0">Sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6" >
            <div class="card bg-pattern xemdonhang" id="manage-order">
                <div class="card-body">
                    <div class="float-right">
                        <i class="fa fa-th text-primary h4 ml-3"></i>
                    </div>
                    <p class="text-muted mb-0">Đơn hàng</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern" id="manage-user">
                <div class="card-body">
                    <div class="float-right " style="color: #007bff;">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <p class="text-muted mb-0">Người dùng</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6" id="filter-product">
            <div class="card bg-pattern" id="report">
                <div class="card-body">
                    <div class="float-right " style="color: #007bff;">
                        <i class="fa-regular fa-file"></i>
                    </div>
                    <p class="text-muted mb-0">Thống kê</p>
                    <select class="form-control mt-2 w-100 filter-record">
                        <option value="year">Top sản phẩm theo năm</option>
                        <option value="month">Top sản phẩm theo tháng</option>
                        <option value="day">Top sản phẩm theo ngày</option>
                    </select >
                </div>
            </div>
        </div>
        
        ';
    }

?>