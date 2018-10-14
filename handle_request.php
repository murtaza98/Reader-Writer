<?php
    if(isset($_GET['request_type']) && isset($_SESSION['process_name'])){
        $request_type = $_GET['request_type'];
        $process_name = $_SESSION['process_name'];
        
        switch($request_type){
            case "read":
                //Check if the process in CS is of type read
                //if yes then allow this process to enter CS i.e to read
                //else put it in read queue
                
                
                
                break;
            case "write":
                //check if semaphore is empty
                //if yes then put it in CS
                //else place it in write queue
                
                
                break
            default:
                break;
        }
        
    }
?>