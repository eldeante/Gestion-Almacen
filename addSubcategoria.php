<?php

include 'conexion.php';

$identificador_subcategoria=$_POST['identificador_subcategoria'];
$categoria_subcategoria=$_POST['categoria_subcategoria'];
$nombre_subcategoria=$_POST['nombre_subcategoria'];

try
{
	$sql = "INSERT INTO subcategoria (id_sub, id_cat, nombre) VALUES ('$identificador_subcategoria', '$categoria_subcategoria', '$nombre_subcategoria')";
	$result = mysqli_query($conexionCentral,$sql);
}

catch(Exception $e)
{
	//Generamos un log
	$hoy = date("Y-m-d H:i");
	$file = fopen("logs/logs.txt","a");
	fwrite($file, "**********************************************************************************************************************"."\r\n");						  	fwrite($file, "Log generado el : " .$hoy."\r\n");  
	fwrite($file, "Se ha realizado con éxito la consulta: " .$sql."\r\n");
	fwrite($file, "Mensaje de error: " .$e->getMessage()."\r\n");			  
	fwrite($file, "**********************************************************************************************************************"."\r\n");						
	fclose($file);
}

//header("Location: index.php");

mysqli_close($conexionCentral);
?>