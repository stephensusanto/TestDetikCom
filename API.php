<?php
include ("koneksi.php");

if(function_exists($_GET['function'])) {
    $_GET['function']();
 }   

function getTiketbyID(){
    global $koneksi;
    if (!empty($_GET["ticket_code"])) {
        $id = $_GET["ticket_code"];      
    }    
    if (!empty($_GET["event_id"])) {
        $event = $_GET["event_id"];      
    }                  
    $query ="SELECT id_tiket, status_ticket FROM tiket WHERE id_tiket='".$id."' and event_id = '".$event."'";    
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_assoc ($result))
    {
        $data['id_tiket'] = $row['id_tiket'];
        $data['status_tiket'] = $row['status_ticket'];
    }            
    if($data != null)
    {
    $response = array(
                    'id_tiket' => $data['id_tiket'],
                    'status_tiket' =>$data['status_tiket']
                );               
    }else {
        $response=array(
                    'status' => 404,
                    'message' =>'No Data Found'
                );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
       
}

function updateTicket()
{
    global $koneksi;
    if (!empty($_GET["ticket_code"])) {
        $id = $_GET["ticket_code"];      
    }  
    if (!empty($_GET["event_id"])) {
        $event = $_GET["event_id"];      
    } 
    if (!empty($_GET["status"])) {
        $status = $_GET["status"];      
    }     
   
        echo $sql = "UPDATE tiket SET status_ticket = '".$status."' WHERE id_tiket = '".$id."' and event_id = '".$event."'";
        $result = mysqli_query($koneksi, $sql);
   
      if($result)
      {
         $response=array(
            'ticket_code' => $id,
            'status' => $status,
            'updated_at' => date( "d-M-Y H:i:s")               
         );
      }
      else
      {
         $response=array(
            'status' => 400,
            'message' =>'Update Failed'                  
         );
      }
   

   header('Content-Type: application/json');
   echo json_encode($response);
}


?>
