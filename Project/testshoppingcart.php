<?php
include("connection.php");
function totalAfterDisc()
{
    $sum = 0;
    $sqlOuter = "SELECT * FROM menu";
    $result = $GLOBALS['conn']->query($sqlOuter) or die(mysqli_error($GLOBALS['conn']));
    while ($record = mysqli_fetch_array($result)) {
        #just getting the menu items ids, NOTE: all items from the menu form in "index.php" 
        # have name/id propertries set to the menu_id, so bellow we will use $_POST[$temp] 
        # to get how many items the user bought in "index.php" 
        $temp = $record['menu_id'];
        # getting the discounted price from data base
        $sql_disc_price = "SELECT * FROM menu WHERE menu_id = $temp";
        $result_price_disc = $GLOBALS['conn']->query($sql_disc_price) or die(mysqli_error($GLOBALS['conn']));
        $record = mysqli_fetch_array($result_price_disc);
        #here the discounted price is stored. 
        $price_disc = $record['disc_price'];
        #now we get the number of items the user selected from the FORM in "index.php"
        $itemNum = $_POST[$temp];
        # now we do: discount_price_of_item * the_number_of_items_the_user_selected, 
        # and we add the result to the sum
        $sum += $itemNum *  $price_disc;
    }
    return $sum;
}
