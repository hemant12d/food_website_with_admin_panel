<?php include 'partialssite/header.php'; ?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$food_id = $_POST['order'];
$sql = "SELECT * FROM `tb_food` WHERE `Sr` = $food_id";
$result = mysqli_query($connection, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $food = mysqli_fetch_assoc($result);
            $title = $food['title'];
            $price = $food['price'];
            $img = $food['img_name'];
        }
        
        // ERROR CONTROLLING
        else{
            $_SESSION['order_error'] = true;
            $msg = $_SESSION['order_error'];
            header("location:index.php?msg=$msg");
        }
    }

        // ERROR CONTROLLING
        else{
            $_SESSION['order_error'] = true;
            $msg = $_SESSION['order_error'];
            header("location:index.php?msg=$msg");
        }
}       

       // HANDEL UNAUTORISED ACCESS
       else { header("location:index.php"); }
 ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="orderhandle.php" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="../<?php echo $img ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <?php echo '<h3>'.$title.'</h3><p class="food-price">'.$price.' Rs/-</p>'; ?>
                        <div class="order-label">Quantity</div>
                        <span id="order_increment" class="order_increment" style=" border: 2px solid #336699; float:right; margin-right: .4rem; font-size:20px; padding:0px 10px;
                        margin-bottom:.4rem; border-radius:8px; cursor:pointer">&#43;</span>
                        <span id="order_decrement" class="order_decrement" style=" border: 2px solid #336699; float:right; margin-right: .4rem; font-size:20px; padding:0px 10px;
                        margin-bottom:.4rem; border-radius:8px; cursor:pointer">&#8722;</span>
                        <input type="number" name="qty" id="orderCount" class="input-responsive" value="1" required>
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="mail" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    <input type="hidden" id="sr" name="sr" value="<?php echo $food_id ?>">
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
 <?php include 'partialssite/footer.php'; ?>