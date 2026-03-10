<?php
include "config.php";

$tipo=$_POST['tipo'];
$numeroApuesta=$_POST['numero'];
$cantidad=intval($_POST['cantidad']);

$numero=rand(0,36);

$color="green";

if($numero!=0){

if($numero%2==0){
$color="black";
}else{
$color="red";
}

}

$ganancia=0;

if($tipo=="numero" && $numero==$numeroApuesta){
$ganancia=$cantidad*36;
}

if($tipo=="rojo" && $color=="red"){
$ganancia=$cantidad*2;
}

if($tipo=="negro" && $color=="black"){
$ganancia=$cantidad*2;
}

if($tipo=="par" && $numero%2==0){
$ganancia=$cantidad*2;
}

if($tipo=="impar" && $numero%2==1){
$ganancia=$cantidad*2;
}

$_SESSION['saldo']=$_SESSION['saldo']+$ganancia-$cantidad;

$user=$_SESSION['user'];

$conn->query("UPDATE usuarios SET saldo=".$_SESSION['saldo']." WHERE usuario='$user'");

$conn->query("INSERT INTO historial(numero,color) VALUES($numero,'$color')");

echo json_encode([
"numero"=>$numero,
"color"=>$color,
"ganancia"=>$ganancia,
"saldo"=>$_SESSION['saldo']
]);