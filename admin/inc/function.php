<?php
include 'connection.php';

//  Delete Function
    function delete($del_id, $nameCol, $imgTable, $imgLocation, $delLocation){
        global $db;
        if(isset($_GET[$del_id])){
            $deleteId = $_GET[$del_id];
            $file_name_res = mysqli_query($db,"SELECT $nameCol FROM $imgTable WHERE ID='$deleteId'");
            $file_row = mysqli_fetch_assoc($file_name_res);
            $file_name = $file_row[$nameCol];
            unlink($imgLocation.$file_name);

            $bus_del_res = mysqli_query($db,"DELETE FROM $imgTable WHERE ID='$deleteId'");
            if($bus_del_res){
                header($delLocation);
            }else{
                die('Category Delete Error!'.mysqli_error($db));
            }
        }
    }


?>