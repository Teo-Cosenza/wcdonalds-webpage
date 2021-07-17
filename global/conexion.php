<?php
$mysqli_connection = new MySQLi($host, $user, $pass, $base);
if ($mysqli_connection->connect_error) {
   //echo "<script>alert('error')</script>" . $mysqli_connection->connect_error;
}
else {
   //echo "<script>alert('conectado')</script>";
}
mysqli_set_charset($mysqli_connection,"utf8");
?> 