<?php  

require('conexion.php');

$con = conectar();

$sql = 'DELETE FROM `personas`';
$con->query($sql);

$sql = file_get_contents("../sql/personas.sql");
$con->query($sql);

$sql = file_get_contents("../sql/empleados.sql");
$con->query($sql);

$sql = file_get_contents("../sql/obreros.sql");
$con->query($sql);

$sql = file_get_contents("../sql/docentes.sql");
$con->query($sql);

$sql = file_get_contents("../sql/administrativos.sql");
$con->query($sql);

$sql = file_get_contents("../sql/contactos.sql");
$con->query($sql);

$sql = file_get_contents("../sql/telefonos.sql");
$con->query($sql);

$sql = file_get_contents("../sql/direcciones.sql");
$con->query($sql);

$sql = file_get_contents("../sql/estudios.sql");
$con->query($sql);

$sql = file_get_contents("../sql/carga-horaria.sql");
$con->query($sql);

$sql = file_get_contents("../sql/informes.sql");
$con->query($sql);

header('Location: ../lobby/index.php?BD_RESTAURADA');


?>