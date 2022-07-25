<?php 

    include "var.php";

    echo $ads2;
?>


<div class="container">
        <div class="row">
            <div class="column">
                <div class="post">
                    <div class="blog-post-article">
                    
                                <?php 
                            
                                echo showDocs($link, $docs, $ads1, $ads3);
                            
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
                            docsAuthors($link, $docs);
                            ?>
                               
                        </div>
                    </div>



                </div>
            </div>       
</div>

      