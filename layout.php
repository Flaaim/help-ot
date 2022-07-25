<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
	<script charset="UTF-8" src="//web.webpushs.com/js/push/01ef6e8d280a4a47ed8af025397c9861_1.js" async></script>
    <!-- Yandex.RTB -->
    <script>window.yaContextCb=window.yaContextCb||[]</script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>
    
    <script src="//web.webformscr.com/apps/fc3/build/loader.js" async sp-form-id="3c046caaa3b3f4c7466af0dea5a6d9c634f0c215dfc685a3dbc7ba994e82ae4a"></script>
     <link rel="shortcut icon" href="../css/logo/fav.ico">
            <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72184430-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-72184430-2');
    </script>

        
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link rel="canonical" href="<?php echo $canonical ?>">
    
    
    
</head>


<body>
<script type="text/javascript">
var infolinks_pid = 3368907;
var infolinks_wsid = 0;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
    <div class="navbar">
        <div class="container">
            <div class="row">
                    <div class="column _brand">
                        <a href="/" class="brand">Охрана труда</a>
                        
                            
                        </div>

                    <div class="column _links">
                        <a href="/blog.html">Блог</a>
                        <a href="/documents.html">Документы</a>
                        <a href="/news.html">Новости</a>
                        <a href="/contacts.html">Контакты</a>
                    </div>
            </div>
        </div>
    </div>
<main>
<?php
    include $content;
    
?>

</main>


<div class="footer">
<div class="container">
    <div class="row">
        <div class="column">
        
                        
                        <?php 
                        echo $adsFooterSlide;
                        include "elems/footer.php"; 
                        ?>
                        
        
        </div>
    </div>  
</div>
            <div class="blog_time">help-ot.ru Блог охраны труда <?php echo date("Y");?> год</div>
</div>

</body>
<?php
        include "elems/subscription-form.php";
?>
<?php include "elems/arrow_up.html"; ?>
<script src="/js/button_up.js"></script>
</html>