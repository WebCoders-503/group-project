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


// insert category Add  Function
    function insertAdd($addBtn,$fName,$fStatus,$imgLocation,$tableName,$colName,$colImg,$colStatus,$headerLocation){
        global $db;
        if(isset($_POST[$addBtn])){
            $name       = $_POST[$fName];
            $status     = $_POST[$fStatus];
            $ImageName   = $_FILES['choose_file']['name'];
            $tmpImage    = $_FILES['choose_file']['tmp_name'];
            $ImageSize      = $_FILES['choose_file']['size'];
    
            $ImageSize_mb   = $ImageSize/(1024*1024);
            if($ImageSize_mb > 1){
                echo '<span class="text-danger">Warnint! Maximum File Uploaded Size 1MB</span>';
            }
            $extention = explode('.',$ImageName);
            $file_extention = strtolower(end($extention));
            $extn = array('png', 'jpg', 'jpeg');
            if(!empty($ImageName)){
                if(in_array($file_extention,$extn) == true){
                    $updatedName = rand().$ImageName;
                    move_uploaded_file($tmpImage, $imgLocation.$updatedName);
                    $bus_cat_insert = "INSERT INTO $tableName ($colName, $colImg, $colStatus) VALUES ('$name', '$updatedName', '$status')";
                    $bus_cat_insert_res = mysqli_query($db,$bus_cat_insert);
                    if($bus_cat_insert_res){
                        header($headerLocation);
                    }else{
                        die('Category Insert Error!'.mysqli_error($db));
                    }
                }else{
                    echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
                }
            }else{
                $bus_cat_insert = "INSERT INTO $tableName ($colName, $colStatus) VALUES ('$name', '$status')";
                $bus_cat_insert_res = mysqli_query($db,$bus_cat_insert);
                if($bus_cat_insert_res){
                    header($headerLocation);
                }else{
                    die('Category Insert Error!'.mysqli_error($db));
                }
            }
        }
    }




    // Edit category Name Function
    function editCategory($updateBtn,$eName,$eStatus,$eImgLocation,$tableName,$colName,$colImg,$colStatus,$headerLocation){
        global $db;
        if(isset($_POST[$updateBtn])){
            $name       = $_POST[$eName];
            $status     = $_POST[$eStatus];        
            $editid  = $_POST['editid'];
    
            
            if(!empty($_FILES['choose_file']['name'])){
                $ImageName  = $_FILES['choose_file']['name'];
                $tmpImage   = $_FILES['choose_file']['tmp_name'];
                $ImageSize     = $_FILES['choose_file']['size'];
    
                $ImageSize_mb   = $ImageSize/(1024*1024);
                if($ImageSize_mb > 1){
                    echo '<span class="text-danger">Warnint! Maximum File Uploaded Size 1MB</span>';
                }
        
                $extn = explode('.', $ImageName);
                $file_extn = strtolower(end($extn));
        
                $extensions = array('png', 'jpg', 'jpeg');
                if(in_array($file_extn,$extensions) === true){
                    $update_name = rand().$ImageName;
                    move_uploaded_file($tmpImage, $eImgLocation.$update_name);
                    $category_update_sql = "UPDATE $tableName SET $colName='$name', $colImg='$update_name', $colStatus='$status' WHERE ID='$editid'";
                    $category_update_res = mysqli_query($db,$category_update_sql);
                    if($category_update_res){
                        header($headerLocation);
                    }else{
                        die('Category Update Error!'.mysqli_error($db));
                    }
                }else{
                    echo 'Please Upload and Image File';
                }
        
            }else{
                $category_update_sql = "UPDATE $tableName SET $colName='$name', $colStatus='$status' WHERE ID='$editid'";
                $category_update_res = mysqli_query($db,$category_update_sql);
                if($category_update_res){
                    header($headerLocation);
                }else{
                    die('Category Update Error!'.mysqli_error($db));
                }
            }
        }
    }
    

?>