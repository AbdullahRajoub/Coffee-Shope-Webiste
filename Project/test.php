<?php
function getExtension($menuPath){
    # an array of supported image extensions 
    $arrType = array("png", "jpeg", "svg", "webp", "jpg");
    #checks if the name of the file contains ., 
    # also returns the position of "." 
    if(!is_null(($pos=strpos($menuPath,".")))){
        # gets the extension--> thing after the "."
        $type =  substr($menuPath, $pos+1); 
        $arrlength = count($arrType);
        $isValid = false; 
        #looping throw extensions array,
        # and checking if the type extracted matchs one of the extensions in extensions array
        for($x = 0; $x < $arrlength; $x++) {
            if(strtolower($arrType[$x]) === $type) 
                return strtolower($arrType[$x]); 
        }
        return ""; 
    }
    #no extension added ??? 
    return ""; 
}
echo getExtension("LemondCake.jpg");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <img src= "showimage.php?menu_name='Lemond Cake'" alt="">
</body>
</html>