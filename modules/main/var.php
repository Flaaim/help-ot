<?php
        include "./elems/ads.php";
        
        function showBlogPost($link, $category){
            switch ($category){
                case 'all':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                    break;
                case 'ohrana-truda':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 1 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'pojarnay-bezopastnost':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 2 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'promyshlenay-bezopastnost':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 3 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'bezopastnost-dorojnogo-dvizenia':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 4 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'ekologia':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 5 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'electro-bezopastnost':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 6 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
                case 'safety':
                    $sql = "SELECT title, id, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu FROM blog WHERE status = 1 AND category = 7 ORDER by id DESC LIMIT 5";
                    $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                break;
            }
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            
            foreach($data as $v){
                $title = $v['title'];
                $cpu = $v['cpu'];
                $date = date_create($v['date']);
                $currentDate = date_create();
                
                $interval = date_diff($currentDate, $date);
                
                if($interval->days <= 3){
                    $new = "<i class=\"new\">Новая!</i>";
                } else {
                    $new = "";
                }
                
                
                $date = $date->format('d.m.Y');
                
                echo "
                <div class=\"listOfnews\">
                <a href=\"./$cpu.html\">
                <h3><span class=\"date\">$date г.</span> $title 
                $new 
                </h3>
                </a></div>";
            }
        }

            //Page blog


        function showBlog($link, $date){
            switch($date){
                case '2017':
                    $sql = "SELECT title, blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2017-01-01 00:00:00' and 
                    date < '2018-01-01 00:00:00'
                    ORDER by id DESC";
                break;
                case '2018':
                    $sql = "SELECT title, blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2018-01-01 00:00:00' and 
                    date < '2019-01-01 00:00:00'
                    ORDER by id DESC";
                break;  
                case '2019':
                    $sql = "SELECT title,blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2019-01-01 00:00:00' and 
                    date < '2020-01-01 00:00:00'
                    ORDER by id DESC";
                break;
                case '2020':
                    $sql = "SELECT title, blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2020-01-01 00:00:00' and 
                    date < '2021-01-01 00:00:00'
                    ORDER by id DESC";
                break;
                case '2021':
                    $sql = "SELECT title, blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2021-01-01 00:00:00' and 
                    date < '2022-01-01 00:00:00'
                    ORDER by id DESC";
                break;
                case '2022':
                    $sql = "SELECT title, blog.id, blog_category.category, blog_category.url, DATE_FORMAT(date, '%d.%m.%Y') 
                    AS date, cpu  FROM blog 
                    LEFT JOIN blog_category ON blog_category.id = blog.category
                    WHERE status = 1 and date >= '2022-01-01 00:00:00' and 
                    date < '2023-01-01 00:00:00'
                    ORDER by id DESC";
                break; 
            }
            $result = mysqli_query($link, $sql) or die (mysqli_error($link));
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            foreach($data as $v){
                $title = $v['title'];
                $date = $v['date'];
                $cpu = $v['cpu'];
                $category = $v['category'];
                $url = $v['url'];
                echo "<div class=\"column _50\">
                <time><a href=\"./$url.html\">$category</a> | $date</time>
                <a href=\"./$cpu.html\"><p>$title</p></a>
                </div>";
                
            }
        }
        
        
        //page document
        function showDocuments($link, $doc_razdel = '', $type = ''){
            $rowperpage = 20;
            $load = 'load-more';
            if($doc_razdel == '' and $type == ''){
                $allcount_query = "SELECT count(*) as allcount FROM new_docs";
                $allcount_result = mysqli_query($link,$allcount_query);
                $allcount_fetch = mysqli_fetch_array($allcount_result);
                $allcount = $allcount_fetch['allcount'];


                $sql = "SELECT title, download_count.count, docs_razdel.razdel, docs_razdel.url, new_docs.id, cpu FROM new_docs 
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                LEFT JOIN download_count ON download_count.id = new_docs.id
                ORDER BY id DESC 
                LIMIT 0, $rowperpage
                ";
                    
                
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                   
                foreach($data as $row){
                    $title = $row['title'];
                    $razdel = $row['razdel'];
                    $cpu = $row['cpu'];
                    $doc_section = $row['url'];
                    $download_count = $row['count'];
                    echo "<div class=\"column _50\">
                    <time><a href=\"./?doc_section=$doc_section\">$razdel</a> | Скачиваний: $download_count </time>
                    <a href=\"/docs/$cpu.html\"><p>$title</p></a>
                    </div>";
                }
                
                include "./elems/load.php";

                $_SESSION['variables'] = [
                    'type' => $type,
                    'doc_razdel' => $doc_razdel
                ];
            }
            
            if($type != '' and $doc_razdel == ''){
                $allcount_query = "SELECT count(*) as allcount FROM new_docs 
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                WHERE docs_type.url = '$type'";

                $allcount_result = mysqli_query($link,$allcount_query);
                $allcount_fetch = mysqli_fetch_array($allcount_result);
                $allcount = $allcount_fetch['allcount'];
                

                $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs 
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                LEFT JOIN download_count ON download_count.id = new_docs.id
                WHERE docs_type.url = '$type'
                ORDER BY id DESC
                LIMIT 0, $rowperpage
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
                    <time><a href=\"\">$razdel</a> | Скачиваний: $download_count </time>
                    <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
                    </div>";
                }
                if($allcount > $rowperpage){
                    include "./elems/load.php";
                }
                

                $_SESSION['variables'] = [
                    'type' => $type,
                    'doc_razdel' => $doc_razdel
                ];

            }
            if($type != '' and $doc_razdel != ''){
                $allcount_query = "SELECT count(*) as allcount FROM new_docs 
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                WHERE docs_type.url = '$type' AND docs_razdel.url = '$doc_razdel'";

                $allcount_result = mysqli_query($link,$allcount_query);
                $allcount_fetch = mysqli_fetch_array($allcount_result);
                $allcount = $allcount_fetch['allcount'];

                $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                LEFT JOIN download_count ON download_count.id = new_docs.id
                WHERE docs_type.url = '$type' AND docs_razdel.url = '$doc_razdel'
                ORDER BY id DESC
                LIMIT 0, $rowperpage
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
                    <time><a href=\"\">$razdel</a> | Скачиваний: $download_count </time>
                    <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
                    </div>";
                }
                
                if($allcount > $rowperpage){
                    include "./elems/load.php";
                }

                $_SESSION['variables'] = [
                    'type' => $type,
                    'doc_razdel' => $doc_razdel
                ];
            }
            if($doc_razdel != '' and $type == ''){
                $allcount_query = "SELECT count(*) as allcount FROM new_docs 
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                WHERE docs_razdel.url = '$doc_razdel'";

                $allcount_result = mysqli_query($link,$allcount_query);
                $allcount_fetch = mysqli_fetch_array($allcount_result);
                $allcount = $allcount_fetch['allcount'];

                
                $sql = "SELECT title, download_count.count, docs_razdel.razdel, new_docs.id, cpu FROM new_docs 
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                LEFT JOIN download_count ON download_count.id = new_docs.id
                WHERE docs_razdel.url = '$doc_razdel'
                ORDER BY id DESC
                LIMIT 0, $rowperpage
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
                <time><a href=\"\">$razdel</a> | Скачиваний: $download_count </time>
                <a href=\"/docs/$cpu.html\"><h3>$title</h3></a>
                </div>";
                }
                if($allcount > $rowperpage){
                    include "./elems/load.php";
                }

                $_SESSION['variables'] = [
                    'type' => $type,
                    'doc_razdel' => $doc_razdel
                ];
            }



        }
        function yourchoose($link, $doc_razdel = '', $type = ''){
            
            if($doc_razdel == '' and $type == $type){
                $sql = "SELECT new_docs.id, docs_type.type, docs_razdel.razdel FROM new_docs
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                WHERE docs_type.url = '$type'
                ORDER BY id DESC";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                $row = mysqli_fetch_assoc($result)['type'];
                echo "Вы выбрали: $row";
            }
            if($doc_razdel == $doc_razdel and $type == ''){
                $sql = "SELECT new_docs.id, docs_type.type, docs_razdel.razdel FROM new_docs
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                WHERE docs_razdel.url = '$doc_razdel' 
                ORDER BY id DESC";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                $row = mysqli_fetch_assoc($result)['razdel'];
                echo "Вы выбрали: $row";
            }
            if($doc_razdel != '' and $type != ''){
                $sql = "SELECT docs_type.type, docs_razdel.razdel FROM new_docs
                LEFT JOIN docs_type ON docs_type.id = new_docs.type
                LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                WHERE docs_razdel.url = '$doc_razdel' and docs_type.url = '$type'
                ";
                $result = mysqli_query($link, $sql) or die (mysqli_error($link));
                $row = mysqli_fetch_assoc($result);
                //var_dump($row);
                echo "Вы выбрали: {$row['type']}, {$row['razdel']}";
            }
            
        }

        //верхний блок type

        function showDocumentType($link, $param, $doc_razdel = '', $type = ''){
            switch($param){
                case 0:
                    if($doc_razdel == '' and $type == ''){
                        $sql = "SELECT docs_type.type, docs_type.url, COUNT(*) as count
                        FROM new_docs
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        
                        GROUP BY docs_type.type, docs_type.url
                        ";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $type = $v['type'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\"><a href=\"/type/$url.html\">$type($count)</a></div>";
                        }
                    }
                    if($doc_razdel == '' and $type == $type){
                        $sql = "SELECT docs_type.type, docs_type.url, COUNT(*) as count
                        FROM new_docs 
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        
                        WHERE docs_type.url = '$type'
                        GROUP BY docs_type.type, docs_type.url";

                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $type = $v['type'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\">&#10060;<a href=\"../documents.html\">$type($count)</a></div>";
                        }

                    }
                    if($doc_razdel == $doc_razdel and $type == ''){
                        $sql = "SELECT docs_type.type, docs_type.url, COUNT(*) as count
                        FROM new_docs
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        WHERE docs_razdel.url = '$doc_razdel'
                        GROUP BY docs_type.type, docs_type.url
                        ";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $type = $v['type'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\"><a href=\"../type/$url/section/$doc_razdel.html\">$type($count)</a></div>";
                        }
                    }
                    if($doc_razdel == $doc_razdel and $type == $type){
                        $sql = "SELECT docs_type.type, docs_type.url, COUNT(*) as count
                        FROM new_docs 
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        WHERE docs_type.url = '$type' and docs_razdel.url = '$doc_razdel'
                        GROUP BY docs_type.type, docs_type.url";

                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $type = $v['type'];
                            $url = $v['url'];
                            $count = $v['count'];

                            echo "<div class=\"_document_type\">&#10060;<a href=\"/section/$doc_razdel.html\">$type($count)</a></div>";
                        }
                    }
                break;
                case 1:
                    if($doc_razdel == '' and $type == ''){
                        $sql = "SELECT docs_razdel.razdel, docs_razdel.url, COUNT(*) as count
                        FROM new_docs
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        
                        GROUP BY docs_razdel.razdel, docs_razdel.url
                        ";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $razdel = $v['razdel'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\"><a href=\"/section/$url.html\">$razdel($count)</a></div>";
                        }
                    }
                    if($doc_razdel == '' and $type == $type){
                        $sql = "SELECT docs_razdel.razdel, docs_razdel.url, COUNT(*) as count FROM new_docs
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        WHERE docs_type.url = '$type'
                        GROUP BY docs_razdel.razdel, docs_razdel.url
                        ";
                    
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $razdel = $v['razdel'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\">
                            <a href=\"../type/$type/section/$url.html\">$razdel($count)</a></div>";
                        }
                    }
                    if($doc_razdel == $doc_razdel and $type == ''){
                        $sql = "SELECT docs_razdel.razdel, docs_razdel.url, COUNT(*) as count FROM new_docs
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        WHERE docs_razdel.url = '$doc_razdel'
                        GROUP BY docs_razdel.razdel, docs_razdel.url
                        ";
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $razdel = $v['razdel'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\">&#10060;
                            <a href=\"../documents.html\">$razdel($count)</a></div>";
                        }
                    }
                    if($doc_razdel == $doc_razdel and $type == $type){
                        $sql = "SELECT docs_razdel.razdel, docs_razdel.url, COUNT(*) as count FROM new_docs
                        LEFT JOIN docs_type ON docs_type.id = new_docs.type
                        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
                        WHERE docs_type.url = '$type' and docs_razdel.url = '$doc_razdel'
                        GROUP BY docs_razdel.razdel, docs_razdel.url
                        ";
                        
                        
                        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                        for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                        foreach($data as $v){
                            $razdel = $v['razdel'];
                            $url = $v['url'];
                            $count = $v['count'];
        
                            echo "<div class=\"_document_type\">&#10060;
                            <a href=\"/type/$type.html\">$razdel($count)</a></div>";
                        }
                    }
                break;
                
            }

            /*$sql = "SELECT docs_type.type, docs_type.url, docs_razdel.razdel, docs_razdel.url, COUNT(*) as count FROM new_docs
            LEFT JOIN docs_type ON docs_type.id = new_docs.type
            LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
            WHERE docs_type.url = 'prikaz' and docs_razdel.url = 'bdd'
            GROUP BY docs_type.type, docs_type.url, docs_razdel.razdel, docs_razdel.url
            ";*/



            
        }

        //Page NEWS

        function showNews($link){
            $sql = "SELECT title, cpu, DATE_FORMAT(date, '%d.%m.%Y')as date FROM news ORDER by id DESC";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

            foreach($data as $v){
                $title = $v['title'];
                $cpu = $v['cpu'];
                $date = date_create($v['date']);
                $currentDate = date_create();
                
                $interval = date_diff($currentDate, $date);
                
                if($interval->days <= 3){
                    $new = "<i class=\"new\">Новая!</i>";
                } else {
                    $new = "";
                }
                
                
                $date = $date->format('d.m.Y');
                
                echo "
                <div class=\"listOfnews\">
                <a href=\"./news/$cpu.html\">
                <h3><span class=\"date\">$date г.</span> $title 
                $new 
                </h3>
                </a></div>";
            }
        }

        









?>