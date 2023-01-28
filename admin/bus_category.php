<?php include 'inc/connection.php'?>
<?php include 'inc/function.php'?>
<?php include 'inc/header.php'?>
<?php include 'inc/side_menu.php'?>


<section class="body_section">
    
    <?php
        $data = isset($_GET['data']) ? $_GET['data'] : 'view';

        if($data == 'view'){
            ?>
            <div class="body_header">
                <h2>Deshboard</h2>
                <ul>
                    <li><a href="index.php" >Home /</a></li>
                    <li><a href="#" >Bus /</a></li>
                    <li><a href="bus_category.php?data=add">Add New Category /</a></li>
                    <li><a href="bus_category.php?data=view" class="active">View Categoryes</a></li>
                    <hr>
                </ul>
            </div>
            <div class="body_main">
                <!-- Body Section Main Code Here -->
                <div class="view_category">
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <div class="cat-info-search">
                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="add-cat-button text-end mb-3">
                                <a href="bus_category.php?data=add" type="button" class="add_new_category" id="add_cat_btn"><i class="fa-solid fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="cat_info mt-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col" style="width:10%;">#</th>
                                <th scope="col" style="width:20%;">Bus Logo</th>
                                <th scope="col" style="width:30%;">Bus Name</th>
                                <th scope="col" style="width:20%;">Status</th>
                                <th scope="col" class="text-end" style="width:20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $bus_cat_sql = "SELECT * FROM bus_category";
                                    $bus_cat_res = mysqli_query($db,$bus_cat_sql);
                                    $serial = 0;
                                    while($bus_cat_row = mysqli_fetch_assoc($bus_cat_res)){
                                        $bus_id         = $bus_cat_row['ID'];
                                        $bus_name       = $bus_cat_row['B_name'];
                                        $bus_image      = $bus_cat_row['B_img'];
                                        $bus_status     = $bus_cat_row['B_status'];
                                        $serial++;

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial;?></th>
                                                <td>
                                                    <img src="assets/img/bus/<?php echo $bus_image;?>" alt="" width="60">
                                                </td>
                                                <td><?php echo $bus_name;?></td>
                                                <td>
                                                    <?php if($bus_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?>
                                                </td>
                                                <td class="text-end">
                                                    <a href="bus_category.php?edit_id=<?php echo $bus_id;?>" class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    <a href="" class="delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $bus_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                    <!-- modal Code -->
                                                        <div class="modal fade delet_modal" id="del_id<?php echo $bus_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-footer  p-4">
                                                                        <div class="confirmition-mg">
                                                                            <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                        </div>
                                                                        <div class="modal-btn">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                            <a type="button" class="btn btn-success" href="bus_category.php?del_id=<?php echo $bus_id;?>">Confirm</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- Delete modal Code End -->
                                                        <?php delete('del_id', 'B_img', 'bus_category', 'assets/img/bus/', 'location: bus_category.php');?>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <?php
        }
        if($data == 'add'){
            ?>
            <div class="body_header">
                <h2>Deshboard</h2>
                <ul>
                    <li><a href="index.php" >Home /</a></li>
                    <li><a href="#" >Bus /</a></li>
                    <li><a href="bus_category.php?data=add" class="active">Add New Category /</a></li>
                    <li><a href="bus_category.php?data=view">View Categoryes</a></li>
                    <hr>
                </ul>
            </div>
            <div class="body_main">
            <!-- Body Section Main Code Here -->
                <div class="add_bus mx-auto mt-5">
                    <form action="core/insert.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Bus Name</label>
                                <input type="text" name="bus_cat_name" placeholder="Enter Bus Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Bus Status</label>
                                <select name="bus_status" id="" class="b_status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel mx-auto">
                                <div class="button_outer">
                                    <div class="btn_upload">
                                        <input type="file" id="upload_file" name="choose_file">
                                        Upload Image
                                    </div>
                                    <div class="processing_bar"></div>
                                    <div class="success_box"></div>
                                </div>
                                <h5>Upload Bus Logo</h5>
                            </div>
                            <div class="error_msg"></div>
                            <div class="uploaded_file_view" id="uploaded_view">
                                <span class="file_remove">X</span>
                            </div>
                        </div>
                        <div class="row text-end add_cat_button">
                            <div>
                                <button type="submit" name="add_bcategory">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <?php
        }
    
    ?>

</section>



<?php include 'inc/footer.php'?>