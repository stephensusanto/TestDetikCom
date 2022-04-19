<?php
include("koneksi.php");

$event = $argv[1];

$total = $argv[2];

if(!$event || !$total || filter_var($event, FILTER_VALIDATE_INT) != $event || filter_var($total, FILTER_VALIDATE_INT) != $total ){
  echo "mohon menginput data event dan total dengan benar";  
}else{
    for ($i = 0; $i<$total; $i++){
        $id = "gfg";
        $bytes = random_bytes(7);
        $id .=bin2hex($bytes);
        $query = "INSERT INTO tiket (id_tiket, event_id, status_ticket) VALUES('".$id."', '".$event."', 'available')";
        $run = mysqli_query($koneksi, $query);
        if($run){
            echo "sukses ";
        }else{
            echo "Failed";
        }
    }
    
}

mysqli_close($koneksi);
