<?php include 'partials/header.php'; ?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Update Admin Details</h1>
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
            $sql = "SELECT * FROM `tb_admin` WHERE `Sr` = $sr";
            $result = mysqli_query($connection, $sql);
            $name =  mysqli_fetch_assoc($result)['uname'];
            echo '<h5 class="text-white m-b-0">Update Details for '.$name.'</h5> ';  
        }
             ?>
        </div>
        <div class="card-body">
          <form action="adminupdatework.php" method="POST">          
              <?php 
              if(isset($_SESSION['old_password']))
                {
                  echo '
                <div class="form-group text-danger">
                '.$_SESSION['old_password'].'
                </div>
                      ';
                      unset($_SESSION['old_password']);
                }
               ?>             
               <?php
              if(isset($_SESSION['detail_update']))
                {
                  echo '
                <div class="form-group text-danger">
                '.$_SESSION['detail_update'].'
                </div>
                      ';
                      unset($_SESSION['detail_update']);
                }
               ?>             
              <div class="form-group">
                <label for="uname"> User name</label>
                <input type="text" class="form-control" id="uname" name="new_uname" value="<?php echo $name ?>">
              </div>
              <div class="form-group">
                <label for="password">Old Password</label>
                <input type="password" class="form-control" id="password" name="new_password">
              </div>             
              <div class="form-group">
                <label for="password">New password</label>
                <input type="password" class="form-control" id="cpassword" name="new_cpassword">
              </div>  
              <div class="form-group">
                <input type="hidden" class="form-control" id="sr" name="sr" value="<?php echo $sr ?>">
              </div>  
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