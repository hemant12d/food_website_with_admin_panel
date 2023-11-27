<?php include 'partials/header.php'; ?>
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Category</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Wizard</li>
      </ol>
    </div>
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black m-b-3">Add Category</h4>
        <?php 
        if (isset($_GET['msg'])) {
            echo '<div class="my-1 text-danger">'.$_GET['msg'].'</div>';
        }
         ?>
        <div id="demo">
          <div class="step-app">
            <div class="step-content">
              <div class="step-tab-panel" id="step1">
            <form action="addcategorywork.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ct_title">Title</label>
                    <input type="text" class="form-control" id="ct_title" name="ct_title">
                </div>
                <div class="form-group">
                    Upload Img
                    <br>
                   <label class="custom-file center-block block">
                        <input id="file" class="custom-file-input" type="file" name="ct_img">
                    <span class="custom-file-control"></span></label>
                </div>
                
                <div class="radio">
                    <label>Feature: </label>
                    <input type="radio" id="feature_yes" class="ml-1" value="yes" name="feature">
                    <label for="feature_yes">Yes</label>
                    <input type="radio" id="feature_no" class="ml-1" value="no" name="feature">
                    <label for="feature_no">No</label>
                </div>
                <div class="radio">
                    <label>Active: </label>
                    <input type="radio" id="active_yes" class="ml-1" value="yes" name="active">
                    <label for="active_yes"> Yes</label>
                    <input type="radio" id="active_no" class="ml-1" value="no" name="active">
                    <label for="active_no">No</label>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form> 
              </div>         
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
    