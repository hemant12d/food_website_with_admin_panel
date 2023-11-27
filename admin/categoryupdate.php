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
            $sql = "SELECT * FROM `tb_cat` WHERE `Sr` = $sr";
            $result = mysqli_query($connection, $sql);
            $row =  mysqli_fetch_assoc($result);
            $_SESSION['old_img'] = $row['img_name'];
            echo '<h5 class="text-white m-b-0">Update Details for '.$row['title'].'</h5> ';  
        }
             ?>
        </div>
        <div class="card-body">
          <form action="categoryupdatework.php" method="POST" enctype="multipart/form-data">          
              <div class="form-group">
                <label for="updated_title">Title</label>
                <input type="text" class="form-control" id="updated_title" name="updated_title" value="<?php echo $row['title'] ?>">
              </div>
              <div class="form-group">
                    Change Image
                    <br>
                   <label class="custom-file center-block block">
                        <input id="ct_update_img" class="custom-file-input" type="file" name="ct_update_img">
                    <span class="custom-file-control"></span></label>
                   <img src="<?php echo $row['img_name'] ?>" alt="not found" height="50px" width="50px" style="margin-left:12px; border-radius:50%; margin-top:8px">
                </div>          
                <div class="radio">
                <?php 
                if($row['feature'] == "no"){
                    echo '
                    <label>Feature: </label>
                    <input type="radio" id="feature_yes" class="ml-1" value="yes" name="feature">
                    <label for="feature_yes">Yes</label>
                    <input type="radio" id="feature_no" class="ml-1" value="no" name="feature" checked>
                    <label for="feature_no">No</label>
                    ';
                }
                else
                {
                    echo '
                    <label>Feature: </label>
                    <input type="radio" id="feature_yes" class="ml-1" value="yes" name="feature_update" checked>
                    <label for="feature_yes">Yes</label>
                    <input type="radio" id="feature_no" class="ml-1" value="no" name="feature_update">
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
                    <input type="radio" id="active_update_yes" class="ml-1" value="yes" name="active_update">
                    <label for="active_update_yes">Yes</label>
                    <input type="radio" id="active_update_no" class="ml-1" value="no" name="active_update" checked>
                    <label for="active_update_no">No</label>
                    ';
                }
                else
                {
                    echo '
                    <label>Active: </label>
                    <input type="radio" id="active_update_yes" class="ml-1" value="yes" name="active_update" checked>
                    <label for="active_update_yes">Yes</label>
                    <input type="radio" id="active_update_no" class="ml-1" value="no" name="active_update">
                    <label for="active_update_no">No</label>
                    ';
                }
                 ?>
                </div>
                <input type="hidden"name="sr" value="<?php echo $sr ?>">
              <button type="submit" class="btn bg-blue">Update</button>
            </form>
            </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.content --> 
</div>
<?php include 'partials/footer.php'; ?>