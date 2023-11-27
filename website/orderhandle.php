<?php 
require 'partialssite/siteconnection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // GET THE CURRENT DATE
    $today_date = date('Y-m-j');
    $today_date;

    // GET THE ORDER DETAILS
    $food_id = $_POST['sr'];
    $food_qty = $_POST['qty'];
    $cus_name = $_POST['full-name'];
    $number = $_POST['contact'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];

    // SET THE CURRENT STATUS
    $status = "panding";
    $placed = "no";

    // GET THE FOOD NAME AND PRICE 

    $sql = "SELECT * FROM `tb_food` WHERE `Sr` = $food_id";
    $result = mysqli_query($connection, $sql);
    if($result){

        $food_detail = mysqli_fetch_assoc($result); 
        $food_name = $food_detail['title'];
        $food_price = $food_detail['price'];
       

        $sql1 = "INSERT INTO `tb_orders` (`food_id`, `food_name`, `price`, `quantity`, `cus_name`, `number`, `mail`, `address`, `status`, `placed`, `date`) VALUES ('$food_id', '$food_name', '$food_price', '$food_qty', '$cus_name', '$number', '$mail', '$address', '$status', '$placed', '$today_date')";
        $result1 = mysqli_query($connection, $sql1);  // Bilkul Ricks nhi lena ka :>
        if ($result1) {
            $_SESSION['order_done'] = true;
            echo "You successfully placed the order";
            $msg = $_SESSION['order_done'];
            header("location:index.php?order_done=$msg");
        }

        // HANDLE THE ERROR (ERROR IS DYNAMIC)
        else{

            $_SESSION['order_error'] = true;
            $msg = $_SESSION['order_error'];
            header("location:index.php?msg=$msg");

        }
        
    }
    // HANDLE THE ERROR (ERROR IS DYNAMIC)
    else{

        $_SESSION['order_error'] = true;
        $msg = $_SESSION['order_error'];
        header("location:index.php?msg=$msg");

    }
    

}
// HANDLE THE UNAUTHORISED ACCESS
else{
    header('location:index.php');
}
    ?>