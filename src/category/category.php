

<div class="row top-product">
                    <div class="col col-md-12 col-lg-12">
                        <h3>Top danh mục hàng đầu tháng</h3>
                        <div class="row top-product-wrapper">
                        <?php 
                            include("../helper/getRequest.php");

                            // GET list category
                            $sql = "SELECT * FROM category ";
                            $result = executeResult($sql);
                            $index = 1;

                            foreach($result as $item) {
                            
                                echo '                            
                                <div class="col col-md-6 col-lg-4 top-product-item">
                                    <div class="top-product-item-wrapper border d-flex align-items-center" >
                                        <div class="top-product-img">
                                            <a href="'."/product_ui.php?idCategory=".$item['id'].'">
                                                <img
                                                    src="../images/'.$index++.'.jpg"
                                                    alt=""
                                                />
                                            </a>
                                        </div>';


                                echo '
                                        <div class="top-product-title">
                                            <h4>';
                                
                                $sql1 = "SELECT * FROM type WHERE idCategory='".$item['id']."'";
                                $result1 = executeResult($sql1);

                                echo '
                                                <a href="'."product_ui.php?idCategory=".$item['id'].'">'.$item['name'].'</a>
                                            </h4>
                                            <ul>';
                                
                                foreach($result1 as $x) {
                                    echo '
                                        <li>
                                            <a
                                                class="position-relative"
                                                href="'."product_ui.php?idType=".$x['id'].'"
                                                >'.$x['name'].'</a
                                            >
                                        </li>
                                    ';
                                }

                                echo '
                                            </ul>
                                        </div>
                                    </div>
                                </div>';

                            }

                        ?>
                        </div>
                    </div>
                </div>