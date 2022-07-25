<?php


if($_SERVER['REQUEST_URI'] == '/electricity-safe.php?id=7'){
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: /komplect-prikazov-po-electrobezopastnosti.html");
}