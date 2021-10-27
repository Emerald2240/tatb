<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";

echo '<pre>';
print_r($_POST);
print_r($_FILES);

getPrevId(10);
?>