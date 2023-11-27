
<?php include 'partials/connection.php'; ?>
<?php 
$sr = $_GET['sr_no'];
// Before Deleting we will also remove the img from the folder and that's consider a good practice
$sql = "SELECT * FROM `tb_cat` WHERE `Sr` = $sr";
$result = mysqli_query($connection, $sql);
$row =  mysqli_fetch_assoc($result)['img_name'];
unlink($row); // unlink function is used to remove the file from the folder

$sql = "DELETE FROM `tb_cat` WHERE `Sr` = $sr";
$result = mysqli_query($connection, $sql);
if($result){
    $_SESSION['delete'] = "Delete Successful"; header("location:category.php");
}
else{$_SESSION['delete'] = "Unable to Delete"; header("location:category.php");}

// unlink($path) is used to remove image from the folder must use it for better performace
?>