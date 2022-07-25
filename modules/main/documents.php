<?php
    include "elems/ads.php";
    include "var.php";
?>


    <div class="container">
        <h1>Документация по охране труда и смежным разделам</h1>
        <p>Все документы представлены в ознакомительных целях. Для выбора документа используйте навигацию по типу документа или направлению. Скачать образец документа вы можете перейдя на его страницу. Все отзывы и предложения направляйте на admin@help-ot.ru</p>
        <h2>Навигация</h2>
        <?php echo $ads1; ?>
        <h3>Тип документа</h3>
            <div class="row _rowdocumenttype">
                
                                 <?php 

                   showDocumentType($link, '0');
                                    ?>
                    
            </div>
            <?php echo $ads2; ?>
            <h3>Раздел</h3>
            <div class="row _rowdocumenttype">
        
                <?php    
                    showDocumentType($link, '1');
                   ?>
   
            </div>
            <?php 
            include "elems/search.php";
            echo $ads3; 
        ?>
    </div>

            <div class="container">
                <div class="row">  
                                
                            <?php 
                            
                            showDocuments($link);
                             
                            
                           
                            ?>
                </div>
            </div>


