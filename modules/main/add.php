<?php
    include "./elems/message.php";
    $nameError = $emailError = $textError = $fileError = $nameofDocError = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES['fileToUpload']) and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['text']) and isset($_POST['nameofDoc'])){
        if(empty($_POST['name'])){
            $nameError = "Ошибка, поле Имя должно быть заполнено";
        } else{
            $name = clearString($link, $_POST['name']);
            preg_match('#^[a-zA-ZА-Яа-я]{4,12}$#u', $name, $nameMathed);
            if(!isset($nameMathed[0])){
                $nameError = "Неверный формат имени";
            }
        }

        if(empty($_POST['email'])){
            $emailError = "Ошибка, поле Email должно быть заполнено";
        } else{
            $email = clearString($link, $_POST['email']);
            preg_match('#^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$#', $email, $emailMathes);
            if(!isset($emailMathes[0])){
                $emailError = "Неверный формат email";
            }
        }

        if(empty($_POST['text'])){
            $textError = "Ошибка, поле Краткое описание документа должно быть заполнено";
        } else{
            $text = clearString($link, $_POST['text']);
        }
        if(empty($_POST['nameofDoc'])){
            $nameofDocError = "Ошибка, поле Название документа должно быть заполнено";
        } else {
            $nameofDoc = clearString($link, $_POST['nameofDoc']);
            preg_match('#^[a-zA-ZА-Яа-я ]{10,255}$#u',$nameofDoc, $nameofDocMathces);
            if(!isset($nameofDocMathces[0])){
                $nameofDocError = "Неверный формат названия документа";
            }
        }

        

        $target_dir = "uploads/";

        
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $wordFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;

        if($_FILES['fileToUpload']['size'] == 0 or $_FILES['fileToUpload']['error'] == 4){
            $fileError = "Не выбран файл для загрузки либо файл пустой";
            $uploadOk = 0;
         }
         elseif (file_exists($target_file)) {
            $fileError  = "Извините, файл с таким именем уже загружен";
             $uploadOk = 0;
           }
           elseif ($_FILES["fileToUpload"]["size"] > 500000) {
            $fileError = "Превышен максимально допустимый размер файла";
            $uploadOk = 0;
          }
          
          elseif($wordFileType != 'docx' and $wordFileType != 'doc' and $wordFileType != 'rtf'){
            $fileError = "Неверный формат файла";
            $uploadOk = 0;
          }
          
          if($uploadOk != 0 and isset($name) and isset($email) and isset($text) and isset($nameofDoc) and empty($nameError) and empty($emailError) and empty($textError) and empty($nameofDocError)){
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
                    $_SESSION['upload_file'] = "Ваш файл успешно загружен на сервер, после проверки (5-7 дней) он будет добавлен в базу документов";
                    $sendEmail = [
                        'title' => 'Добавление документа на сайт',
                        'name' => $name,
                        'email' => $email,
                        'nameofDoc' => $nameofDoc,
                        'target_file' => $target_file
                    ];
                    
                    sendEmail($sendEmail, 'add');
                  
                    header("Location: /add.html");



                }
          }
    } else {
        $_POST['name'] = "";
        $_POST['email'] = "";
        $_POST['nameofDoc'] = "";
        $_POST['text'] = "";
    }


?>



<div class="container">
    <div class="row">
        <div class="column">
                <div class="post">
                    <div class="blog-post-article">
                        <div class="docs-post">
                    <h1>Добавить документ на сайт</h1>
                <p>На страницах данного сайта, я собрал очень много различных полезных документов, которые могут пригодиться в работе специалисту по охране труда</p>
                <p>Если у вас есть документ по охране труда, пожарной безопасности, промышленной безопасности, бдд, электробезопасности или охране окружающей среды, который по вашему мнению будет полезен читателям блога, вы можете добавить его на сайт<p>
                <p>После проверки (обычно 5-7 дней), на ваш емайл придет письмо об успешном добавлении документа</p>
                <p><b>ВНИМАНИЕ!</b> <br>Перед отправкой документа его необходимо обезличить, т.е. убрать все упоминания названия компании, ФИО должностных лиц и т.д.</p>
                <h2>Загрузка файла</h2>
                Для загрузки документа, воспользуйтесь формой ниже, либо напишите мне на admin@help-ot.ru с пометкой "документ на сайт".
                <p>
                Если у вас несколько документов или отличается его формат пишите на admin@help-ot.ru.

                <h3>Требования к загружаемым файлам:</h3>
                
                <ol>
                    <li>Формат Microsoft word (docx, doc, rtf)</li>
                    <li>Размер не более 5 мб</li>
                </ol>
                    <p>Чтобы отправить документ воспользуйтесь следующей формой:<p>
                    <div class="blog-post">
                        <form enctype="multipart/form-data" action="" method="POST">
                        <label>Ваше имя: <input type="text" name="name" value="<?= $_POST['name'] ?>"></label>
                        <?php echo "<p class=\"messageError\">$nameError</p>"; ?>
                        <label>Email для связи: <input type="email" name="email" value="<?= $_POST['email'] ?>"></label>
                        <?php echo "<p class=\"messageError\">$emailError</p>"; ?> 
                        <label>Название документа <input type="text" name="nameofDoc" value="<?= $_POST['nameofDoc'] ?>"></label>
                        <?php echo "<p class=\"messageError\">$nameofDocError</p>"; ?> 
                        <label>Краткое описание документа: <br><textarea name="text" ><?= $_POST['text'] ?></textarea></label>
                        <?php echo "<p class=\"messageError\">$textError</p>"; ?><p>
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                        <label>Файл: (Word)<br><input type="file" name="fileToUpload" id="fileToUpload" ></label>
                        <?php echo "<p class=\"messageError\">$fileError</p>"; ?>
                        
                        <input type="submit" value="Загрузить файл" name="submit">
                        </form>
                        <p>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>


</div>