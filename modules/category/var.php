    <?php
                include "./elems/ads.php";

                function showCategory($link, $category){
                    $sql = "SELECT url, category FROM blog_category WHERE url = '$category'";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                    $row = mysqli_fetch_assoc($result);
                
                    $category = $row['category'];
                    echo $category;
                }



            function showBlogPostCategory($link, $category){
                $rowperpage = 20;
                $load = 'load-more-blog';
                
               
                if($category == 'all'){
                    $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category  ORDER by id DESC
                    LIMIT 0, $rowperpage";

                    $allcount_query = "SELECT count(*) as allcount FROM blog";
                    $allcount_result = mysqli_query($link, $allcount_query);
                    $allcount_fetch = mysqli_fetch_array($allcount_result);
                    $allcount = $allcount_fetch['allcount'];
                } else {
                    $sql = "SELECT blog.id, title, DATE_FORMAT(date, '%d.%m.%Y') AS date, blog_category.category, blog_category.url, cpu FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category WHERE url = '$category'  ORDER by id DESC
                    LIMIT 0, $rowperpage
                    ";

                    $allcount_query = "SELECT count(*) as allcount FROM blog LEFT JOIN blog_category ON blog_category.id = blog.category WHERE url = '$category'";
                    $allcount_result = mysqli_query($link, $allcount_query);
                    $allcount_fetch = mysqli_fetch_array($allcount_result);
                    $allcount = $allcount_fetch['allcount'];
                }
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

                foreach($data as $v){
                echo "<div class=\"load-a-to-blog\">
                <a href=\"./{$v['cpu']}.html\">
                    <h3><span class=\"date\">{$v['date']}г.</span>{$v['title']}</h3>
                </a>
                </div>";
                }
                
                if($allcount > $rowperpage){
                    include "./elems/load.php";
                }
                
                $_SESSION['variables'] = [
                    'category' => $category,
                ];
            }
    ?>