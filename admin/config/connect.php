<?php

$db = new mysqli("localhost","root","","tatb");

if($db->connect_error){
die("Error Occured".$db->connect_error);
}else{
    //echo "Connection Established";
}




// $db = new mysqli("localhost","techctwn_TA","Emerald2240","techctwn_tatb");

// if($db->connect_error){
// die("Error Occured".$db->connect_error);
// }else{
//     //echo "Connection Established";
// }


?>