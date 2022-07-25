<?php
    include "var.php";
    include "elems/ads.php";
?>

<div class="container">
<h1>Новости/Обновления</h1>
    <p>
    Хотите получать последние новости, новые НПА, разъяснения государственных органов и т.д.? <a href="https://t.me/+awRas7UeCR0zZmUy" class="telegram-invite-link">Подписывайтесь</a> на наш телеграмм канал! 
    </p>
    <div class="row">
        <div class="column">
                <div class="post">
                        <div class="blog-post">
                            <?php 
                            
                            showNews($link);
                            ?>
                        </div>
                        
                    </div>
                </div>
        </div>
    </div>


</div>