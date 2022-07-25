

<?php
    include "var.php";
    include "elems/ads.php";
?>

    <div class="container">
        <h1>Блог</h1> 
        <?php echo $ads1 ?>
        <h2>2022</h2>
        <div class="row">
            <?php showBlog($link, '2022') ?>
        </div>
        <h2>2021</h2>
        <div class="row">
            <?php showBlog($link, '2021') ?>
        </div>
        <h2>2020</h2>
        <?php echo $ads2 ?>
        <div class="row">
            
            <?php showBlog($link, '2020') ?>
        </div>
        <h2>2019</h2>
        <?php echo $ads3 ?>
        <div class="row">
            <?php showBlog($link, '2019') ?>
        </div>
        <h2>2018</h2>
        
        <div class="row">
            <?php showBlog($link, '2018') ?>
        </div>
        
        <h2>2017</h2>
        
        <div class="row">
            <?php showBlog($link, '2017') ?>
        </div>

    </div>