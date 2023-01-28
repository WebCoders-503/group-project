<?php
    $db = mysqli_connect('localhost', 'root', '', 'ticket_management');
    if($db){
        // echo 'Database Connection is Successfull';
    }else{
        echo 'Database Connection Error';
    }
?>