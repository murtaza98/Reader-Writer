<?php
    include "db.php";
    if(isset($_GET['queue_type'])){
        //queue_type = read/write;
        $queue_type = $_GET['queue_type'];
        
        //TODO fetch data from database and convert it to JSON and then echo it
        //TODO fetch data from database and convert it to JSON and then echo it
        //TODO fetch data from database and convert it to JSON and then echo it
        //TODO fetch data from database and convert it to JSON and then echo it
        $query = null;
        switch($queue_type){
            case "read":
                $query = "SELECT * FROM reader_queue";
                break;
            case "write":
                $query = "SELECT * FROM writer_queue";
                break;
            default:
                break;
        }
        
        if($query!=null){
            $query_result = mysqli_query($connection,$query);
            
            $result = [];
            
            while($row = mysqli_fetch_assoc($query_result)){
                $process_name = $row['process_name'];
                $arrival_time = $row['arrival_time'];
                
                $temp = array('process_name' => $process_name,'arrival_time' => $arrival_time);
                
                $result[] = $temp;
                
            }
            
            echo json_encode($result);
        }
        
        
        
    }
?>