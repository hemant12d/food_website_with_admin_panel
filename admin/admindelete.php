
<?php include 'partials/connection.php'; ?>
<?php 
$sr = $_GET['sr_no'];
$sql = "DELETE FROM `tb_admin` WHERE `tb_admin`.`Sr` = $sr";
$result = mysqli_query($connection, $sql);
if($result){
header("location:admin.php?name=$name");
}
else{
header("location:index.php");
}
?>