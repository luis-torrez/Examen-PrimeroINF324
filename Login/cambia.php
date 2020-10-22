<?php 
	$color = $_POST['color'];
	$ci = $_POST['ci'];

	require 'conexion.inc.php';
	
	$actualizar = "update usuario set color='$color' where ci='$ci'";
	$resultado = mysqli_query($conexion,$actualizar);
	if ($resultado) {
		include("home.php");
	}else
	{
		echo "=====";
	}
