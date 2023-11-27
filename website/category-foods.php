<?php include 'partialssite/header.php'; ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
               if (isset($_GET['sr_no'])) {
                $sr = $_GET['sr_no'];
                $sql1 = "SELECT * FROM `tb_cat` WHERE `Sr` = $sr";
                $result1 = mysqli_query($connection, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    $ct = mysqli_fetch_assoc($result1);
                    echo '<h2>Foods on <a href="#" class="text-white">"'.$ct['title'].'"</a></h2>';
                }else{header('location:index.php');}
               }
               else{header('location:index.php');}

             ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            $sql = "SELECT * FROM `tb_food` WHERE `ct_id` = $sr";
            $result = mysqli_query($connection, $sql);
            if ($result){
                if (mysqli_num_rows($result) > 0) {
                    while($food = mysqli_fetch_assoc($result)){
                        $food_id = $food['Sr'];
                        echo '
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="../'.$food['img_name'].'" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>
                            <div class="food-menu-desc">
                                <h4>'.$food['title'].'here</h4>
                                <p class="food-price">'.$food['price'].' Rs/-</p>
                                <p class="food-detail">
                                '.$food['description'].'
                                </p>
                                <br>
                                <form action="order.php" method="POST">
                                    <input type="hidden" id="order" name="order" value="'.$food_id.'">
                                    <button type="submit" class="btn btn-primary">Order Now</button>
                                    </form>
                            </div>
                            
                        </div>
                                 ';
                    }
                }else{ echo '<h2 class="text-start">Food not found to this category</h2>';}
            }
             ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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

   <?php include 'partialssite/footer.php'; ?>