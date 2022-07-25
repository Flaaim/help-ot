<?php
        include 'var.php';
?>



<div class="container">
    <div class="row">
        <div class="column">
            <div class="post">

            <h3><? showCategory($link, $category) ?></h3>
            <div class="blog-post">
            <?php
                echo $ads;

                showBlogPostCategory($link, $category)
            ?>
            </div>
            </div>
        </div>
    </div>
</div>