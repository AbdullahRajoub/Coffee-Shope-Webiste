<?php
include('connection.php');
session_start();

if (isset($_POST['submit'])) {
    $luname = $_POST['luname'];
    $lpwd = md5($_POST['lpwd']);
    $sql = "select * from account where account_username='$luname' and account_password='$lpwd'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['account_username'] != "") {
        $_SESSION['name']=$luname;
        ?>
        <?php

$luname = $_POST['luname'];
$lpwd = $_POST['lpwd'];


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
    <link rel="stylesheet" href="css/login-style.css">
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

          <h2 class="text-black-50"  style="margin-top: 200px;"> <?php echo "Welcome "."<p style='color:yellow'>".$GLOBALS['luname']."</p> to Elena cafe"?> </h2>


      </div>
    </form>
</body>
</html>  
        <?php


    
    } else {
        $_SESSION['failed'] = 'true';
        header('location:Login.php');
    }
} else {





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

    <body>



        <form action="" class="form" method="POST">
            <span></span>
            <span></span>
            <span></span>
            <span></span>

            <div class="form-inner">

                <h2>LOGIN</h2>
                <div class=" row">
                    <div class="col-sm-1  ">
                        <i class="fa fa-user pt-4 mr-5 pl-1" style="font-size: 40px; color: black;" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 ml-2 ">
                        <input type="text" class="input-elene" id="luname" name="luname" placeholder="User name">
                    </div>
                </div>
                <div class=" row">
                    <div class="col-sm-1 ">
                        <i class="fa fa-lock pt-4 pl-1" style="font-size: 40px; color: black;" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-10 ml-2">
                        <input type="password" class="input-elene" id="lpwd" name="lpwd" placeholder="password">
                    </div>
                </div>
                <div class="row">

                <div class="col-sm-1"></div>
                <input class="our-btn col-sm-11" type="submit" name="submit" value="Login" style="width: 250px; ;">
                </div>
                
                <!-- 
            <div class=" text-center Just-A-Link ">
               <a  class="text-decoration-none  " href="">Forgot Password?</a> 
            </div> -->

                <div class=" text-center Just-A-Link  ">
                    <a class="text-decoration-none  " href="Register.php">Sign up now</a>
                </div>
                <?php if ($_SESSION['failed'] == "true") {
                ?>
                    <div class=" text-center Just-A-Link  ">
                        <a class="text-decoration-none " style="color:red">Wrong Username / Password </a>
                    </div>
                <?php
                    $_SESSION['failed'] = "false";
                }
                ?>
            </div>
        </form>




    </body>

    </html>
<?php
}
?>