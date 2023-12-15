<?php

//print_r($_POST);

//echo $_POST["name"];
//$myPostArgs = filter_input_array(INPUT_POST);
$myPostArgs = $_POST;
//print_r($myPostArgs);

foreach($myPostArgs as $arrValue) {

 echo "$arrValue <br>";
}

foreach($myPostArgs as $x => $x_value) {
    echo "Key=" . $x . ", Value" . $x_value;
    echo "<br>";
}