<?php
session_start();
include '../db.php';

$row = $_POST['row'];
$rowperpage = 20;
if(isset($_SESSION['variables']['category'])){
    switch($_SESSION['variables']['category'])
    {
        case 'all':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        case 'ohrana-truda':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  
            WHERE blog_category.url = '{$_SESSION['variables']['category']}'
            ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        case 'promyshlenay-bezopastnost':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  
            WHERE blog_category.url = '{$_SESSION['variables']['category']}'
            ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        case 'pojarnay-bezopastnost':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  
            WHERE blog_category.url = '{$_SESSION['variables']['category']}'
            ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        case 'bezopastnost-dorojnogo-dvizenia':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  
            WHERE blog_category.url = '{$_SESSION['variables']['category']}'
            ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        case 'ekologia':
            $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
            LEFT JOIN blog_category ON blog_category.id = blog.category  
            WHERE blog_category.url = '{$_SESSION['variables']['category']}'
            ORDER by id DESC
            LIMIT $row, $rowperpage";
        break;
        
    }
    
   

        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach($data as $v){
        echo "<div class=\"load-a-to-blog\">
        <a href=\"./{$v['cpu']}.html\">
            <h3><span class=\"date\">{$v['date']}г.</span>{$v['title']}</h3>
        </a>
        </div>";
            }
}
if(isset($_SESSION['variables']['type']) and isset($_SESSION['variables']['doc_razdel']))
{
    if($_SESSION['variables']['type'] == '' and $_SESSION['variables']['doc_razdel'] == '') {
        $sql = "SELECT title, download_count.count, docs_razdel.razdel, docs_razdel.url, new_docs.id, cpu FROM new_docs 
        LEFT JOIN docs_type ON docs_type.id = new_docs.type
        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
        LEFT JOIN download_count ON download_count.id = new_docs.id
        ORDER BY id DESC 
        LIMIT $row, $rowperpage
        ";
            
        
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        
        foreach($data as $v){
            $title = $v['title'];
            $razdel = $v['razdel'];
            $cpu = $v['cpu'];
            $doc_section = $v['url'];
            $download_count = $v['count'];
        
            echo "<div class=\"column _50\">
            <time><a href=\"./?doc_section=$doc_section\">$razdel</a> | Скачиваний: $download_count</time>
            <a href=\"/docs/$cpu.html\"><p>$title</p></a>
            </div>";
        }
    }
    
    if($_SESSION['variables']['type'] != '' and $_SESSION['variables']['doc_razdel'] == ''){
        $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs 
        LEFT JOIN docs_type ON docs_type.id = new_docs.type
        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
        LEFT JOIN download_count ON download_count.id = new_docs.id
        WHERE docs_type.url = '{$_SESSION['variables']['type']}'
        ORDER BY id DESC
        LIMIT $row, $rowperpage
        ";
    
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    
        foreach($data as $v)
        {
            $title = $v['title'];
            $razdel = $v['razdel'];
            $cpu = $v['cpu'];
            $download_count = $v['count'];
    
            echo "<div class=\"column _50\">
            <time><a href=\"\">$razdel</a> | Скачиваний: $download_count</time>
            <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
            </div>";
        }
    
    }
    if($_SESSION['variables']['type'] != '' and $_SESSION['variables']['doc_razdel'] != ''){
        $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs
        LEFT JOIN docs_type ON docs_type.id = new_docs.type
        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
        LEFT JOIN download_count ON download_count.id = new_docs.id
        WHERE docs_type.url = '{$_SESSION['variables']['type']}' AND docs_razdel.url = '{$_SESSION['variables']['doc_razdel']}'
        ORDER BY id DESC
        LIMIT $row, $rowperpage
        ";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    
        foreach($data as $v)
        {
                $title = $v['title'];
                $razdel = $v['razdel'];
                $cpu = $v['cpu'];
                $download_count = $v['count'];
    
                
                echo "<div class=\"column _50\">
                <time><a href=\"\">$razdel</a> | Скачиваний: $download_count</time>
                <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
                </div>";
        }
    }
    if($_SESSION['variables']['type'] == '' and $_SESSION['variables']['doc_razdel'] != ''){
        $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs 
        LEFT JOIN docs_type ON docs_type.id = new_docs.type
        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
        LEFT JOIN download_count ON download_count.id = new_docs.id
        WHERE docs_razdel.url = '{$_SESSION['variables']['doc_razdel']}'
        ORDER BY id DESC
        LIMIT $row, $rowperpage
        ";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    
        foreach($data as $v)
        {
                $title = $v['title'];
                $razdel = $v['razdel'];
                $cpu = $v['cpu'];
                $download_count = $v['count'];
    
    
                echo "<div class=\"column _50\">
                <time><a href=\"\">$razdel</a> | Скачиваний: $download_count</time>
                <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
                </div>";
        }
    
    }
}






