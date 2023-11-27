<?php include 'partials/connection.php'; ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $update_title = $_POST['updated_title'];
    $feature = $_POST['feature_update'];
    $active = $_POST['active_update'];
    $sr = $_POST['sr'];
    if (isset($_FILES['ct_update_img'])) {    
        
        if ($_FILES['ct_update_img']['error'] == 0) {
            $img_name = $_FILES['ct_update_img']['name'];
            $img_ext = explode(".", $img_name);
            $img_ext = end($img_ext);
            $time = time(); // Time add to imagename to make it unique
            $destfile = 'image/ct_update_img/'.$_SESSION['username'].$time.'.'.$img_ext;
             $filemove = move_uploaded_file($_FILES['ct_update_img']['tmp_name'], $destfile); 
            if ($filemove) {
                $old_img_path = $_SESSION['old_img'];
                $remove = unlink($old_img_path);
                unset($_SESSION['old_img']);
                $sql = "UPDATE `tb_cat` SET `title` = '$update_title', `img_name` = '$destfile', `feature` = '$feature', `active` = '$active' WHERE `Sr` = $sr";
                $result1 = mysqli_query($connection, $sql);
                if($result1){
                    $msg = "Category Update Successfully"; header("location:category.php?msg=$msg");}else{$msg = "Details not added! Try again."; header("addlocation:category.php?msg=$msg");}

            }else{$msg = "Image not added! Try again."; header("location:category.php?msg_update=$msg");}

        }else{
            $msg = "Image not added! Try again."; header("location:category.php?msg_update=$msg");}
    }else{
        $msg = "Image not added! Try again."; header("location:category.php?msg_update=$msg");}

}
    ?>

