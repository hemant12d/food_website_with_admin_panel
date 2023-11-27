<?php include 'partials/connection.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['ct_title'];
    $join_date = date('Y-m-j');
    if (isset($_POST['feature'])) {
        $feature = $_POST['feature'];
    }else{$feature = "no";}

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    }else{$active = "no";}
   
    if (isset($_FILES['ct_img'])) {
        if ($_FILES['ct_img']['error'] == 0) {
            
            $img_name = $_FILES['ct_img']['name'];
            $img_ext = explode(".", $img_name);
            $img_ext = end($img_ext);
            $time = time(); // Time add to imagename to make it unique
            $destfile = 'image/ct_img/'.$_SESSION['username'].$time.'.'.$img_ext;
             $filemove = move_uploaded_file($_FILES['ct_img']['tmp_name'], $destfile); 
            if ($filemove) {
             
                $sql = "INSERT INTO `tb_cat` (`title`, `img_name`, `feature`, `active`, `join_date`) VALUES ('$title', '$destfile', '$feature', '$active', '$join_date')";
                $result1 = mysqli_query($connection, $sql);
                if($result1){$msg = "Category Added Successfully"; header("location:category.php?msg=$msg");}else{$msg = "Details not added! Try again."; header("addlocation:category.php?msg=$msg");}

            }else{$msg = "Image not added! Try again."; header("location:addcategory.php?msg=$msg");}

        }else{$msg = "Image not added! Try again."; header("location:addcategory.php?msg=$msg");}

    }else{$msg = "Image not added! Try again."; header("location:addcategory.php?msg=$msg");}
}
// $destfile = 'images/'.$img['name'];
// if ($img['error'] === 0) {
//     // echo "You are ready for the next move";
//     move_uploaded_file($img['tmp_name'], $destfile); 
//     echo "Inserted successful";
// }

 ?>