<?php
include_once('connection.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title lang="es">ELENA Café</title>
        <link rel="icon" type="image/x-icon" href="ELENA Cafe.jpg">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

        <style>
            a{
                text-decoration: none;
            }
            .sections{
                font-size: 5vw;
                color: whitesmoke;
            }
            .links {
                
                transition-duration: 0.4s;
                transition-timing-function: ease-in;
                color: whitesmoke;
            }
            



        </style>   

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
                <a href="index.php" id="Login-btn" class="Login-btn" onclick="<?php session_destroy();?>">Logout</a>
                <a href="index.php" id="Register-btn" class="Register-btn">preview</a>
                <!-- End of : (login / register section) -->
            </div>



            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--Editing Menu Sectiuon --------------------------------->
        <section class="about" id="about">

            <h1 class="heading"> modify <span>Menu</span>  </h1>

            <div class="row">
                <div class=" sections mx-auto" style="margin: 100px;">
                    <p></p>
                    <a href="editeMenu.php" class="btn links " style="margin-left:5%; margin-right:5%; width: 20%; ">Edite Prices/Pictures</a>
                    <a href="addMenu.php" class="btn links " style="margin-left:5%; margin-right:5%; width: 20%;">Add Menu Items</a>
                    <a href="deleteMenu.php" class="btn links " style="margin-left:5%; margin-right:5%; width: 20%;">Delete Menu Items</a>

                </div>

            </div>

        </section>
        <!--Editing Menu Sectiuon --------------------------------->
        <section class="about" id="about">

            <h1 class="heading"> modify <span>Coursel</span> </h1>

            <div class="row">
                <div class=" sections mx-auto" style="margin: 100px;">
                    <p></p>
                    <a href="#" class="btn links " style="margin-left:5%; margin-right:5%; width: 20%;">Edit Pictures</a>
                    <a href="#" class="btn links" style="margin-left:5%; margin-right:5%; width: 20%;">Add More pictures</a>
                    <a href="#" class="btn links" style="margin-left:5%; margin-right:5%; width: 20%;">Delete Pictures</a>

                </div>

            </div>

        </section>
        <!--Editing Menu Sectiuon --------------------------------->
        <section class="about" id="about">

            <h1 class="heading"> modify <span>Reviews</span> </h1>

            <div class="row">
                <div class=" sections mx-auto" style="margin: 100px;">
                    <p></p>
                    <a href="#" class="btn links" style="margin-left:5%; margin-right:5%; width: 20%;">Edit Reviews</a>
                    <a href="#" class="btn links" style="margin-left:5%; margin-right:5%; width: 20%;">Add Reviews</a>
                    <a href="#" class="btn links" style="margin-left:5%; margin-right:5%; width: 20%;">Delete Reviews</a>

                </div>

            </div>

        </section>



    </body>

</html>