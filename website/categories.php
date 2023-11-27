<?php include 'partialssite/header.php'; ?>
   



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
        $sql = "SELECT * FROM `tb_cat` WHERE `feature` = 'yes' AND `active` = 'yes'";
        $category = mysqli_query($connection, $sql);
        // $ct = mysqli_fetch_assoc($category);
        
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