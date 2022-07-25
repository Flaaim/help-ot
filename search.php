<?php
        include "db.php";

    if(isset($_GET['search']) and $_SERVER['REQUEST_METHOD'] == "GET"){
            $content = "modules/search/search_result.php";
            $title = "Результаты поиска по запросу";
    }   

    include "layout.php";