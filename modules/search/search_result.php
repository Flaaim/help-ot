
<div class="container">
    <div class="row">
        <div class="column">
            <div class="post">

            
            <div class="blog-post">
                <?php
                    if(empty($_GET['search'])){
                        echo "Ошибка. Заполните поле поиска";
                        echo "<p><a href=\"documents.html\">Вернуться назад</a></p>";
                    } else {
                        $search = $_GET['search'];
                        $search_exploded = explode(" ", $search);
                        
                        $construct = "";

                        foreach($search_exploded as $key=> $search_result){
                            if($key == 0) {
                                $construct .= "title LIKE '%$search_result%'";
                            } else {
                                $construct .= "AND title LIKE '%$search_result%'";
                            }
                        }
                        $construct = "SELECT title, cpu FROM new_docs 
                                    WHERE $construct";
                                    $result = mysqli_query($link, $construct ) or die (mysqli_error($link));
                                    $numrows = mysqli_num_rows($result);
                                     if($numrows == 0){
                                        echo "<p>Ошибка. Нечего не найдено по запросу <b>$search</b></p>";
                                        
                                     } else {
                                            
                                        echo "<h2>Результаты поиска</h2>
                                        
                                        <p>Найдено $numrows результатов!</p>";
                                        while($runrows = mysqli_fetch_assoc($result)){
                                            $title = $runrows['title'];
                                            
                                            $cpu = $runrows['cpu'];
                        
                                            echo "<a href=\"/docs/$cpu.html\"><h3>$title</h3></a>";
                                        
                                        
                                         } 
                                     }
                    }


                ?>
            </div>
            </div>
        </div>
    </div>
</div>

