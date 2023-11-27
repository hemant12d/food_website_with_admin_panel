<?php include 'partials/connection.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <style>
      .login_page{
          max-height: 360px;
          min-height: 280px;
          width: 40%;
        border: 2px solid black;
        padding: 12px 12px;
          /* border: 2px solid black; */
      }
      .container{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        /* min-height: 100%; */
      }
  </style>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Get details through the post parameter
  // Details about php
  // The PHP provides $_POST associative array to access all the sent information using POST method
  $uname = $_POST['uname'];
  $password = $_POST['password'];
  // $password = password_verify($password, $row['password']);
  $sql = "SELECT * FROM `tb_admin` WHERE `uname` = '$uname'";
  $result = mysqli_query($connection, $sql);
  if($result)
    {    
      if(mysqli_num_rows($result) == 1 && password_verify($password, mysqli_fetch_assoc($result)['password'])){
        session_start();
        $_SESSION['username'] = $uname;
        $_SESSION['login'] = true;
        // $_SESSION['login_msg'] = '<div>login successful</div>';
        header("location:index.php");
      }
      else{
        $msg = '<div style="color:red;"> Deatils not correct</div>';
        header("location:login.php?msg=$msg");
      }
    }
    else
    {
      $msg = '<div style="color:red;"> Deatils not correct</div>';
      header("location:login.php?msg=$msg");
    }



  // $passwordhash = password_varify($password, ); //Encrypted the password
  
  // Make Query to store the data in the database


  //  $result = mysqli_query($connection, $sql);
  //  if($result)
  //   {
  //    header("location:index.php");
  //   }
  //   else
  //   {
  //    header("location:login.php");

  //   }
  // Store the information in the database
}
 ?>
  <body>
   <div class="container">
       <div class="login_page">
       <form action = "./login.php" method='POST'>
             <?php 
             if(isset($_GET['msg']))
             echo '
             <div class="mb-3">
                '.$_GET['msg'].'
              </div>
                   ';
                
             ?>
            
            
            <div class="mb-3">
                <label for="uname" class="form-label">Username</label>
                <input type="text" class="form-control" id="uname" name="uname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div id="uname" class="form-text">Your password is encrypted when send to this site</div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
       </div>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>
