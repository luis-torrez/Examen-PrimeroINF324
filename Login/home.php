<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylehome.css">
</head>
<body >
    <div class="foto">
        <img src="usuario.png">
    </div>

<?php
session_start();
$usuario = $_SESSION['username'];
if (!isset($usuario)) {
    header("location:index.php");
}else{
    echo "<h1 align='center'>Bienvenido Al Sistema Academico</h1>";
    echo "<a href='salir.php'>Salir</a><br>";
}
include "conexion.inc.php";
echo "Puede Salir o Cambiar el Color de Sesion<br/>";

$sql = "SELECT 
SUM(CASE WHEN i.codep='01' then 1 else 0 end) Chuquisaca, 
SUM(case when i.codep='02' then 1 else 0 end) LaPaz,
SUM(CASE WHEN i.codep='03' then 1 else 0 end) Cochabamba, 
SUM(CASE WHEN i.codep='04' then 1 else 0 end) Oruro, 
SUM(CASE WHEN i.codep='05' then 1 else 0 end) Potosi, 
SUM(CASE WHEN i.codep='06' then 1 else 0 end) Tarija, 
SUM(CASE WHEN i.codep='07' then 1 else 0 end) SantaCruz, 
SUM(CASE WHEN i.codep='08' then 1 else 0 end) Beni, 
SUM(CASE WHEN i.codep='09' then 1 else 0 end) Pando
FROM identificador i, (select ci
                    from notas
                    WHERE nota > 50) tmp
where tmp.ci=i.ci";
$resultado = mysqli_query($conexion, $sql);


$sqln = "SELECT nombrecom FROM identificador WHERE ci='$usuario'";
$nombre = mysqli_query($conexion, $sqln);
$filas = mysqli_fetch_row($nombre);
echo "=======";
echo "<td>".$filas[0]."</td>";echo "=======<br>";

$sqlc = "SELECT color FROM usuario WHERE ci='$usuario'";
$colores = mysqli_query($conexion, $sqlc);
$xcolor = mysqli_fetch_row($colores);

echo "=======";
echo "<td>".$xcolor[0]."</td>";echo "=======";

if($xcolor[0] == 'gray')
{
    echo '<body style="background-color:gray">';
}
if($xcolor[0] == 'blue')
{
    echo '<body style="background-color:blue">';
}
if($xcolor[0] == 'green')
{
    echo '<body style="background-color:green">';
}
if($xcolor[0] == 'yellow')
{
    echo '<body style="background-color:yellow">';
}
?>
<form class="formula" action="cambia.php" method="POST">  
<div class="box">
    <input type="text" name="ci" value="<?php echo $usuario ?>" readonly>
    <select name="color">
    <option value="gray">Gris</option>
    <option value="blue">Azul</option>
    <option value="green">Verde</option>
    <option value="yellow">Amarillo</option>
    </select>
    <input type="submit" value="Cambiar">
</div>
</form>

<h1 align='center'>Tabla De Aprobados Por Departamento</h1>
<table border="1px solid #000" >
    <tr>
        <td>Chuquisaca</td>
        <td>La Paz</td>
        <td>Cochabanba</td>
        <td>Oruro</td>
        <td>Potosi</td>
        <td>Tarija</td>
        <td>Santa Cruz</td>
        <td>Beni</td>
        <td>Pando</td>
    </tr>
<?php
while ($fila = mysqli_fetch_row($resultado))
{
    //print_r($fila);
    echo "<tr>";
    echo "<td>".$fila[0]."</td>";
    echo "<td>".$fila[1]."</td>";
    echo "<td>".$fila[2]."</td>";
    echo "<td>".$fila[3]."</td>";
    echo "<td>".$fila[4]."</td>";
    echo "<td>".$fila[5]."</td>";
    echo "<td>".$fila[6]."</td>";
    echo "<td>".$fila[7]."</td>";
    echo "<td>".$fila[8]."</td>";
    echo "<tr>";
}
?>
</table>
</body>
<html>