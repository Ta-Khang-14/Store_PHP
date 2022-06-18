<?php
    $pageNum = $sumRecord%$limit == 0 ? $sumRecord/$limit : floor($sumRecord/$limit) + 1;
?>
<div class="pt-3">
    <ul class="pagination justify-content-end mb-0">
        <li class="page-item">
            <a class="page-link" data-page="<?=($prev-1)?>" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php 
            for($i = 0; $i < $pageNum; $i++) {
                $a = $i == $prev ? "active" : "";
                $b = $i == $prev ? "unActive" : "";
                echo '<li class="page-item '.$a.'"><a data-page="'.$i.'" class="page-link '.$b.'" href="#">'.($i+1).'</a></li>';
            }
        ?>
        <li class="page-item">
            <a class="page-link" data-page="<?=($prev+1)?>" href="#">Next</a>
        </li>
    </ul>
</div>