<?php


function clearString($link, $data){
            $data = trim($data);
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = mysqli_real_escape_string($link, $data);
            return $data;
        }


function showSeoBlog($link, $blog){
    $sql = "SELECT title, blog_seo.description, blog_seo.keywords FROM blog 
    LEFT JOIN blog_seo ON blog_seo.id = blog.id
    WHERE cpu = '$blog'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    return $row;
    
}
function showSeoCategory($link, $category){
    $sql = "SELECT category FROM blog_category WHERE url = '$category'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    return $row;
}

function showSeoNewsSection($link, $newsSection){
    $sql = "SELECT category FROM news_category WHERE url = '$newsSection'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}
function showSeoType($link, $type){
    $sql = "SELECT type FROM docs_type WHERE url = '$type'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    return $row;
}

function showSeoNews($link, $news){

    $sql = "SELECT title, news_seo.description, news_seo.keywords FROM news 
    LEFT JOIN news_seo ON news_seo.id = news.id
    WHERE cpu = '$news'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}


function showSeoDocs($link, $docs){
    $sql = "SELECT title, full_name, docs_seo.keywords, docs_type.type, docs_razdel.razdel FROM new_docs 
    LEFT JOIN docs_type ON docs_type.id = new_docs.type
    LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
    LEFT JOIN docs_seo ON docs_seo.id = new_docs.id
    WHERE cpu = '$docs'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}


function countDocuments($link, $type){
    $sql = "SELECT COUNT(*) as count FROM new_docs 
    LEFT JOIN docs_type ON docs_type.id = new_docs.type
    WHERE url = '$type'";
    echo $sql;
}

