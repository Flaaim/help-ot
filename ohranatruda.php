<?php

        include "./elems/ads.php";
        include "db.php";
        $id = $_GET['id'];


    $sql = "SELECT oldurl, cpu FROM blog";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $uri = "";
        //var_dump($_SERVER['REQUEST_URI']);
        function redirectOldUrl($data){
            global $uri;
            foreach($data as $v){
                    if($v['oldurl'] == $_SERVER['REQUEST_URI']){
                            return $uri = $v['cpu'];
                            return true;
                    }             
            }
             
        }
        
        redirectOldUrl($data);


        if(redirectOldUrl($data)){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: $uri.html");
                exit();
        } 
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=141'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/poimenyi-spisok-rabtnikov-podlejashih-medicinskim-osmotram.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=60'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/plan-meropriatyi-po-lokalizacii-i-likvidacii-posledstvyi-avaryi-na-opo.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=226'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/polojenie-o-rasledovanii-avariy-na-opo.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=278'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/protokol-proverki-znaniy-raboty-na-vysote.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=220'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/bilety-po-ohrane-truda-stropashik.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=136'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/perrechen-profesiy-podlejashih-stajirovke-na-rabochem-meste.html");
        }elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=144'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/polozenie-o-narydnoi-systeme.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=57'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/instruktsiya-po-okhrane-truda-pri-rabote-s-gsm.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=110'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/programma-provedenia-vvodnogo-instructaja-po-bdd.html");
        }elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=149'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/karta-identificawci-opasnostey-i-ochenki-riska.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=277'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/prikaz-o-primenenye-kasok.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=78'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /sredstva-podmashivania-trebovania.html");
        }
        elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=147'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /sredstva-podmashivania-trebovania.html");
        }elseif($_SERVER['REQUEST_URI'] == '/ohranatruda.php?id=260'){
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: /docs/polojenie-o-provedenie-stajirovok.html");
        }
        
        
        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9466483815741375"
             crossorigin="anonymous"></script>
                
           
            
             
             <link rel="shortcut icon" href="../css/logo/fav.ico">
                    <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72184430-2"></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
        
                gtag('config', 'UA-72184430-2');
                </script>
                <?php
        $sql = "SELECT title, content, keywords FROM blogot WHERE id = '$id'"; 
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        
        
        
        
                ?>
                <title><?php echo $row['title']; ?></title>
                <meta name="description" content="<?php echo $row['content']; ?>">
                <meta name="keywords" content="<?php echo $row['keywords']; ?>">
                <link rel="canonical" href="<?php //echo $canonical ?>">
                <style>
                        nav {
          background-color: #ADD8E6;
          
        }
        nav a {
          text-decoration: none;
          color: #333;
        }
        nav a:hover {
          color: blue;
        }
        .container {
          max-width: 1000px;
          margin-left: auto;
          margin-right: auto;
        }
        .row {
          display: flex;
          flex-direction: row;
          justify-content: center;
          
        }
        .message {
          text-align: center;
          border: 1px dashed #ADD8E6;
          padding: 0.5rem;
          font-size: 18px;
          
        }
        .message span {
          color: red;
        }
        nav ol {
          list-style: none;
          padding: 0;
        }
        nav li {
          display: inline;
          padding: 10px;
        }
        
                </style>
        </head>
        <body>
        <nav>
          <div class="container">
          <div class="row">
            <div class="column">
                <ol>
                  <a href="/"><li>Главная</li></a>
                  <a href="blog.html"><li>Блог</li></a>
                 <a href="documents.html"> <li>Документы</li></a>
                </ol>
            </div>
          </div>
        </div>
        </nav>
        
        
        
        <div class="container">
          <div class="row">
            <div class="column">
                <p class="message">
                <span>Внимание!</span> Вы попали на старую версию сайта. <br>В ближайшее время данная страница будет обновлена. <br>Некоторые функции/ссылки могут не работать
                </p>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            <div class="column">
                <?php
                        
                        $sql = "SELECT title, text1, text2 FROM blogot WHERE id = '$id'"; 
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        $row = mysqli_fetch_assoc($result);
                        echo "<h1>{$row['title']}</h1>";
                        echo $ads;
                        echo $row['text1'];
                        echo $ads;
                        echo $row['text2'];
                        echo $ads;
                ?>
        
        </div>
          </div>
        </div>
        </body>
        </html>