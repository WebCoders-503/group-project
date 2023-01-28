<?php
    include '../inc/connection.php';
    include '../inc/function.php';


    // Add Bus Category insert code here..........
    if(isset($_POST['add_bcategory'])){
        $bus_name       = $_POST['bus_cat_name'];
        $bus_status     = $_POST['bus_status'];
        $busImageName   = $_FILES['choose_file']['name'];
        $tmpbusImage    = $_FILES['choose_file']['tmp_name'];
        $ImageSize      = $_FILES['choose_file']['size'];

        $ImageSize_mb   = $ImageSize/(1024*1024);
        if($ImageSize_mb > 1){
            echo '<span class="text-danger">Warnint! Maximum File Uploaded Size 1MB</span>';
        }
        $extention = explode('.',$busImageName);
        $file_extention = strtolower(end($extention));
        $extn = array('png', 'jpg', 'jpeg');
        if(!empty($busImageName)){
            if(in_array($file_extention,$extn) == true){
                $updatedName = rand().$busImageName;
                move_uploaded_file($tmpbusImage, '../assets/img/bus/'.$updatedName);
                $bus_cat_insert = "INSERT INTO bus_category (B_name, B_img, B_status) VALUES ('$bus_name', '$updatedName', '$bus_status')";
                $bus_cat_insert_res = mysqli_query($db,$bus_cat_insert);
                if($bus_cat_insert_res){
                    header('location: ../bus_category.php');
                }else{
                    die('Category Insert Error!'.mysqli_error($db));
                }
            }else{
                echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
            }
        }else{
            $bus_cat_insert = "INSERT INTO bus_category (B_name, B_status) VALUES ('$bus_name', '$bus_status')";
            $bus_cat_insert_res = mysqli_query($db,$bus_cat_insert);
            if($bus_cat_insert_res){
                header('location: ../bus_category.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }
    }
?>