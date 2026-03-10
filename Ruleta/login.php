<?php
include "config.php";

$user=$_POST['user'];
$pass=md5($_POST['pass']);

$q=$conn->query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass'");

if($q->num_rows>0){

$u=$q->fetch_assoc();

$_SESSION['user']=$u['usuario'];
$_SESSION['saldo']=$u['saldo'];

header("Location:index.php");

}else{

echo "Login incorrecto";

}
?>