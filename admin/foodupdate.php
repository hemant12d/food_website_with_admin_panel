<?php include 'partials/header.php'; ?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Update Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i>Dashboard</li>
      </ol>
    </div>   
    <!-- Main content -->
    <div class="content">
    <div class="row">
    <div class="col-lg-12">
       <div class="card card-outline">
        <div class="card-header bg-blue">
        <?php 
        if (isset($_GET['sr_no'])) {
            $sr = $_GET['sr_no'];
            $sql = "SELECT * FROM `tb_food` WHERE `Sr` = $sr";
            $result = mysqli_query($connection, $sql);
            $row =  mysqli_fetch_assoc($result);
            $_SESSION['old_img_food'] = $row['img_name'];
            echo '<h5 class="text-white m-b-0">Update Details for "'.$row['title'].'"</h5> ';  
        }
        else{
            echo "Access is not allowed";
        }
             ?>
        </div>
        <div class="card-body">
          <form action="foodupdatework.php" method="POST" enctype="multipart/form-data">   
                <div class="form-group">
                    <label for="food_title">Title</label>
                    <input type="text" class="form-control" id="food_title" name="food_title" value="<?php echo $row['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="food_des">Description</label>
                    <textarea class="form-control" id="food_des" rows="3" name="food_des"><?php echo $row['description'] ?></textarea>
                    <!-- Text area not support the value attribute but support the solution mention upper -->
                </div>       
                <div class="form-group">
                    Change Food Image
                    <br>
                   <label class="custom-file center-block block">
                    <input id="ct_update_img" class="custom-file-input" type="file" name="food_update_img">
                    <span class="custom-file-control"></span></label>
                   <img src="<?php echo $row['img_name'] ?>" alt="not found" height="50px" width="50px" style="margin-left:12px; border-radius:50%; margin-top:8px">
                </div>    
                <div class="form-group">
                    <label for="food_price">Food Price</label>
                    <input type="number" class="form-control" id="food_price" value="<?php echo $row['price'] ?>" name="food_price" style="display: inline-block;"> <span style="margin-left: -4.5rem; z-index:30;">Rs/-</span>
                </div>      
                <div class="radio">
                <?php 
                if($row['feature'] == "no"){
                    echo '
                    <label>Feature: </label>
                    <input type="radio" id="feature_yes" class="ml-1" value="yes" name="feature_food">
                    <label for="feature_yes">Yes</label>
                    <input type="radio" id="feature_no" class="ml-1" value="no" name="feature_food" checked>
                    <label for="feature_no">No</label>
                    ';
                }
                else
                {
                    echo '
                    <label>Feature: </label>
                    <input type="radio" id="feature_yes" class="ml-1" value="yes" name="feature_food" checked>
                    <label for="feature_yes">Yes</label>
                    <input type="radio" id="feature_no" class="ml-1" value="no" name="feature_food">
                    <label for="feature_no">No</label>
                    ';
                }
                 ?>
                </div>
                <div class="radio">
                <?php 
                if($row['active'] == "no"){
                    echo '
                    <label>Feature: </label>
                    <input type="radio" id="active_update_yes" class="ml-1" value="yes" name="active">
                    <label for="active_update_yes">Yes</label>
                    <input type="radio" id="active_update_no" class="ml-1" value="no" name="active" checked>
                    <label for="active_update_no">No</label>
                    ';
                }
                else
                {
                    echo '
                    <label>Active: </label>
                    <input type="radio" id="active_update_yes" class="ml-1" value="yes" name="active" checked>
                    <label for="active_update_yes">Yes</label>
                    <input type="radio" id="active_update_no" class="ml-1" value="no" name="active">
                    <label for="active_update_no">No</label>
                    ';
                }
                 ?>
                </div>
                <div class="form-group">
                    <h4 class="text-black">Food Category</h4>
                    <div class="row">
                        <div class="col-lg-6">
                        <select class="form-control" name="food_ct">
                            <?php 
                        $sql = "SELECT * FROM `tb_cat` WHERE `Sr` = '".$row['ct_id']."'";
                        $result1 = mysqli_query($connection, $sql);
                        if($result1){
                            while($row1 = mysqli_fetch_assoc($result1)){
                                echo '
                                <option selected value="'.$row1['Sr'].'">'.$row1['title'].'</option>
                                    ';
                                }
                                $selected_ct = $row['ct_id'];
                        }
                        else{echo '<option>Not available</option>';}
                             ?>
                             <?php 
                             $sql2 = "SELECT * FROM `tb_cat` WHERE `Sr` NOT IN ($selected_ct)";
                             $result2 = mysqli_query($connection, $sql2);
                             if($result2){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    echo '
                                    <option value="'.$row2['Sr'].'">'.$row2['title'].'</option>
                                        ';
                                    }
                            }
                            else{echo '<option>Not Find</option>';}
                              ?>
                             
                        </select>
                    </div>
                </div>
                <input type="hidden"name="sr" value="<?php echo $sr ?>">
              <button type="submit" class="btn bg-blue mt-3">Update</button>
            </form>
            </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.content --> 
</div>
<?php include 'partials/footer.php'; ?> 