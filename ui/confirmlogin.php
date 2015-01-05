<?php

ob_start();

/* database */

$host = "localhost";
$user = "admin";
$pass = "administrator";
$data = "login";
$tabl = "users";

/* connect */

mysql_connect("$host", "$user", "$pass") or die ("CONNECTION FAILED");
mysql_select_db("$data") or die ("DATABASE UNAVAILABLE");

/* post credentials */ 

$username = $_POST['username'];
$password = $_POST['password'];

/* confirm */

$sql = "SELECT * FROM $tabl
WHERE username = '$username'
AND password = '$password'";

/* send */

$result = mysql_query($sql);

/* check */

$row = mysql_num_rows($result);

/* if good, register */

if ($row == 1) {

   session_register("username");
   session_register("password");

   # go ahead to home cam # 

   header("location:homecam.php");

}

else {

   echo "LOGIN UNSUCCESSFUL :(";

}

ob_flush();

?>
