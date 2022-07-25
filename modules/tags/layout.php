<?php
    include "var.php";
?>
<div class="container">
        <div class="row">
            <div class="column">
                <div class="post">
                        <h2><?php 
                        echo $tags; 
                        ?></h2>
                    <div class="blog-post">
                        <?php 
                        showTags($link, $tags);  
                        ?>
                   </div>
                </div>
            </div>
        </div>
</div>