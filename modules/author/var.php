<?php


function showAuthor($link, $author) {
    $sql = "SELECT author, name, bio, avatar, cpu FROM blog 
    LEFT JOIN blog_authors ON blog_authors.id = blog.author
    WHERE blog_authors.uri = '$author'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    if(empty($row['avatar'])) {
        $avatar = "../profiles/default-avatar.jpg";
    } else {
        $avatar = $row['avatar'];
    }

    echo "<img src=\"$avatar\" alt=\"author foto\">";
    echo "<div class=\"bio\">
    <h4>{$row['name']}</h4>
    <p>{$row['bio']}</p>
    <p><a href=\"../subscribe.html\">Подписаться</a> | <a href=\"../contacts.html\">Написать автору</a> </p>
    </div>";
        }


 function showArticleswithAuthorId ($link, $author) {
            $sql = "SELECT cpu, title, DATE_FORMAT(date, '%d.%m.%Y') as date FROM blog 
            LEFT JOIN blog_authors ON blog_authors.id = blog.author
            
            WHERE uri = '$author'";
            $result = mysqli_query($link, $sql) or die (mysqli_error($link));
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

            foreach ($data as $v){
                echo "<a href=\"../{$v['cpu']}.html\"><h3><span class=\"date\">{$v['date']}г.</span>{$v['title']}</h3>
                    </a>";
            }
        }

function showDocsAuthorId($link, $author){
    $sql = "SELECT cpu, title, docs_razdel.razdel FROM new_docs 
    LEFT JOIN blog_authors ON blog_authors.id = new_docs.author
    LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
    WHERE uri = '$author'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    foreach ($data as $v){
                $title = $v['title'];
                $razdel = $v['razdel'];
                $cpu = $v['cpu'];

                echo "<div class=\"column _50\">
                <time><a href=\"\">$razdel</a> | Скачиваний: </time>
                <a href=\"../docs/$cpu.html\"><p>$title</p></a>
                </div>";
    }
}

    