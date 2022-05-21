<?php
include('connection.php');





// $sql="select * from carousel where carousel_id=1";
// Get  the carousel by ID
$sql="select * from menu";
// get all records with a limit of 3, so it won't get more than 3 images
$result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result))
   {
        echo $row['menu_name']."<br>";
        echo $row['menu_path']."<br>";
        echo $row['menu_price']."<br>";
        echo $row['menu_oldPrice']."<br>";
   }
   ?>


