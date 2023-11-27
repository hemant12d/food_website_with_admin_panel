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
        <h4 class="text-black m-b-3">Add Food</h4>
        <?php 
        if (isset($_GET['msg'])) {
            echo '<div class="my-1 text-danger">'.$_GET['msg'].'</div>';
        }
         ?>
        <div id="demo">
          <div class="step-app">
            <div class="step-content">
              <div class="step-tab-panel" id="step1">
            <form action="foodaddwork.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="food_title">Title</label>
                    <input type="text" class="form-control" id="food_title" name="food_title">
                </div>
                <div class="form-group">
                <fieldset class="form-group">
                    <label for="food_des">Description</label>
                    <textarea class="form-control" id="food_des" rows="3" name="food_des"></textarea>
                </fieldset>
                </div>

                <div class="form-group">
                    Food Img
                    <br>
                   <label class="custom-file center-block block">
                        <input id="file" class="custom-file-input" type="file" name="food_img">
                    <span class="custom-file-control"></span></label>
                </div>
                
                <div class="form-group">
                    <label for="food_price">Food Price</label>
                    <input type="number" class="form-control" id="food_price" name="food_price" style="display: inline-block;"> <span style="margin-left: -4.5rem; z-index:30;">Rs/-</span>
                </div>
                
                <div class="radio">
                    <label>Feature: </label>
                    <input type="radio" id="food_feature_yes" class="ml-1" value="yes" name="food_feature">
                    <label for="food_feature_yes">Yes</label>
                    <input type="radio" id="food_feature_no" class="ml-1" value="no" name="food_feature">
                    <label for="food_feature_no">No</label>
                </div>
                <div class="radio">
                    <label>Active: </label>
                    <input type="radio" id="food_active_yes" class="ml-1" value="yes" name="food_active">
                    <label for="food_active_yes"> Yes</label>
                    <input type="radio" id="food_active_no" class="ml-1" value="no" name="food_active">
                    <label for="food_active_no">No</label>
                </div>
                <div class="form-group">
                    <h4 class="text-black">Select Category</h4>
                    <div class="row">
                        <div class="col-lg-6">
                        <select class="form-control" name="food_ct">
                        <option selected value="noselect">Select</option>
                            <?php 
                        $sql = "SELECT * FROM `tb_cat` WHERE `active` = 'yes'";
                        $result = mysqli_query($connection, $sql);
                        if($result){
                        if ($row = mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo '
                                <option value="'.$row['Sr'].'">'.$row['title'].'</option>
                                    ';
                                }
                        }else{echo '<option>Not available</option>';}
                        }
                        else{echo '<option>Not available</option>';}
                             ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="mt-3 btn bg-blue">Submit</button>
            </form> 
              </div>         
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
    