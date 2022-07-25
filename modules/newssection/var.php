<?php


function showNewsSection ($link, $newsSection){
    $sql = "SELECT url, category FROM news_category WHERE url = '$newsSection'";
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

    $newssection = $row['category'];
    echo $newssection;
}


function showNewsbySection($link, $newsSection){
    $rowperpage = 20;
    $load = 'load-more-news';

        $sql = "SELECT news.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, news_category.category, news_category.url, cpu FROM news 
        LEFT JOIN news_category ON news_category.id = news.category WHERE url = '$newsSection'  ORDER by id DESC LIMIT 0, $rowperpage";

        $allcount_query = "SELECT count(*) as allcount FROM news LEFT JOIN news_category ON news_category.id = news.category WHERE url = '$newsSection'";
        $allcount_result = mysqli_query($link, $allcount_query);
        $allcount_fetch = mysqli_fetch_array($allcount_result);
        $allcount = $allcount_fetch['allcount'];
    
    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    foreach($data as $v){
    echo "<div class=\"load-a-to-blog\">
    <a href=\"../news/{$v['cpu']}.html\">
        <h3><span class=\"date\">{$v['date']}г.</span>{$v['title']}</h3>
    </a>
    </div>";
    }
    
    if($allcount > $rowperpage){
        include "./elems/load.php";
        $_SESSION['variables'] = [
            'newsSection' => $newsSection,
        ];
    }
    
    
}