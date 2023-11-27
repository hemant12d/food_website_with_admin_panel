<?php include 'partials/connection.php'; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['food_title'];
    $description = $_POST['food_des'];
    $food_price = $_POST['food_price'];
    $join_date = date('Y-m-j');
    // Code for food feature Status
    if (isset($_POST['food_feature'])) {
        $feature = $_POST['food_feature'];
    }else{$feature = "no";}

    // Code for food Active Status 
    if (isset($_POST['food_active'])) {
        $active = $_POST['food_active'];
    }else{$active = "no";}

    // Code for food category 
    if ($_POST['food_ct'] != "noselect") {
        $food_ct_id = $_POST['food_ct'];
    }else{ $msg = "Category not Selected"; header("location:foodadd.php?msg=$msg"); }
     // Code for image is amazing and also look like professional
     if (isset($_FILES['food_img'])) {     
        if ($_FILES['food_img']['error'] == 0) {
            
            $img_name = $_FILES['food_img']['name'];
            $img_ext = explode(".", $img_name);
            $img_ext = end($img_ext);
            $time = time(); // Time add to imagename to make it unique
            $destfile = 'image/food_img/'.$_SESSION['username'].$time.'.'.$img_ext;
             $filemove = move_uploaded_file($_FILES['food_img']['tmp_name'], $destfile); 
             
            if ($filemove){
                $sql = "INSERT INTO `tb_food` (`title`, `description`, `price`, `img_name`, `ct_id`, `feature`, `active`, `join_date`) VALUES ('$title', '$description', '$food_price', '$destfile', '$food_ct_id', '$feature', '$active', '$join_date')";
                $result1 = mysqli_query($connection, $sql);
                if($result1){
                    $msg = "Category Added Successfully"; header("location:food.php?msg=$msg");
                }
                else{
                    $msg = "Details not added! Try again."; header("location:foodadd.php?msg=$msg");
                }

            }else{ $msg = "Unable to add! Try again.";  header("location:foodadd.php?msg=$msg"); }

        }else{ $msg = "There is an error in image! Try again.";  header("location:foodadd.php?msg=$msg"); }

    }else{ $msg = "Image not added! Try again."; header("location:foodadd.php?msg=$msg"); }

 
   
}else{header("location:login.php");}
 ?>