<?php

    if(isset($_SESSION['contribute_message'])){
        $contribute_message = $_SESSION['contribute_message'];

        echo "
        <div class=\"container\">
        <p class=\"message\">$contribute_message</p>
        </div>
        ";
        unset($_SESSION['contribute_message']);
    }
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];

        echo "
        <div class=\"container\">
        <p class=\"message\">$message</p>
        </div>
        ";
        unset($_SESSION['message']);
    }

    if(isset($_SESSION['upload_file'])){
        $upload_file = $_SESSION['upload_file'];

        echo "
        <div class=\"container\">
        <p class=\"message\">$upload_file</p>
        </div>
        ";
        unset($_SESSION['upload_file']);
    }
