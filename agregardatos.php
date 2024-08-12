<?php


include "conexion.php" ;
$conexion=conexion();
$datos=array(
 $conexion->real_escape_string(htmlentities($_POST['nombre'])),
 $conexion->real_escape_string(htmlentities($_POST['2_nombre'])),
 $conexion->real_escape_string(htmlentities($_POST['ape_1'])),
 $conexion->real_escape_string(htmlentities($_POST['ape_2'])),
 $conexion->real_escape_string(htmlentities($_POST['cedula'])),
 $conexion->real_escape_string(htmlentities($_POST['genero'])),
 $conexion->real_escape_string(htmlentities($_POST['direccion'])),
 $conexion->real_escape_string(htmlentities($_POST['telefono'])),


);

$sql="INSERT INTO pacientes (primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,cedula,genero,direccion,telefono) values (?,?,?,?,?,?,?,?)";
$query=$conexion->prepare($sql);
$query->bind_param('ssssssss',$datos[0],
                          $datos[1],
                          $datos[2],
                          $datos[3],
                          $datos[4],
                          $datos[5],
                          $datos[6],
                          $datos[7]);

 echo $query->execute();
 
 echo "ingreso correctamente";

 $query->close();




?>