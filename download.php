<?php
   
    include "db.php";


    $cpu = $_GET['cpu'];
    $download_url = $_GET['download_url'];
    if(isset($cpu)){
        $sql = "SELECT count FROM download_count WHERE download_url = '$cpu'";
        $result = mysqli_query($link, $sql) or die (mysqli_error($link));
        $count = mysqli_fetch_assoc($result)['count'];
        $count++;
        $sql = "UPDATE download_count SET count = '$count' WHERE download_url = '$cpu'";
        $result = mysqli_query($link, $sql);
       
        header("Location: /documents/download/$download_url");
    } else {
        header("Location: 404.html");
    }
  
    /*
    $sql = "SELECT cpu, id FROM new_docs ORDER by id";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row['cpu']);
    $i = 1;
    
    
    foreach($data as $v){
        
        $sql = "INSERT INTO download_count (id, download_url, count) VALUES ('$i', '$v', '0')";
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        
        $i++;
    }
   
  */
    