<?php
include "config.php";

if(!isset($_SESSION['user'])){
?>

<form action="login.php" method="post">
<input name="user" placeholder="usuario">
<input name="pass" type="password">
<button>Entrar</button>
</form>

<?php
exit;
}
?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Ruleta Online</h1>

<h2>Usuario: <?php echo $_SESSION['user']; ?></h2>

<h2>Saldo: $<span id="saldo"><?php echo $_SESSION['saldo']; ?></span></h2>

<canvas id="wheel" width="500" height="500"></canvas>

<div class="panel">

<input id="cantidad" type="number" placeholder="Cantidad">

<select id="tipo">
<option value="numero">Número</option>
<option value="rojo">Rojo</option>
<option value="negro">Negro</option>
<option value="par">Par</option>
<option value="impar">Impar</option>
</select>

<input id="numero" placeholder="Número 0-36">

<button onclick="spin()">Girar</button>

</div>

<h2 id="resultado"></h2>

<h3>Historial</h3>

<div id="historial"></div>

<script src="ruleta.js"></script>

</body>
</html>