<?php
include_once('connection.php');
session_start();
include ('showimage.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title lang="es">ELENA Café</title>
        <link rel="icon" type="image/x-icon" href="ELENA Cafe.jpg">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <!-- header section starts  -->

        <header class="header">
            <!-- FA: (Changing the Logo style and border and height = 8 rem) -->
            <a href="#" class="logo">
                <img src="ELENA Cafe.jpg" alt="" style="border-radius: 50% 20% / 10% 40%; border: 2px solid var(--main-color); height: 8rem;">
            </a>

            <!-- FA: (Changing font-size to 2rem) -->
            <nav class="navbar">
                <a href="#home" style="font-size: 3rem;">home</a>
                <a href="#about" style="font-size: 3rem;">about</a>
                <a href="#menu" style="font-size: 3rem;">menu</a>
                <!-- <a href="#products" style="font-size: 2rem;">products</a>         Will be deleted  -->
                <a href="#gallery" style="font-size: 3rem;">gallery</a>
                <a href="#review" style="font-size: 3rem;">review</a>
                <a href="#contact" style="font-size: 3rem;">contact</a>
            </nav>




            <div class="icons">
                <!-- Start of : (login / register section) -->
                <a href="login.php" id="Login-btn" class="Login-btn">Login</a>
                <a href="Register.php" id="Register-btn" class="Register-btn">Register</a>
                <a href="adminview.php" id="Register-btn" class="Register-btn">admin</a>
                <!-- End of : (login / register section) -->
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>



            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

        </header>

        <!-- header section ends -->

        <!-- home section starts  -->

        <section class="home" id="home">

            <div class="content">
                <!-- FA: (Changing style of <h3> tag) -->
                <h3 style="font-size: 55px;">fresh coffee in the morning</h3>
                <p>ELENA is coffee lovers destination.☕</p>
                <a href="#menu" class="btn">get yours now</a>
            </div>

        </section>

        <!-- home section ends -->

        <!-- about section starts  -->

        <section class="about" id="about">

            <h1 class="heading"> <span>about</span> us </h1>

            <div class="row">

                <div class="image">
                    <img src="images/about-img.jpeg" alt="">
                </div>

                <div class="content">
                    <h3>what makes our coffee special?</h3>
                    <p>ELENA is one of the newest coffee shops in SaudiArabia, which is now located in Riyadh, we serve alot of delicious desserts and high quality coffee. Remember, ELENA is coffee lovers destination.☕</p>
                    <a href="#" class="btn">learn more</a>
                </div>

            </div>

        </section>

        <!-- about section ends -->

        <!-- menu section starts  -->
        <!-------------------------------------------------- new_code---------------->

        <section class="menu" id="menu">
            <div class="box-container">
                <?php
                $sqlMenu = "SELECT * FROM menu";
                $result = $conn->query($sqlMenu) or die(mysqli_error($conn));
                while ($record = mysqli_fetch_array($result)) {
                ?>


                <div class="box">
                    <?php $extension = getExtension($record['menu_path']); 
                    ?> 
                    <?php echo '<img src="data:image/'.$extension.';base64,'.base64_encode($record['menu_image']).'"/>'?>;
                    <h3><?php echo $record['menu_name']; ?></h3>
                    <div class="price"><?php echo $record['disc_price']; ?><span><?php echo $record['org_price']; ?></span></div>
                    <h3 style="font-size: 20px;">Quantatiy</h3>
                    <input type="number" name=<?php echo $record['menu_id']; ?> id=<?php echo $record['menu_id']; ?> class="btn" style="width:80%;  
                                                                                                                                        text-align: center;" placeholder="Quantatiy" min="0" max="30" form="checkout" value="0">

                </div>
                <?php } ?>
                <!-------------------------------------------------- end of new_code---------------->
                <!-- menu section ends  -->

                </section>
            <form method="post" name="checkout" id="checkout" action="shoppingCart.php">
                <input type="submit" form="checkout" class=" btn btn-lg btn-block" style="background-color: #d3ad7f; display:block; width: 70%;margin: auto;" value="Checkout">
                <!-----here lies the form, it is accessed every where else using form attribute-->
            </form>

            <!-- menu section ends -->

            <!-- review section starts Edited by Abdulaziz-->

            <section class="review" id="review">

                <h1 class="heading"> instagram <span>reviews</span> </h1>

                <div class="box-container">

                    <?php $sql = "select * from review limit 3"; //It's limitwed to three reviews, you can edit it if u want
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) :
                    ?>
                    <div class="box">
                        <img src="images/quote-img.png" alt="" class="quote">
                        <p><br><br><?php echo $row['review_comment'] ?><br><br><br><br></p>
                        <img src="<?php echo $row['review_path'] ?>" class="user" alt="">
                        <h3><?php $row['review_name'] ?></h3>
                        <div class="stars">
                            <?php
    $str = $row['review_stars'];

                            while ($str > 0) // This is the logic behind printing the number of starts 
                            {
                                if (($str >= 1)) // Here if it's bigger than 1 (the rating) it means it's a full star
                                    echo '<i class="fas fa-star"></i>' . " ";
                                else // less than one will print half a star no matter what it is
                                    echo '<i class="fas fa-star-half-alt"></i>' . " ";
                                $str--;
                            }

                            echo "<br>";
                            ?>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>

            </section>

            <!-- review section ends Edited by Abdulaziz-->

            <!--   HI: contact section starts  -->

            <section class="contact" id="contact">

                <h1 class="heading"> <span>contact</span> us </h1>

                <div class="row">

                    <iframe class="map" src="https://maps.google.com/maps?q=4034%20%D8%A7%D9%84%D9%88%D8%A7%D8%AF%D9%8A%D8%8C%20%D8%AD%D9%8A%20%D9%84%D8%A8%D9%86%D8%8C%20%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6%2012936%206086%D8%8C%D8%8C%20%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6%2012936&t=&z=19&ie=UTF8&iwloc=&output=embed"></iframe>
                    <form action="">
                        <!--  HI:  This is for the javascript that is responsible for switching forms -->
                        <input disabled id="Button1" type="button" value="Support" onclick="switchVisible(); disablefirstbutton();" />
                        <input id="Button2" type="button" value="Hiring" onclick="switchVisible();disablesecondbutton();" />
                        <div class="">
                            <div id="Support" style="display: inline;">

                                <div class="inputBox">
                                    <span class="fas fa-user"></span>
                                    <input type="text" placeholder="name" name="name">
                                </div>
                                <div class="inputBox">
                                    <span class="fas fa-envelope"></span>
                                    <input type="email" placeholder="email" name="email">
                                </div>
                                <div class="inputBox">
                                    <span class="fas fa-phone"></span>
                                    <input type="number" placeholder="number" name="number">
                                </div>
                                <div class="inputBox">
                                    <span class="fas fa-comment  "></span>
                                    <input type="text" placeholder="message" name="message" role="textbox">

                                </div>
                                <input type="submit" value="Send" class="btn">


                            </div>

                            <div id="HireMe" style="display: none; color: aliceblue;">

                                <div class="inputBox">
                                    <span class="fas fa-user"></span>
                                    <input type="text" placeholder="name" name="name">
                                </div>
                                <div class="inputBox">
                                    <span class="fas fa-envelope"></span>
                                    <input type="email" placeholder="email" name="email">
                                </div>
                                <div class="inputBox">
                                    <span class="fas fa-phone"></span>
                                    <input type="number" placeholder="number" name="number">
                                </div>
                                <div class="inputBox" style="color: aliceblue;">
                                    <label for="position">
                                        <h1 style="padding-left: 2rem; padding: 20.8px; ">Position</h1>
                                    </label>
                                    <select name="position" id="position" class="" style="background-color: black;color: white; height: 50px; padding-left: 2rem; ">
                                        <option value="Barista" selected>Barista</option>
                                        <option value="Manager">Manager</option>
                                    </select>


                                </div>


                                <input type="submit" value="contact now" class="btn">
                            </div>
                        </div>



                    </form>


                    </section>

                <!-- HI: contact section ends -->
                <!-- gallery section starts  / replace BLOG-->

                <section class="gallery" id="gallery">

                    <h1 class="heading"> our <span>gallery</span> </h1>

                    <div class="accordian">
                        <ul>
                            <?php $sql = "select * from carousel limit 5"; //Limit is 5 because carousel won't work well after 5 images
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($result)) : //Start of the loop
                            ?>

                            <li>
                                <div class="image_title">
                                    <a href="#"><?php echo $row['carousel_tag'] ?></a>
                                    <!-- Here we print the tag from the database -->
                                </div>
                                <a href="#">
                                    <img src="<?php echo $row['carousel_path'] ?>" /> <!-- change image  -->
                                    <!-- Here we print the path from the database -->
                                </a>
                            </li>
                            <?php endwhile; ?>
                            <!-- End of loop -->
                        </ul>
                    </div>

                </section>

                <!-- gallery section ends /Replace BLOG-->

                <!-- HI: footer section starts  -->

                <section class="footer">

                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="https://twitter.com/Elenacafeksa" class="fab fa-twitter" target="_blank"></a>
                        <a href="https://www.instagram.com/elena_cafe.sa/?hl=en" class="fab fa-instagram" target="_blank"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                        <a href="#" class="fab fa-pinterest"></a>
                    </div>

                    <div class="links">
                        <a href="#home">home</a>
                        <a href="#about">about</a>
                        <a href="#menu">menu</a>
                        <a href="#gallary">gallary</a>
                        <a href="#review">review</a>
                        <a href="#contact">contact</a>
                    </div>

                    <div class="credit">created by <span>mr. web designer</span> | all rights reserved</div>

                </section>

                <!-- footer section ends -->
                <!-- custom js file link  -->
                <script src="js/script.js"></script>

                </body>

            </html>