<?php
    include "var.php";
    include "./elems/ads.php";

    echo $ads2;
?>

<div class="container">
    <div class="row">
        <div class="column ">
            <div class="post">
                    <div class="blog-post-article">
                    <?php 
                    echo showArticlePost($link, $blog, $ads1);
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
                            blogAuthors($link, $blog);
                            
                            ?>
                               
                        </div>
                    </div>



                </div>
            </div> 
                
        </div>
        
        <div class="container">
        <?php echo $monetizerAds3; ?>
    <div class="row">
    
        <div class="column">
            <div class="post">
               
                <h2>Похожие статьи</h2>
            <div class="blog-post-article">
                    <?php 
                    echo $ads;
                    echo showRelatedPosts($link, $title);
                    
                    ?>
                    </div>
            </div>
        </div>
    </div>
</div>
