<?php
        include 'var.php';
?>



<div class="container">
    <div class="row">
        <div class="column">
            <div class="post">

            <h3><?= showNewsSection ($link, $newsSection)?></h3>
            <div class="blog-post">
            <?php
               echo showNewsbySection($link, $newsSection);

                
            ?>
            </div>
            </div>
        </div>
    </div>
</div>