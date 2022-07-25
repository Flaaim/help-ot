<?php

function blogAuthors($link, $blog){
    $sql = "SELECT author, name, bio, avatar, blog_authors.uri, cpu FROM blog 
    LEFT JOIN blog_authors ON blog_authors.id = blog.author
    WHERE cpu = '$blog'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    if(empty($row['avatar'])) {
        $avatar = "../profiles/default-avatar.jpg";
    } else {
        $avatar = $row['avatar'];
    }
    echo "<img src=\"$avatar\" loading=\"lazy\" alt=\"author foto\">";
    echo "<div class=\"bio\">
    <h4>{$row['name']}</h4>
    <p>{$row['bio']}</p>
    <a href=\"./author/{$row['uri']}.html\">Профиль</a> | <a href=\"./subscribe.html\">Подписаться</a> 
    </div>";
    
}


function docsAuthors($link, $docs){
    $sql = "SELECT author, name, bio, avatar, blog_authors.uri, cpu FROM new_docs 
    LEFT JOIN blog_authors ON blog_authors.id = new_docs.author
    WHERE cpu = '$docs'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    if(empty($row['avatar'])) {
        $avatar = "../profiles/default-avatar.jpg";
    } else {
        $avatar = $row['avatar'];
    }
    echo "<img src=\"$avatar\" loading=\"lazy\" alt=\"author foto\">";
    echo "<div class=\"bio\">
    <h4>{$row['name']}</h4>
    <p>{$row['bio']}</p>
    <a href=\"../author/{$row['uri']}.html\">Профиль</a> | <a href=\"../subscribe.html\">Подписаться</a> 
    </div>";
}


function newsAuthors($link, $news){
    $sql = "SELECT author, name, bio, avatar, blog_authors.uri, cpu FROM news 
    LEFT JOIN blog_authors ON blog_authors.id = news.author
    WHERE cpu = '$news'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    if(empty($row['avatar'])) {
        $avatar = "../profiles/default-avatar.jpg";
    } else {
        $avatar = $row['avatar'];
    }
    echo "<img src=\"$avatar\" loading=\"lazy\" alt=\"author foto\">";
    echo "<div class=\"bio\">
    <h4>{$row['name']}</h4>
    <p>{$row['bio']}</p>
    <a href=\"../author/{$row['uri']}.html\">Профиль</a> | <a href=\"../subscribe.html\">Подписаться</a>
    </div>";
    
}
