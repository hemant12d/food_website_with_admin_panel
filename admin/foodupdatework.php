<?php include 'partials/connection.php'; ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['food_title'];
    
    $description = $_POST['food_des'];
    
    $feature = $_POST['feature_food'];

    $food_price = $_POST['food_price'];
    
    $active = $_POST['active'];

    $food_ct = $_POST['food_ct'];

    $sr = $_POST['sr'];

    if (isset($_FILES['food_update_img'])) {    
        if ($_FILES['food_update_img']['error'] == 0) {
            $img_name = $_FILES['food_update_img']['name'];
            $img_ext = explode(".", $img_name);
            $img_ext = end($img_ext);
            $time = time(); // Time add to imagename to make it unique
            $destfile = 'image/food_update_img/'.$_SESSION['username'].$time.'.'.$img_ext;
             $filemove = move_uploaded_file($_FILES['food_update_img']['tmp_name'], $destfile); 
             echo "Here is he";
            if ($filemove) {
                $old_img_food = $_SESSION['old_img_food'];
                $remove = unlink($old_img_food);
                unset($_SESSION['old_img_food']);
                $sql = "UPDATE `tb_food` SET `title` = '$title', `description` = '$description', `price` = $food_price, `img_name` = '$destfile', `ct_id` = ' $food_ct', `feature` = '$feature', `active` = '$active' WHERE `Sr` = $sr";
                $result1 = mysqli_query($connection, $sql);
                if($result1){
                    $msg = "Category Update Successfully"; header("location:food.php?msg=$msg");}else{$msg = "Details not added! Try again."; header("addlocation:category.php?msg=$msg");}

            }else{$msg = "Image not added! Try again."; header("location:food.php?msg_update=$msg");}

        }else{$msg = "Image not added! Try again."; header("location:food.php?msg_update=$msg");}
    }else{$msg = "Image not added! Try again."; header("location:food.php?msg_update=$msg");}

}
    ?>

