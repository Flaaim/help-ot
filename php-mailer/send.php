<?php

require "./php-mailer/Exception.php";
require "./php-mailer/PHPMailer.php";
require "./php-mailer/SMTP.php";


function sendEmail($sendEmail, $type){
    // Формирование самого письма
    switch($type){
        case 'add':
            $title = $sendEmail['title'];
            $body = "
                <h2>Новое письмо</h2>
                <b>Имя:</b> {$sendEmail['name']}<br><br>
                <b>Email:</b> {$sendEmail['email']}<br><br>
                <b>Название документа:</b> {$sendEmail['nameofDoc']}<br><br>
                <b>Путь: </b> {$sendEmail['target_file']}<br><br>
                ";
        break;
        case 'contribute':
            $title = $sendEmail['title'];
            $body = "
                <h2>Новое письмо</h2>
                <b>Имя:</b> {$sendEmail['name']}<br><br>
                <b>Email:</b> {$sendEmail['email']}<br><br>ир 
                <b>Биография/опыт:</b>{$sendEmail['bio']}<br><br>
                ";
        break;
        case 'contact':
            $title = $sendEmail['title'];
            $body = "<h2>Сообщение</h2>
            <b>Имя:</b> {$sendEmail['name']}<br><br>
            <b>Email:</b> {$sendEmail['email']}<br><br>ир 
            <b>Сообщение:</b>{$sendEmail['text']}<br><br>
            ";
        break;      
    }
    
    
        $mail = new PHPMailer\PHPMailer\PHPMailer();
                try {
                    $mail->isSMTP();   
                    $mail->CharSet = "UTF-8";
                    $mail->SMTPAuth   = true;
                    //$mail->SMTPDebug = 2;
                    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
                
                    // Настройки вашей почты
                    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
                    $mail->Username   = 'admin@help-ot.ru'; // Логин на почте
                    $mail->Password   = 'pTuOJOi3e$u3'; // Пароль на почте
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port       = 465;
                    $mail->setFrom('admin@help-ot.ru', 'help-ot.ru'); // Адрес самой почты и имя отправителя
                
                    // Получатель письма
                    $mail->addAddress('admin@help-ot.ru');  
                    
                
                    // Отправка сообщения
                    $mail->isHTML(true);
                    $mail->Subject = $title;
                    $mail->Body = $body;    
                    
                    // Проверяем отравленность сообщения
                    if ($mail->send()) {$result = "success";
                    
                    } 
                    else {$result = "error";}
                
                } catch (Exception $e) {
                    $result = "error";
                    $recoveryEmail = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
                }
    }