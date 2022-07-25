<?php
    include "var.php";
    include "./elems/ads.php";
?>

<div class="container">
    <div class="row">
        <div class="column">
            <div class="post">
            <div class="blog-post-article">
                    <?php 
                   
                   echo showArticlePost($link, $news, $ads1, $ads2);
                   
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="container-author">
            <div class="container">
                <div class="row">
                    <div class="column">
                        <div class="author">
                            <?php 
                        
                        include "./elems/author.php";
                        newsAuthors($link, $news);
                            
                            ?>
                               
                        </div>
                    </div>



                </div>
            </div> 
                
        </div>
        
        <div class="container">
        <?php echo $ads3; ?>
    <div class="row">
       
        <div class="column">
            <div class="post">
                <h2>Похожие статьи</h2>
            <div class="blog-post-article">
                 <?php 
                    echo $ads;
                    
                    echo showRelatedNews($link, $title);
                    
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>