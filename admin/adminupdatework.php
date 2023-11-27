<?php include 'partials/connection.php'; ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $uname = $_POST['new_uname'];
    $password = $_POST['new_password'];
    $newpassword = $_POST['new_cpassword'];
    $sr = $_POST['sr'];
    $join_date = date('Y-m-j');
    $sql = "SELECT * FROM `tb_admin` WHERE `Sr`= '$sr'";
        $result = mysqli_query($connection, $sql);
        if (password_verify($password, mysqli_fetch_assoc($result)['password'])){
                // echo ":) Thanks Laptop";
            $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
            $sql = "UPDATE `tb_admin` SET `uname` = '$uname', `password` = '$password_hash' WHERE `Sr` = $sr";
            $result = mysqli_query($connection, $sql);
            if ($result){
            $_SESSION['name'] = $uname;
            header("location:admin.php"); 
            }
            else{
            $msg = "Details not Updated";
            $_SESSION['detail_update'] = $msg;
            header("location:adminupdate.php?sr_no=$sr"); 
            }
        
        }
        else
        {
        $msg = "Old password is not correct";
        $_SESSION['old_password'] = $msg;
        header("location:adminupdate.php?sr_no=$sr"); 
        }
    // echo $uname;
    // echo "<br>";
    // echo $password;
    // echo "<br>";
    // echo $cpassword;
    // echo "<br>";
    // echo $sr;
    // echo "<br>";
    // echo $join_date;
    // echo "<br>";
}  
else{
    $msg = '<div style="color:red;">Please login to continue</div>';
    header("location:login.php?msg=$msg");
}
    
 ?>