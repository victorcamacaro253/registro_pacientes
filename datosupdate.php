<?php

include("conexion.php");

$conexion=conexion();
$id=$conexion->real_escape_string(htmlentities($_POST['id']));

$sql="SELECT * from pacientes where id_paciente=?";

$query=$conexion->prepare($sql);
$query->bind_param('i',$id);
$query->execute();
$datos=$query->get_result()->fetch_assoc();

echo json_encode($datos);










?>