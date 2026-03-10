<?php

$conn = new mysqli("localhost","root","","ruleta");

if($conn->connect_error){
die("Error DB");
}

session_start();

?>