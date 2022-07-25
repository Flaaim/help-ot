<?php



    function showTags($link, $tags){
        $sql = "SELECT id, title, DATE_FORMAT(date, '%d.%m.%Y') as date, cpu, tags FROM blog WHERE tags LIKE '%$tags%'";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        foreach($data as $v){
            echo "<a href=\"./{$v['cpu']}.html\"><h3><span class=\"date\">{$v['date']}г.</span>{$v['title']}</h3>
            </a>";
        }
    }