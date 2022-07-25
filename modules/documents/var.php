<?php
    include "./elems/ads.php";


    function ShowDocs($link, $docs, $ads1, $ads3){
        $sql = "SELECT title, full_name, primechanie, name_1, name_2, docs_razdel.razdel, docs_version.sample, docs_razdel.url as docs_url, docs_type.type, docs_type.url, npa_number, preview_1, preview_2, preview_3, download_1, download_2, download_3, cpu, docs_npa.name, relevance FROM new_docs
        LEFT JOIN docs_version ON docs_version.id = new_docs.id
        LEFT JOIN docs_type ON docs_type.id = new_docs.type
        LEFT JOIN docs_razdel ON docs_razdel.id = new_docs.razdel
        LEFT JOIN docs_npa ON docs_npa.id = new_docs.npa_number
        WHERE cpu = '$docs'";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        foreach($data as $v)
        {
            $title = $v['title'];
            $full_name = $v['full_name'];
            $doc_razdel = $v['razdel'];
            $docs_type = $v['type'];
            $npa_number = $v['npa_number'];
            $name_1 = $v['name_1'];
            $name_2 = $v['name_2'];
            $preview_1 = $v['preview_1'];
            $preview_2 = $v['preview_2'];
            $preview_3 = $v['preview_3'];
            $download_1 = $v['download_1'];
            $download_2 = $v['download_2'];
            $download_3 = $v['download_3'];
            $sample = $v['sample'];
            $cpu = $v['cpu'];
            $url_type = $v['url'];
            $npa = $v['name'];
            $section = $v['docs_url'];

            if($v['relevance'] == 1){
                $primechanie = "<div class=\"relevance\">Внимание! В связи с изменениями законодательства данный документ устарел и не применяется. Будьте внимательны!</div>";
                $title = $title.' (устарел)';
            } elseif($v['relevance'] == 2){
                $primechanie = "<div class=\"relevance\">Внимание! Документ обновлен</div>";
                $title = $title.' (обновлен)';
            }
            else {
                $primechanie = $v['primechanie'];
            }
            
            
          
            

            $showDocs = '';
            $showDocs .= "<h1>$title</h1>";
            $showDocs .=  $ads1;
            $showDocs .= "<div class=\"docs-post\">
                <div class=\"parametrs\"><p><b>Полное название:</b> $full_name <p>
                <b>Категория:</b> <a href=\"/section/$section.html\">$doc_razdel</a><p>
                <b>Тип документа:</b> <a href=\"/type/$url_type.html\">$docs_type</a><p>
                <b>Нормативный документ: </b>$npa<p>
                <b>Примечание: </b>$primechanie
                <p>
                
                </p>
                </div>

                <h3>Предварительный просмотр/Образец заполнения</h3>";
            


                
                $showDocs .= "<div class=\"tabs\">
    
                        <input type=\"radio\" name=\"inset\" value=\"\" id=\"tab_1\" checked>
                        <label for=\"tab_1\">Форма документа";
                        if($name_1 != null){
                            $showDocs .= "<br> <b>$name_1</b>";
                        };
                        $showDocs .= "</label>";
                        
                if($preview_2 != null)
                {
                    $showDocs .= "<input type=\"radio\" name=\"inset\" value=\"\" id=\"tab_2\" >
                    <label for=\"tab_2\">Форма документа 2";
                    if($name_2 != null){
                        $showDocs .= "<br> <b>$name_2</b>";
                    };
                    $showDocs .= "</label>";
                };

                if($preview_3 != null)
                {
                    $showDocs .= "<input type=\"radio\" name=\"inset\" value=\"\" id=\"tab_5\" >
                    <label for=\"tab_5\">Форма документа 3</label>";
                };
                if($sample != null){
                    $showDocs .= "<input type=\"radio\" name=\"inset\" value=\"\" id=\"tab_3\">
                    <label for=\"tab_3\">Образец заполнения</label>";
                }  
                
                $showDocs .= "<input type=\"radio\" name=\"inset\" value=\"\" id=\"tab_6\">
                <label for=\"tab_6\">Добавить документ</label>";
                        
                $showDocs .= "<div id=\"txt_1\">

                        
                        <embed src=\"../documents/preview/$preview_1\" width=\"100%\" height=\"500\" 
                        type=\"application/pdf\">

                        <p>Скачать документ в формате Word:<br>
                        
                        
                        <a href=\"/download.php?cpu=$cpu&download_url=$download_1\">$title</a></p>$ads
                        
                        </div>";
                        
                        if($preview_2 != null)
                        {
                            $showDocs .= "<div id=\"txt_2\">";
                            
                            $showDocs .= "<embed src=\"/documents/preview/$preview_2\" width=\"100%\" height=\"500\" 
                        type=\"application/pdf\">";
                        if($download_2 != null) 
                        {
                            $showDocs .=   "<p>Скачать документ в формате Word:<br>
                            <a class=\"downloadlink\" href=\"/download.php?cpu=$cpu&download_url=$download_2\" >$title</a></p>";
                        };

                        
                        $showDocs .= "</div>";
                        };


                        if($preview_3 != null)
                        {
                            $showDocs .= "<div id=\"txt_5\">
                        <embed src=\"../documents/preview/$preview_3\" width=\"100%\" height=\"500\" 
                        type=\"application/pdf\">";
                        if($download_3 != null) 
                        {
                        $showDocs .=   "<p>Скачать документ в формате Word:<br>
                        <a class=\"downloadlink\" href=\"/download.php?cpu=$cpu&download_url=$download_3\">$title</a></p>";
                        };
                        
                        $showDocs .= "</div>";
                        };
                        if($sample != null)
                        {
                            $sample = "<embed src=\"../documents/sample/$sample\" width=\"100%\" height=\"500\" 
                            type=\"application/pdf\">";
                        } else {
                            $sample = "Образец заполнения отсутствует";
                        }
                        $showDocs .= "
                        <div id=\"txt_3\">
                            <p>$sample</p>
                        </div>

                        <div id=\"txt_6\">
                            <p>
                            Вы можете добавить свой вариант документа. Для этого воспользуйтесь <a href=\"/add.html\">специальной формой</a> на сайте.</p>
                        </div>
                </div>
                
                ";

                $showDocs .= $ads3;
                $showDocs .= "<p>Если вы наши ошибку в документе, (или документ вовсе отсутствует) пожалуйста напишите на admin@help-ot.ru ссылку и название документа в котором допущена ошибка. </p>
                </div>
                <div class=\"tags support\"><a href=\"/support.html\">Поддержать проект</a></div>";
                
            return $showDocs;
        }
    }