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
                        <li><a href="#" >Train /</a></li>
                        <li><a href="train_category.php?data=add">Add New Train /</a></li>
                        <li><a href="train_category.php?data=view" class="active">View Train</a></li>
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
                                    <a href="train_category.php?data=add" type="button" class="add_new_category" id="add_cat_btn"><i class="fa-solid fa-plus"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="cat_info mt-5">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col" style="width:10%;">#</th>
                                    <th scope="col" style="width:20%;">Train Logo</th>
                                    <th scope="col" style="width:30%;">Train Name</th>
                                    <th scope="col" style="width:20%;">Status</th>
                                    <th scope="col" class="text-end" style="width:20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $train_cat_sql = "SELECT * FROM train_category";
                                        $train_cat_res = mysqli_query($db,$train_cat_sql);
                                        $serial = 0;
                                        while($train_cat_row = mysqli_fetch_assoc($train_cat_res)){
                                            $train_id         = $train_cat_row['ID'];
                                            $train_name       = $train_cat_row['train_name'];
                                            $train_image      = $train_cat_row['train_img'];
                                            $train_status     = $train_cat_row['train_status'];
                                            $serial++;

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $serial;?></th>
                                                    <td>
                                                        <img src="assets/img/train/<?php echo $train_image;?>" alt="" width="60">
                                                    </td>
                                                    <td><?php echo $train_name;?></td>
                                                    <td>
                                                        <?php if($train_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="train_category.php?edit_id=<?php echo $train_id;?>" class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                        <a href="" class="delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $train_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                        <!-- modal Code -->
                                                            <div class="modal fade delet_modal" id="del_id<?php echo $train_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-footer  p-4">
                                                                            <div class="confirmition-mg">
                                                                                <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                            </div>
                                                                            <div class="modal-btn">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                <a type="button" class="btn btn-success" href="train_category.php?del_id=<?php echo $train_id;?>">Confirm</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- Delete modal Code End -->
                                                            <?php delete('del_id', 'train_img', 'train_category', 'assets/img/train/', 'location: train_category.php');?>
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
            if(isset($_GET['edit_id'])){
                $editId = $_GET['edit_id'];
                $train_edit_res = mysqli_query($db,"SELECT * FROM bus_category WHERE ID='$editId'");
                while($train_edit_row = mysqli_fetch_assoc($train_edit_res)){
                    $train_name       = $train_edit_row['train_name'];
                    $train_status     = $train_edit_row['train_status'];
                    $train_image      = $train_edit_row['train_img'];
                }
                ?>
                    <div class="edit_bus_cat" id="edit_bus_cat">
                        <form action="core/update.php" method="POST" enctype="multipart/form-data">
                            <div class="edit_bus_area">
                                <a href="train_category.php" class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('edit_bus_cat').style.display='none'"></i></a>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel">
                                            <?php
                                                if(empty($train_image)){
                                                    echo '<p class="alert alert-danger">No Image Found</p>';
                                                }else{
                                                    ?>
                                                    <div class="mb-3"><img src="assets/img/train/<?php echo $train_image;?>" alt="" width="100"></div>
                                                    <?php
                                                }
                                            
                                            ?>
                                            <div class="button_outer button_outer_edit">
                                                <div class="btn_upload">
                                                    <input type="file" id="upload_file" name="choose_file">
                                                    Change Image
                                                </div>
                                                <div class="processing_bar"></div>
                                                <div class="success_box"></div>
                                            </div>
                                        </div>
                                        <div class="error_msg"></div>
                                        <div class="uploaded_file_view" id="uploaded_view">
                                            <span class="file_remove">X</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label for="" class="mb-2">Train Name</label>
                                            <input type="text" value="<?php echo $train_name;?>" placeholder="Enter Train name..." name="train_name" required>
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="mb-2 d-block">Train Status</label>
                                            <select name="train_status" id="">
                                                <option value="1" <?php if($train_status == 1)echo 'selected';?>>Active</option>
                                                <option value="0" <?php if($train_status == 0)echo 'selected';?>>Deactive</option>
                                            </select>
                                        </div>
                                        <div class="update_cat_buton mt-4 text-end">
                                            <input type="hidden" name="editid" value="<?php echo $editId;?>">
                                            <button type="submit" name="update_train">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                
            }

        }
        if($data == 'add'){
            ?>
            <div class="body_header">
                <h2>Deshboard</h2>
                <ul>
                    <li><a href="index.php" >Home /</a></li>
                    <li><a href="#" >Train /</a></li>
                    <li><a href="train_category.php?data=add" class="active">Add New Train /</a></li>
                    <li><a href="train_category.php?data=view">View Train</a></li>
                    <hr>
                </ul>
            </div>
            <div class="body_main">
            <!-- Body Section Main Code Here -->
                <div class="add_bus mx-auto mt-5">
                    <form action="core/insert.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Train Name</label>
                                <input type="text" name="train_name" placeholder="Enter Train Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Train Status</label>
                                <select name="train_status" id="" class="b_status">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel mt-4">
                            <div class="button_outer">
                                <div class="btn_upload">
                                    <input type="file" id="upload_file" name="choose_file">
                                    Upload Image
                                </div>
                                <div class="processing_bar"></div>
                                <div class="success_box"></div>
                            </div>
                            <h5>Upload Train Logo</h5>
                        </div>
                        <div class="error_msg"></div>
                        <div class="uploaded_file_view" id="uploaded_view">
                            <span class="file_remove">X</span>
                        </div>
                        <div class="row text-end add_cat_button">
                            <div>
                                <button type="submit" name="train_bcategory">Add Train</button>
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