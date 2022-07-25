<?php
    session_start();
    include "db.php";
    include "functions.php";
    include "php-mailer/send.php";
    include "redirects.php";
    

    


    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = '/';
        $content = 'modules/main/layout.php';
        $title = "Блог охраны труда";
        $description = 'Блог по охране труда и техники безопасности в котором рассмтриваются основные вопросы обеспечения безопасных условий труда работающих на предприятии и соблюдения требований охраны труда и пожарной безопасности ';
        $keywords = 'Охрана труда, техника безопасности, блог, блог охраны труда, пожарная безопасность, электробезопасность, промышленная безопасность, инструктажи, обучение по охране труда, специальная оценка условий труда, несчастные случае на производстве, медосомотры, приказы по охране труда, инструкции по охране труда, инструктажи по охране труда ';
        $canonical = 'https://help-ot.ru';
    } 
    $allowed_pages = ['contacts','blog', 'documents', 'subscribe', '404', 'contribute', '/','news', 'add', 'support'];
    if(!in_array($page, $allowed_pages)){
        header("location: 404.html");
    }
    if($page == 'contacts'){
        $content = 'modules/main/contacts.php';
        $title = "Контакты";
        $description = "Раздел обратной связи. Оставляйте свои вопросы и предложения по работе сайта";
        $keywords = "контакты, обратная связь, вопросы, контакт";
        $canonical = "https://help-ot.ru/contacts.html";
    }
    if($page == 'blog'){
        $content = 'modules/main/blog.php';
        $title = "Все статьи блога";
        $description = "Все статьи блога по направлениям охрана труда, пожарная безопасность, промышленная безопасность, экология, электробезопасность и т.д.";
        $keywords = "перечень статей сайта, перечень статей, статьи, статьи блога охраны труда, охрана труда";
        $canonical = "https://help-ot.ru/blog.html";
    }
    if($page == 'documents'){
        $content = 'modules/main/documents.php';
        $title = "Все образцы документов блога";
        $description = "Все образцы документов представленные на сайте по типам и направлениям";
        $keywords = "образцы документов, документы по охране труда, охрана труда, образцы, документация, примеры документов по охране труда";
        $canonical = "https://help-ot.ru/documents.html";
    }
    if($page == 'subscribe'){
        $content = 'modules/main/subscribe.php';
        $title = "Подписаться на обновления сайта";
        $description = "Для того, чтобы подписаться на обновления сайта используйте форму";
        $keywords = "подписка на обновления, обновления сайта, подписка, подписаться на обновления";
        $canonical = "https://help-ot.ru/subscribe.html";
    }
    if($page == '404'){
        $content = 'modules/main/404.php';
        $title = "Страницы не существует";
        $description = "Ошибка 404. Страницы не существует";
        $keywords = "404, ошибка, страница 404";
        $canonical = "https://help-ot.ru/404.html";
    }
    if($page == 'contribute'){
        $content = 'modules/main/contribute.php';
        $title = "Стать автором";
        $description = "Вы можете стать автором блога или предложить свою статью";
        $keywords = "автор, стать автором, предложить статью, автор блога";
        $canonical = "https://help-ot.ru/contribute.html";
    }
    if($page == 'news'){
        $content = 'modules/main/news.php';
        $title = "Новости охраны труда";
        $description = "";
        $keywords = "новости, новости охраны труда, новости, обновления";
        $canonical = "https://help-ot.ru/news.html";
    }
    if($page == 'add'){
        $content = 'modules/main/add.php';
        $title = "Добавить документ на сайт";
        $description = "На данной странице вы можете добавить свой документ по охране труда.";
        $keywords = "проекты, проекты по охране труда, охрана труда, добавит документ, документация";
    }
    if($page == 'support'){
        $content = 'modules/main/support.php';
        $title = "Поддержать проект";
        $description = "Поддержать блог охраны труда. Поддержка help-ot.ru";
        $keywords = "поддержка, поддержать, help-ot, поддержать блог, блог охраны труда, поддержать блог охраны труда";
    }

    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $content = 'modules/category/layout.php';
        $title = "Направление: " . showSeoCategory($link, $category)['category'];
        $description = "Раздел " .showSeoCategory($link, $category)['category']. " блога. Перечень статей по направлению";
        $keywords = "$category, раздел блога $category, перечень статей по направлению ";
        $canonical = "https://help-ot.ru/$category.html";


        //Список допустимых категорий

        $allowed_category = ['ohrana-truda', 'pojarnay-bezopastnost', 'promyshlenay-bezopastnost', 'bezopastnost-dorojnogo-dvizenia', 'ekologia', 'electro-bezopastnost', 'safety', 'all'];
        if(!in_array($category, $allowed_category)){
            header("Location: ../404.html");
        }
    }
    if(isset($_GET['newssection'])){
        
        $newsSection = $_GET['newssection'];
        $content = 'modules/newssection/layout.php';
        $canonical = "https://help-ot.ru/newssection/$newsSection.html";
        $title = 'Новости блога: '.showSeoNewsSection($link, $newsSection)['category'];
        $description = 'Раздел новостей блога '.showSeoNewsSection($link, $newsSection)['category'];
        $keywords = 'новости '.showSeoNewsSection($link, $newsSection)['category'].' новости, новости блога, ' .showSeoNewsSection($link, $newsSection)['category']; 

        //список допустимых категорий новостей 
        $allowed_newscategory = ['incidents', 'newdocosandnpa', 'explanation', 'supervision'];
        if(!in_array($newsSection, $allowed_newscategory)){
            header("Location: ../404.html");
        }
        

        
    }
    if(isset($_GET['blog'])){
        $blog = $_GET['blog'];
        
        $content = 'modules/blog/layout.php';
        $canonical = "https://help-ot.ru/$blog.html";
                
        $title = showSeoBlog($link, $blog)['title'];
        $description = showSeoBlog($link, $blog)['description'];
        $keywords = showSeoBlog($link, $blog)['keywords'];
                
                
                //Список доступных статей блога
                $sql = "SELECT COUNT(*) as cpu FROM blog WHERE cpu = '$blog'";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                $count = mysqli_fetch_assoc($result)['cpu'];
                if($count != 1){
                header("Location: /404.html");
                } 
    }
    if(isset($_GET['news'])){
        
        $news = $_GET['news'];
        
        $content = 'modules/news/layout.php';
        $canonical = "https://help-ot.ru/$news.html";
        
        //Список доступных новостей
        $sql = "SELECT COUNT(*) as cpu FROM news WHERE cpu = '$news'";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        $count = mysqli_fetch_assoc($result)['cpu'];
        if($count != 1){
        header("Location: /404.html");
        } 
        $title = showSeoNews($link, $news)['title'];
        $description = showSeoNews($link, $news)['description'];
        $keywords = showSeoNews($link, $news)['keywords'];
        
    } 
    if(isset($_GET['docs'])){
        $docs = $_GET['docs'];
        $content = 'modules/documents/layout.php';
        $title = showSeoDocs($link, $docs)['title'];
        $description = "Полное название документа: ".showSeoDocs($link, $docs)['full_name']." Тип документа: " .showSeoDocs($link, $docs)['type']." Раздел: " . showSeoDocs($link, $docs)['razdel'];
        
    
        $keywords = showSeoDocs($link, $docs)['keywords'];
        $canonical = "https://help-ot.ru/docs/$docs.html";

            //Список доступных статей блога
            $sql = "SELECT COUNT(*) as cpu FROM new_docs WHERE cpu = '$docs'";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                $count = mysqli_fetch_assoc($result)['cpu'];
                if($count != 1){
                header("Location: /404.html");
                }

    }
    if(isset($_GET['tags'])){
        $tags = $_GET['tags'];
        $content = 'modules/tags/layout.php';
        $title = "Тэг: $tags";
        $description = "Список статей по тэгу: $tags";
    }
    //АВТОРЫ САЙТА
    if(isset($_GET['author'])){
        $author = $_GET['author'];
        $content = 'modules/author/layout.php';
        $title = "Автор: $author";
        $description = "Профиль автора сайта блог охраны труда: $author. Список статей и документов автора";
        $keywords = "Автор сайта, автор, $author, автор блога";
        $canonical = "https://help-ot.ru/author/$author.html";


        //Список допусщенных авторов сайта
        $allowed_authors = ['admin'];
        if(!in_array($author, $allowed_authors)){
           header("Location: ../404.html");
        }
    }
    


    if(isset($_GET['type'])){
        $type = $_GET['type'];
        $content = 'modules/type/layout.php';
        
        $title = "Тип документа: " . showSeoType($link, $type)['type'];
        $description = "Список образцов документов по типу " . showSeoType($link, $type)['type'];

                //Список доступных типов документов блога
                $sql = "SELECT url FROM docs_type";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                $allowed_types = [];
                foreach($data as $v){
                    $allowed_types[] = $v['url'];
                }
                if(!in_array($type, $allowed_types)){
                    header("Location: ../404.html");
                }


    }

    if(isset($_GET['doc_section'])){
        $doc_razdel = $_GET['doc_section'];
        $content = "modules/doc_section/layout.php";
    }

    if(isset($_GET['type']) AND isset($_GET['doc_section'])){
        $type = $_GET['type'];
        $doc_razdel = $_GET['doc_section'];
        $content = "modules/typeandsection/layout.php";
        
    }

    //var_dump($_SERVER['REQUEST_URI']);
    preg_match('#\.php\?page=\d+#', $_SERVER['REQUEST_URI'], $matches1);
    
    preg_match('#[a-z]+\.php#', $_SERVER['REQUEST_URI'], $matches2);
    //var_dump($matches2);
    if(!empty($matches1) || !empty($matches2)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header('Location: /');
    }
    
    /*
    preg_match('#(\.php)#', $_SERVER['REQUEST_URI'], $matches);
    if(!empty($matches)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header("Location: /");
    }
  
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $location);
        exit;
    } 
 */
    include "layout.php";


    //REDIRECTS
    

?>






