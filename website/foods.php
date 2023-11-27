<?php include 'partialssite/header.php'; ?>
   

     <!-- 
        --------------------------------------
          Start Food Search Section  
        ---------------------------------------
     -->

    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- 
        --------------------------------------
          Closed Food Search Section  
        ---------------------------------------
     -->



    < <!-- 
        --------------------------------------
         Start Food Menu Section  
        ---------------------------------------
     -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
             $sql1 = "SELECT * FROM `tb_food` WHERE `feature` = 'yes' AND `active` = 'yes'";
             $food = mysqli_query($connection, $sql1);
           
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
                           </div>
                     ';
     
                 }
                }
             }


                 /* 
                 -------------------------------------------------------
                   Error when sql is not working or server error
                 -------------------------------------------------------
                 */
                 
                 

             else{
                 echo '<h2 class="text-start">Currently food is not available due to server error</h2>';
             }
?>



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



    <!--

        -------------------------------------------------
          Start Social Section 
        -------------------------------------------------

    -->
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


    <!-- 
        -------------------------------------------------
          Closed social Section
        -------------------------------------------------
     -->

   <?php include 'partialssite/footer.php'; ?>