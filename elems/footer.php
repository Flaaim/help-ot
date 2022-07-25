
<?php

        
        showFooter($link);

    function showFooter($link){
        $sql = "SELECT category, url FROM blog_category";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        echo "<ul class=\"footer-list\">";
        foreach($data as $v){
            $category = $v['category'];
            $link = $v['url'];
            echo "<li><a href=\"/$link.html\">$category</a></li>";
        }
        echo "</ul>";
    }
    ?>
