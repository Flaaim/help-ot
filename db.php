<?php
 /*
        define ("DB_HOST","localhost");
        define("DB_LOGIN","root");
        define("DB_PASS","root");
        define ("DB_BASE","help-ot");
*/
      
        define ("DB_HOST","localhost");
        define("DB_LOGIN","u1656040_default");
        define("DB_PASS","3EWd6AD52aoYwCWp");
        define ("DB_BASE","u1656040_help-ot");
 
        

        $link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_BASE);

        mysqli_set_charset($link, "utf8");



    ?>