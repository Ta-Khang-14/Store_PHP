<?php
    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }
        $sub = 1;
        $ten ="";
        if( isset($_GET['day']) ) {
            $ten = "ngày";
            $day = getdate()['mday'];
            $month = getdate()['mon'];
            $year = getdate()['year'];
            $sub = " Day(orders.createdAt) = $day AND Month(orders.createdAt) = $month AND Year(orders.createdAt) = $year";
        }

        if( isset($_GET['month']) ) {
            $ten = "tháng";
            $month = getdate()['mon'];
            $year = getdate()['year'];
            $sub = " Month(orders.createdAt) = $month AND Year(orders.createdAt) = $year";
        }

        if( isset($_GET['year']) ) {
            $ten = "năm";
            $year = getdate()['year'];
            $sub = " Year(orders.createdAt) = $year";
        }

        $sql = "SELECT product.id,product.price, product.imgs, product.name,orders.createdAt, sum(order_detail.quantity) as SL FROM `product` 
        INNER JOIN order_detail ON product.id = order_detail.idProduct
        INNER JOIN orders ON orders.id = order_detail.idOrder
        WHERE isDeleted=0 AND ".$sub." 
        GROUP BY  order_detail.idProduct
        ORDER BY SL DESC LIMIT 5";

        $products = executeResult($sql);
    }
    $label = "[";
    $data = "[";
    foreach($products as $item) {
        $name = $item['name'];
        $label .= ("'$name'".",");
        $data .= ($item['SL'].",");
    }
    $data .="]";
    $label .= "]";
    echo '
        <div class="row">
            <div class="col-lg-12">        
                <div class="card">
                    <div class="card-body">
                        <canvas class="myChart" style="width:100%;" class="w-100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>
        (() => {
            const myChart = new Chart(document.getElementsByClassName("myChart")[0].getContext("2d"), {
                type: "bar",
                
                data: {
                    labels: '.$label.',
                    datasets: [{
                        label: "Sản phẩm bán chạy trong '.$ten.'",
                        data: '.$data.',
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)"
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)"
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })();
        
        </script>

    ';

?>
 