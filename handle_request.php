<?php
    session_start();
    include "db.php";
    if(isset($_GET['request_type']) && isset($_SESSION['process_name'])){
        $request_type = $_GET['request_type'];
        $process_name = $_SESSION['process_name'];
        
        switch($request_type){
            case "read":
                //Check if the process in CS is of type read
                //if yes then allow this process to enter CS i.e to read
                //else put it in read queue
                
                $query = "CALL checkReadRequest('$process_name','read');";
                
                $query_result = mysqli_query($connection,$query);
                
                $status = mysqli_fetch_assoc($query_result);
                
                if(isset($status['success'])){
                    echo "true";
                }else{
                    echo "false";
                }
                
                
                break;
            case "write":
                //check if semaphore is empty
                //if yes then put it in CS
                //else place it in write queue
                
                
                echo "write";
                
                break;
            default:
                echo "default";
                break;
        }
    }else{
        echo "else";
        if(isset($_SESSION['process_name'])){
            echo "yes";
        }
    }
?>