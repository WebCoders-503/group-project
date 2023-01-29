<?php
    include '../inc/connection.php';
    include '../inc/function.php';

    // Edit Bas Category.....
    editCategory('update_bus_cat','Bus_name','bus_status','../assets/img/bus/','bus_category','B_name','B_img','B_status','location: ../bus_category.php');
    

    // Edit Train CAtegory ....
    editCategory('update_train','train_name','train_status','../assets/img/train/','train_category','train_name','train_img','train_status','location: ../train_category.php');

?>