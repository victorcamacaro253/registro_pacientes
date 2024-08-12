


<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">


<?php

include("conexion.php");
$conexion=conexion();

$sql="SELECT * from pacientes";
$result=$conexion->query($sql);

$tabla="";

while ($datos=$result->fetch_assoc()) {
	$tabla=$tabla.'<tr>

                   <td>'.$datos['id_paciente'].'</td>
                   <td>'.$datos['primer_nombre'].'</td>
                   <td>'.$datos['primer_apellido'].'</td>
                   <td>'.$datos['cedula'].'</td>
                   <td>'.$datos['genero'].'</td>
                   <td>'.$datos['telefono'].'</td>
                   <td>'.$datos['direccion'].'</td>
                   <td>
                <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalactualizar" onclick="agregadatosparaedicion('.$datos['id_paciente'].')">
                <i class="fa fa-edit"></i>
                </span>
                    </td>
                    <td> 
                    <span class="btn btn-info btn-sm" >
                     <i class="fa solid fa-eye"></i>
                     </span>
                    </td>
                   <td> 
                   <span class="btn btn-danger btn-sm" onclick="eliminardatos('.$datos['id_paciente'].')">
                    <i class="fa fa-trash"></i>
                    </span>
                   </td>
                   </tr>';
}

//$conexion->close();

echo '<div class="table-responsive"><table class="display class="table table-hover table-bordered" id="tabla">
         <thead>
         <th>id</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Cedula</th>
         <th>Genero<t>
         <th>telefono</th>
         <th>Direccion</th>
         <th>editar</th>
         <th>detalles</th>
         <th>eliminar</th>

         </thead>

         <tbody>'.$tabla.' </tbody>

         </table></div>';

         echo '<a href="generar_pdf_pacientes.php" class="btn btn-primary">Generar lista de pacientes PDF</a>';


?>

<script type="text/javascript">
    
    var tabla= document.querySelector('#tabla');

    var dataTable=new DataTable(tabla,{

        perPage:6,
        perPageSelect:[3,6,9,12],
        labels: {
            placeholder: "Buscar...",
            perPage: "{select} Resultados por página",
            noRows: "No se encontraron registros",
            info: "Mostrando {start} a {end} de {rows} registros",
            noResults: "No se encontraron resultados",
            previous: "Anterior",
            next: "Siguiente"
        }
    });



</script>