<?php
$name = "dev1.droom.in";
$user_name = "root";
$password = "profsnapeisdon";

$db_name = "dms_3";

$conn = mysqli_connect($name, $user_name, $password, $db_name);

if(!$conn) {
    echo "Connection Failed!";
}
?>