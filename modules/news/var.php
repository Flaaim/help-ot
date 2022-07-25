<?php

include "./elems/ads.php";

function showArticlePost($link, $news, $ads1, $ads2){
    $sql = "SELECT news.id, title, text,  news_category.category, DATE_FORMAT(date, '%d.%m.%Y') AS date, name, uri, cpu, news_category.url FROM news
    LEFT JOIN news_category ON news_category.id = news.category
    LEFT JOIN blog_authors ON blog_authors.id = news.author WHERE cpu = '$news'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        foreach($data as $v) 
    {
            $title = $v['title'];
            $date = $v['date'];
            $text = $v['text'];
            $name = $v['name'];
            $author_uri = $v['uri'];
            $category = $v['category'];
            $new_section = $v['url'];
            
        

        $showArticle = '';
        $showArticle .= "<h1>$title</h1>
        <span class=\"author-date\">Написал: <a href=\"../author/$author_uri.html\">$name</a> - $date 
        | <a href=\"../newssection/$new_section.html\">$category</a></span><br>";
    
        
        $showArticle .= $ads1;
        $showArticle .= "<div class=\"article-post\">$text
        $ads2</div>
        <div class=\"tags support\"><a href=\"/support.html\">Поддержать проект</a></div>";
        
        return $showArticle;
    }
} 

function showRelatedNews($link, $title) {
    $sql = "SELECT title, cpu, MATCH(title, text) AGAINST('$title') AS score
    FROM news 
    WHERE MATCH(title, text) AGAINST('$title') AND title != '$title'
    ORDER BY score DESC LIMIT 5";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    
    foreach ($data as $v){
        echo "<a href=\"{$v['cpu']}.html\"><h3>{$v['title']}</h3>
        </a>";
    }
   
}  