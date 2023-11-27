<?php include 'partials/header.php'; ?>
<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <?php 
        if(isset($_GET['msg'])){
            echo '<h1 class="text-success mb-2">'.$_GET['msg'].'</h1>';
        }
        if (isset($_SESSION['delete'])) {
          echo '<h1 class="text-success mb-2">'.$_SESSION['delete'].'</h1>';
          unset($_SESSION['delete']);
        }
         ?>
      <h1 class="text-black">Categories Information</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
<h4 class="text-black">Category</h4>
<?php 
        if (isset($_GET['msg_update'])) {
            echo '<div class="my-1 text-danger">'.$_GET['msg_update'].'</div>';
        }
         ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Feature</th>
                <th scope="col">Active</th>
                <th scope="col">Date of Add</th>
                <th scope="col span-2">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                
            <?php 
            // here we are fetching details of admin
            $sql = "SELECT * FROM `tb_cat`";
            $result = mysqli_query($connection, $sql);
            if($result){
                $no = 1;
                while($row = mysqli_fetch_assoc($result)){
                echo '
                    <tr>
                    <th scope="row">'.$no.'</th>
                    <td>'.$row['title'].'</td>
                    <td><img src="'.$row['img_name'].'" alt="Not Available" height="40px" width="40px"></td>
                    <td>'.$row['feature'].'</td>
                    <td>'.$row['active'].'</td>
                    <td>'.$row['join_date'].'</td>
                    <td><a href="categoryupdate.php?sr_no='.$row['Sr'].'"><button type="button" class="btn btn-sm bg-blue">Update</button></a></td>
                    <td><a href="categorydelete.php?sr_no='.$row['Sr'].'"><button type="button" class="btn btn-sm bg-blue">Delete</button></a></td>
                    </tr>
                    ';
                    $no++;
                }
            }
            else{
                echo "no record found in the database";
            }

             ?>
       
            </tbody>
          </table>
        </div>
        </div>
    </div>
    <!-- /.content --> 
  </div>
<?php include 'partials/footer.php'; ?>