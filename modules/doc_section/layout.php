<?php
        include 'var.php';
        include "./modules/main/var.php";
?>
<div class="container">
        <h2>Навигация</h2>
            <div class="row _rowdocumenttype">
                
                                 <?php    
                    showDocumentType($link, '0', $doc_razdel, $type = '');
                    
                                    ?>
                    
            </div>
            <div class="row _rowdocumenttype">
                
                <?php    
                        showDocumentType($link, '1', $doc_razdel, $type);
                   ?>
   
            </div>

            <div class="row _rowdocumenttype">
                
              
   
            </div>
</div>

<div class="container">
    <h2><?php yourchoose($link, $doc_razdel, $type); ?> <a class="dropFilters" href="/documents.html">Сбросить все фильтры</a></h2>
        <div class="row">  
            <?php showDocuments($link, $doc_razdel, $type);?>
        </div>
</div>
    