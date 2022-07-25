//Load Documents
$(document).ready(function(){

    // Load more data
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 20;
        row = row + rowperpage;
        
        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: '/ajax/getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more").text("Загружаю...");
                },
                success: function(response){
                    
                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $("._50:last").after(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').text("Скрыть");
                            
                        }else{
                            $(".load-more").text("Загрузить еще");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more').text("Скрываю...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('._50:nth-child(20)').nextAll('._50').remove();

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Загрузить еще");
               
                
            }, 2000);


        }

    });
    //Load Blog
    $('.load-more-blog').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 20;
        row = row + rowperpage;
        
        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: '/ajax/getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-blog").text("Загружаю...");
                },
                success: function(response){
                    
                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
                        $(".load-a-to-blog:last").after(response).show().fadeIn("slow");

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-blog').text("Скрыть");
                            
                        }else{
                            $(".load-more-blog").text("Загрузить еще");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-blog').text("Скрываю...");

            // Setting little delay while removing contents
            setTimeout(function() {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.load-a-to-blog:nth-child(20)').nextAll('.load-a-to-blog').remove();

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more-blog').text("Загрузить еще");
               
                
            }, 2000);


        }

    });




});



