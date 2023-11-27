
<?php include 'partials/connection.php'; ?>
<?php 
$sr = $_GET['sr_no'];
// Before Deleting we will also remove the img from the folder and that's consider a good practice
$sql = "SELECT * FROM `tb_food` WHERE `Sr` = $sr";
$result = mysqli_query($connection, $sql);
$food_img =  mysqli_fetch_assoc($result)['img_name'];
unlink($food_img);

$sql = "DELETE FROM `tb_food` WHERE `Sr` = $sr";
$result = mysqli_query($connection, $sql);
if($result){
    $_SESSION['delete_food'] = "Delete Successful"; header("location:food.php");
}
else{$_SESSION['delete_food'] = "Unable to Delete"; header("location:food.php");}

// unlink($path) is used to remove image from the folder must use it for better performace
?>