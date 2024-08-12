<?php

include "conexion.php" ;
$conexion=conexion();
$datos=array(
    $conexion->real_escape_string(htmlentities($_POST['nombreu'])),
    $conexion->real_escape_string(htmlentities($_POST['2_nombreu'])),
    $conexion->real_escape_string(htmlentities($_POST['ape_1u'])),
    $conexion->real_escape_string(htmlentities($_POST['ape_2u'])),
    $conexion->real_escape_string(htmlentities($_POST['cedulau'])),
    $conexion->real_escape_string(htmlentities($_POST['generou'])),
    $conexion->real_escape_string(htmlentities($_POST['direccionu'])),
    $conexion->real_escape_string(htmlentities($_POST['telefonou'])),
    $conexion->real_escape_string(htmlentities($_POST['idu']))

);

$sql="UPDATE pacientes set primer_nombre=?,segundo_nombre=?,primer_apellido=?,segundo_apellido=?,cedula=?,genero=?,direccion=?,telefono=? where id_paciente=?";

$query=$conexion->prepare($sql);
$query->bind_param('ssssssssi',$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]);
echo $query->execute();
$query->close();












?>