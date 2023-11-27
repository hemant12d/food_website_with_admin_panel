<?php include 'partialssite/header.php'; ?>
   

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food Search Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
        <?php 
        if(isset($_GET['msg']) && $_GET['msg'] == true){
            echo '<h2 class="text-start" style="color:red;">Unable to place order</h2>';
            unset($_SESSION['order_error']);
        }
        if(isset($_GET['order_done']) && $_GET['order_done'] == true){
            echo '<h2 class="text-start" style="color:green;">Order has placed</h2>';
        }
         ?>
        <h2 class="text-center">Explore Foods</h2>
        
        <!-- Display the category of food -->
        <?php 
        $sql = "SELECT * FROM `tb_cat` WHERE `feature` = 'yes' AND `active` = 'yes' LIMIT 3";
        $category = mysqli_query($connection, $sql);
      
        if ($category) {

            $num_ct = mysqli_num_rows($category);
            if ($num_ct == 0) {
                echo '<h2 class="text-start">Food Category is not added</h2>';
            }

            else{

            while($ct = mysqli_fetch_assoc($category))
            {
                $ct_id = $ct['Sr'];
                $ct_title = $ct['title'];
                $ct_img = $ct['img_name'];

                echo '<a href="category-foods.php?sr_no='.$ct_id.'">
                <div class="box-3 float-container">
                    <img src="../'.$ct_img.'" alt="Pizza" class="img-responsive img-curve">
                    <h3 class="float-text text-white">'.$ct_title.'</h3>
                </div>
                </a>';
            }

           }

        }

            //__________Error when sql is not working or server error___________________________
        else{
            echo '<h2 class="text-start">Currently food category is not available due to server error</h2>';
        }
        ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
<?php 
             $sql1 = "SELECT * FROM `tb_food` WHERE `feature` = 'yes' AND `active` = 'yes' LIMIT 6";
             $food = mysqli_query($connection, $sql1);
             // $ct = mysqli_fetch_assoc($category);
             if ($food) {
                $num_food = mysqli_num_rows($food);

                if ($num_food < 1) {
                     echo '<h2 class="text-start">Food Category is not added</h2>';
                 }

                else{

                 while($each_food = mysqli_fetch_assoc($food))
                 {
                     $food_id = $each_food['Sr'];
                     echo '<div class="food-menu-box">
                                <div class="food-menu-img">
                                    <img src="../'.$each_food['img_name'].'" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                </div>
                
                                <div class="food-menu-desc">
                                    <h4>'.$each_food['title'].'</h4>
                                    <p class="food-price">'.$each_food['price'].' Rs/-</p>
                                    <p class="food-detail">
                                    '.$each_food['description'].'
                                    </p>
                                    <br>
                                    <form action="order.php" method="POST">
                                    <input type="hidden" id="order" name="order" value="'.$food_id.'">
                                    <button type="submit" class="btn btn-primary">Order Now</button>
                                    </form>
                                </div>
                           </div> ';
     
                 }

                }
             }

                 //__________Error when sql is not working or server error___________________________
             else{
                 echo '<h2 class="text-start">Currently Food Menu is not available due to server error</h2>';
             }
?>
            <div class="clearfix"></div>
            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- Food Menu Section Ends Here -->

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

