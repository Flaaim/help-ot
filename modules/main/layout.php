<?php
include "var.php";

?>   
 <div class="container">
<div class="row">
    <div class="column">
            <div class="post">
            <h2>Новые статьи
                <a href="./all.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
                    <?php
                    echo $ads;
                    showBlogPost($link, 'all');
                    
                    ?>
            </div>
            </div>
    </div>

</div>

<?php echo $ads; ?>
<div class="row">
    <div class="column">
            <div class="post">
            <h2>Охрана труда
                <a href="./ohrana-truda.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
                <?php
                
                showBlogPost($link, 'ohrana-truda');
                ?>
            </div>
            </div>
    </div>

    <div class="column">
            <div class="post">
            <h2>Пож. безопасность
                <a href="./pojarnay-bezopastnost.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
            <?php
               
                showBlogPost($link, 'pojarnay-bezopastnost');
                ?>
            </div>
            </div>
    </div>

</div>


<div class="row">
    <div class="column">
            <div class="post">
            <h2>Пром. безопасность
                <a href="./promyshlenay-bezopastnost.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
                <?php
                
                showBlogPost($link, 'promyshlenay-bezopastnost');
                ?>
            </div>
            </div>
    </div>

    <div class="column">
            <div class="post">
            <h2>БДД
                <a href="./bezopastnost-dorojnogo-dvizenia.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
            <?php
                
                showBlogPost($link, 'bezopastnost-dorojnogo-dvizenia');
                ?>
            </div>
            </div>
    </div>

</div>

<div class="row">
    <div class="column">
            <div class="post">
            <h2>Экология
                <a href="./ekologia.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
                <?php
                
                showBlogPost($link, 'ekologia');
                ?>
            </div>
            </div>
    </div>

    <div class="column">
            <div class="post">
            <h2>электробезопасность
                <a href="./electro-bezopastnost.html" class="show-all">посмотреть все</a>
            </h2>
            <div class="blog-post">
            <?php
                
                showBlogPost($link, 'electro-bezopastnost');
                ?>
            </div>
            </div>
    </div>

</div>



</div>