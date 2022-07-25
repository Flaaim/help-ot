<?php
        include "./elems/ads.php";


        function showArticlePost($link, $blog, $ads1){
            $sql = "SELECT blog.id, title, text, tags, name, DATE_FORMAT(date, '%d.%m.%Y') AS date, cpu, uri FROM blog 
            LEFT JOIN blog_authors ON blog_authors.id = blog.author WHERE cpu = '$blog'";
            $result = mysqli_query($link, $sql) or die (mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

                foreach($data as $v) 
            {
                    $title = $v['title'];
                    $date = $v['date'];
                    $tags = explode(",", $v['tags']);
                    $text = $v['text'];
                    $name = $v['name'];
                    $author_uri = $v['uri'];
                    
                

                $showArticle = '';
                $showArticle .= "<h1>$title</h1><span class=\"author-date\">Написал: <a href=\"./author/$author_uri.html\">$name</a> - $date </span><br>";
                
                $showArticle .= "<div class=\"tags\">";
                foreach($tags as $t){
                    $showArticle .= "<a href=\"/?tags=$t\">".ucfirst($t)."</a>";
                }
                $showArticle .= "</div>";
                $showArticle .= $ads1;
                $showArticle .= "<div class=\"article-post\">$text
                <p>
                
                </div>
                <div class=\"tags support\"><a href=\"/support.html\">Поддержать проект</a></div>
                
                ";
                return $showArticle;
            }
        }   


        function showRelatedPosts($link, $title) {
            $sql = "SELECT title, cpu, MATCH(title, text) AGAINST('$title') AS score
            FROM blog 
            WHERE MATCH(title, text) AGAINST('$title') AND title != '$title'
            ORDER BY score DESC LIMIT 5";
            $result = mysqli_query($link, $sql) or die (mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            foreach ($data as $v){
                echo "<a href=\"{$v['cpu']}.html\"><h3>{$v['title']}</h3>
                </a>";
            }
           
        }   




        

