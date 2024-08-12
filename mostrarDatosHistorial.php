


<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">


<?php

include("conexion.php");
$conexion=conexion();

$sql="SELECT * from historial_pacientes inner join pacientes on historial_pacientes.id_paciente = pacientes.id_paciente";
$result=$conexion->query($sql);

$tabla="";

while ($datos=$result->fetch_assoc()) {
	$tabla=$tabla.'<tr>

                   <td>'.$datos['id_historial'].'</td>
                   <td>'.$datos['id_paciente'].'</td>
                   <td>'.$datos['primer_nombre'].'</td>
                   <td>'.$datos['primer_apellido'].'</td>
                   <td>'.$datos['cedula'].'</td>
                   <td>'.$datos['genero'].'</td>
                   <td>'.$datos['telefono'].'</td>
                   <td>'.$datos['fecha_consulta'].'</td>
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
         <th>id paciente</th>
         <th>Nombre</th>
         <th>Apellido</th>
         <th>Cedula</th>
         <th>Genero<t>
         <th>telefono</th>
         <th>fecha</th>
         <th>editar</th>
         <th>detalles</th>
         <th>eliminar</th>

         </thead>

         <tbody>'.$tabla.' </tbody>

         </table></div>';


         echo '<button id="btn-generate-pdf" class="btn btn-primary">Generar PDF Filtrado</button>
         <button id="btn-generate-pdf-all" class="btn btn-primary">Generar PDF Todo</button>';

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

    document.getElementById('btn-generate-pdf').addEventListener('click', function() {
    // Obtén los datos filtrados de Vanilla DataTables
    var table = document.querySelector('#tabla');
    var rows = table.querySelectorAll('tbody tr');
    var filteredData = [];

    rows.forEach(function(row) {
        var rowData = [];
        row.querySelectorAll('td').forEach(function(cell) {
            rowData.push(cell.textContent);
        });
        filteredData.push(rowData);
    });

    // Envía los datos filtrados al servidor
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'generar_pdf.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            // Descargar el PDF
            window.location.href = response.url;
        }
    };
    xhr.send(JSON.stringify({ data: filteredData ,  type: 'filtered'}));
});

// Generar PDF con todos los datos
document.getElementById('btn-generate-pdf-all').addEventListener('click', function() {
    // Envía una solicitud al servidor para obtener todos los datos
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'generar_pdf.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            // Descargar el PDF
            window.location.href = response.url;
        }
    };
    xhr.send(JSON.stringify({ type: 'all' }));
});


</script>