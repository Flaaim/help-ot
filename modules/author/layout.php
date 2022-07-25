<?php
    include "var.php";
?>
<div class="container-author">
            <div class="container">
                <div class="row">
                    <div class="column">
                        <div class="author">
                        <?php 
                        
                        showAuthor($link, $author);
                        
                        ?>
                        </div>
                    </div>



                </div>
            </div>       
</div>

<div class="container">
        <div class="row">
            <div class="column">
                <div class="post">
                <h2>Все статьи автора</h2>
                    <div class="blog-post">
                        <?php showArticleswithAuthorId ($link, $author); ?>
                   </div>
                </div>
            </div>
        </div>
</div>
<div class="container">
    <h2>Документы автора</h2>
<div class="row">
    <?php
    
    showDocsAuthorId($link, $author);
    ?>
    
</div>
</div>