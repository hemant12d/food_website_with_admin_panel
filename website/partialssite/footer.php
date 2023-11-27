    <!--!!!!!!!!!!!!!!!!!! footer Section Starts Here !!!!!!!!!!!!!!!!!!-->

    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Created &amp; Maintained By <a href="#">Hemant Soni (BCA, 1st year student)</a></p>
            <p style="margin-top: 1rem;">Design and Frontend Created By<a href="#"> Sir, Vijay Thapa</a></p>
        </div>
    </section>

    <!--!!!!!!!!!!!!!!!!!! footer Section Ends Here !!!!!!!!!!!!!!!!!!-->


    <!-- Script for order -->
    <script>

        // INCREMENT THE ORDER NUMBER
        let order_increment = document.getElementById('order_increment').addEventListener('click', function(){
            let current_value = document.getElementById('orderCount').value;
             let newValue = Number(current_value) + 1;
             document.getElementById('orderCount').value = newValue;
        });

        // DECREMENT THE ORDER NUMBER
        let order_decrement = document.getElementById('order_decrement').addEventListener('click', function(){
        let current_value = document.getElementById('orderCount').value;
        let newValue; // DECLARE HERE TO SET CHANGE THE VALUE(QUANTITY OF FOOD)

            // SET THE RESTRICTION FOR MINIMUM VALUE
            if (current_value == 1) {
                newValue = 1;
            }
            else{
                newValue = Number(current_value) - 1;
            }

             document.getElementById('orderCount').value = newValue;
        });

    </script>

</body>
</html>