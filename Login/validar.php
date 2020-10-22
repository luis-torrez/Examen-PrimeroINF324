<?php 
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];
	session_start();
	$_SESSION['usuario'] = $usuario;

	require 'conexion.inc.php';

	$consulta = "select*from usuario where ci='$usuario' and clave='$contraseña'";
	$resultado = mysqli_query($conexion, $consulta);
	
	$filas = mysqli_num_rows($resultado);

	if ($filas) {
		$_SESSION['username'] = $usuario;
		header("location:home.php");
	}else{
		?>
		<?php 
		include("index.php");
		?>
		<h1 class="bad">CONTRASEÑA O USUARIO ERRONEO</h1>
		<?php  
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);
