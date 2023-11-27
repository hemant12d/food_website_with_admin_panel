<?php include 'partialssite/header.php'; ?>
    

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on Your Search <a href="4" class="text-white">"<?php 
            echo $_POST['search'];
             ?>"</a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $search_result = $_POST['search'];
            $sql = "SELECT * FROM `tb_food` WHERE `title` LIKE '%$search_result%' OR `description` LIKE '%$search_result%'";
            $result = mysqli_query($connection, $sql);
            if ($result){
                if (mysqli_num_rows($result) > 0) {
                    while($food = mysqli_fetch_assoc($result))
                    {
                        $food_id = $food['Sr'];
                    echo '
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="../'.$food['img_name'].'" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>'.$food['title'].'</h4>
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
                }
                else{
                echo '
                <h2 class="text-start">Nothing Found to your search term</h2>
                <h4 class="text-start">Our Recommanded</h4>';
                echo '
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>Food Title</h4>
                        <p class="food-price">$2.3</p>
                        <p class="food-detail">
                            Made with Italian Sauce, Chicken, and organice vegetables.
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>Food Title</h4>
                        <p class="food-price">$2.3</p>
                        <p class="food-detail">
                            Made with Italian Sauce, Chicken, and organice vegetables.
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                '; }
            } else{echo "Nothing is Available on the server";}
            }
            else{
                header('location:index.php');
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