<?php include 'partials/connection.php'; ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['admin_uname'];
  $password = $_POST['admin_password'];
  $cpassword = $_POST['admin_cpassword'];
  $join_date = date('Y-m-j');

//   echo $uname; echo "<br>";
//   echo $password; echo "<br>";
//   echo $cpassword; echo "<br>";
//   echo $join_date; echo "<br>";

// 
    $sql = "SELECT * FROM `tb_admin` WHERE `uname` = '$username'";
    $result1 = mysqli_query($connection, $sql);
    if($result1)
    {     
    if(mysqli_num_rows($result1) > 0){
    $msg = '<div style="color:red;">Username is already taken</div>';
    header("location:addadmin.php?msg=$msg");
    }
    else{
        if($password == $cpassword)
        {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tb_admin` (`uname`, `password`, `join_date`) VALUES ('$username', '$password_hash', '$join_date')";
            $result1 = mysqli_query($connection, $sql);

            if($result1) {$_SESSION['added'] = true; header("location:admin.php");}
            
            else{$msg = '<div style="color:red;">Admin Can\'t added
                 something wrong  has done.</div>';
                header("location:addadmin.php?msg=$msg");}
        }
        else{
            $msg = '<div style="color:red;">Password not match with confirm password</div>';
            header("location:addadmin.php?msg=$msg");
        }
    }
  }
  else{
  $msg = '<div style="color:red;">Admin Can\'t added something wrong has done.</div>';
  header("location:addadmin.php?msg=$msg");
  }
      
  }
 ?>