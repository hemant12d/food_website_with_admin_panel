
<?php include 'partials/header.php'; ?>

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Add Admin</h1>
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
          <h5 class="text-white m-b-0">Add admin</h5>
        </div>
        <div class="card-body">
          <form action="addadminwork.php" method="POST">
            <?php 
            if(isset($_GET['msg']))
            {echo '<div class="form-group">'.$_GET['msg'].'</div> ';}
            ?>
              <div class="form-group">
                <label for="uname"> User name</label>
                <input type="text" class="form-control" id="uname" name="admin_uname">
              </div>
              <div class="form-group">
                <label for="password"> Password</label>
                <input type="password" class="form-control" id="password" name="admin_password">
              </div>             
              <div class="form-group">
                <label for="password">Confirm password</label>
                <input type="cpassword" class="form-control" id="cpassword" name="admin_cpassword">
              </div>  
              <!-- <div class="form-group has-feedback">
                    <label for="admin_img"> Upload Profile Picture</label>
                    <br>
                    <label class="custom-file center-block block">
                      <input id="admin_img" class="custom-file-input" type="file" name='admin_img'>
                      <span class="custom-file-control"></span> </label>
               </div>           -->
              <button type="submit" class="btn bg-blue">Submit</button>
            </form>
            </div>
        </div>
        </div>
      </div>
    </div>
    <!-- /.content --> 
</div>
  <!-- /.content-wrapper -->
<?php include 'partials/footer.php'; ?>