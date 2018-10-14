<?php
    session_start();
    if(isset($_POST['submit'])){
        $process_name = $_POST['process_name'];
        
        $_SESSION['process_name'] = $process_name;
        
        header("Location: ./");
    }
?>