<?php 
    include "./elems/message.php";
    $nameError = $emailError = $textError = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['text'])) {
        if(empty($_POST['name'])){
            $nameError = "Ошибка поле Имя должно быть заполнено";
        } else {
            $name = clearString($link, $_POST['name']);
        }

        if(empty($_POST['email'])){
            $emailError = "Ошибка поле Email должно быть заполнено";
        } else {
            $email = clearString($link, $_POST['email']);
            preg_match('#^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$#', $email, $emailMathes);
            if(!isset($emailMathes[0])){
                $emailError = "Неверный формат email";
            }
        }

        if(empty($_POST['text'])){
           $textError = "Ошибка поле Текст должно быть заполнено";
        } else {
            $text = clearString($link, $_POST['text']);
        }
        
        if(isset($name) and isset($email) and isset($text)){
            $_SESSION['message'] = "Письмо успешно отправлено";
            $sendEmail = [
                'title' => 'Контакт',
                'name' => $name,
                'email' => $email,
                'text' => $text
            ];
            sendEmail($sendEmail, 'contact');
            header("Location: /contacts.html");
        }

        

    }
    
?>



<div class="container">
    <div class="row">
        <div class="column">
                <div class="post">
                    <h3>Написать нам</h3>
                    <div class="blog-post">
                        <h4>Для связи используйте форму ниже:</h4>
                        <form method="POST" class="contact">
                            <label>Ваше имя: <br><input type="text" name="name" ></label><?= $nameError ?><p>
                            <label>Емайл: <br><input type="email" name="email" ></label><?= $emailError ?><p>
                            <label>Сообщение:</label> <br><textarea name="text" ></textarea><?= $textError ?><p>
                            <input  type="submit" value="Отправить сообщение">
                        </form>
                        
                    </div>
                </div>
        </div>
    </div>


</div>