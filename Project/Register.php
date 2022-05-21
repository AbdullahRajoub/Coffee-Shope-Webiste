<?php


include('connection.php');
session_start();

if ((!isset($_POST['submit'])) ) {
?>

    <!DOCTYPE html5>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Register page </title>
        <!--  Elena Favicon  -->
        <link rel="icon" type="image/x-icon" href="ELENA Cafe.jpg">
        <!-- CSS FILE -->
        <link rel="stylesheet" href="Register-style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <style>


    </style>


    <body>
        <form action="Register.php" class="form " method="POST">
            <span></span>
            <span></span>
            <span></span>
            <span></span>

            <div class="form-inner ">
                <h2 class="text-black-50">REGISTER</h2>


                <div class=" row">
                    <div class="col-sm-1 ">
                        <i class="fa fa-envelope-open pt-4 mr-5 pl-1" style="font-size: 30px; color: black;" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 ml-2">
                        <input type="email" class="input form-control" id="remail" name="remail" placeholder="Enter your email" minlength="5">
                    </div>
                </div>





                <div class=" row">
                    <div class="col-sm-1  ">
                        <i class="fa fa-user pt-4 mr-5 pl-1" style="font-size: 40px; color: black;" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 ml-2 ">
                        <input type="text" class="input form-control" id="runame" name="runame" placeholder="Enter your username" minlength="5">
                    </div>
                </div>


                <div class=" row">
                    <div class="col-sm-1 ">
                        <i class="fa fa-lock pt-4 pl-1" style="font-size: 40px; color: black;" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 ml-2">
                        <input type="password" class="input" id="rpwd" name="rpwd" placeholder="Enter your password">
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-1"></div>
                    <input class="our-btn col-sm-11" type="submit" name="submit" value="Register" style="width: 250px; ;">
                </div>

                <div class="Just-A-Link text-center">

                    <!-- there is a style to set width as fit-content so the check button doesn't take a width 100% -->

                    <?php if ( isset($_SESSION['invalid']) and $_SESSION['invalid'] == "true") {
                    ?>
                        <div class=" text-center Just-A-Link  ">
                            <a class="text-decoration-none " style="color:red">An account already exists! </a>
                        </div>
                    <?php
                        $_SESSION['invalid'] = "false";
                    }
                    ?>
                    <input class=" d-inline-block " style="width: fit-content;" type="checkbox" id="terms_and_conditions" name="terms_and_conditions" required>
                    <label for="terms_and_conditions">I read and agreed to</label> <a class="text-decoration-none" href="terms_and_conditions.html">Terms & Conditions</a>
                </div>


                <div class=" text-center Just-A-Link ">
                    <a class="text-decoration-none" href="login.php">Have an account?</a>
                </div>

            </div>
        </form>
    </body>

    </html>
    <?php } else {
    $remail = $_POST['remail'];
    $runame = $_POST['runame'];
    if ($remail=='' or $runame=='' ) {
        $_SESSION['invalid'] = "true";
        header('location:Register.php');
    }
    else{
    $rpwd = md5($_POST['rpwd']);
    $sql = "insert into account values('$remail','$runame','$rpwd','xxxx',0)";
    $check = "select * from account where account_username='$runame' or account_email='$remail'";
    $checked = mysqli_query($conn, $check);
    $row = mysqli_fetch_array($checked);
    if (!is_null($row) ) {
        $_SESSION['invalid'] = "true";
        header('location:Register.php');
    }

    $result = mysqli_query($conn, $sql);
    $_SESSION['newUser'] = "$runame";
    if (!$result) {
        $_SESSION['invalid'] = 'true';
        header('location:Register.php');
    } else {
    ?>
        <?php


        $remail = $_POST['remail'];
        $runame = $_POST['runame'];
        $rpwd = $_POST['rpwd']; 
        ?>

        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title> Register page </title>
            <!--  Elena Favicon  -->
            <link rel="icon" type="image/x-icon" href="ELENA Cafe.jpg">
            <!-- CSS FILE -->
            <link rel="stylesheet" href="Register-style.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head>

        <style>


        </style>


        <body>
            <form action="" class="form" method="">
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <div class="form-inner ">

                    <h2 class="text-black-50" style="margin-top: 200px;"> <?php echo "Thank you " ?> <p style="color:  yellow ;"> <?php echo $_SESSION['newUser'] ?> </p><?php echo " for registering in ELENA Café" ?> </h2>


                </div>
            </form>
        </body>

        </html>



<?php


    }
}}

?>