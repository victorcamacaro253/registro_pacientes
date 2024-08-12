<?php
require('fpdf/fpdf.php');
include("conexion.php");

// Obtener el tipo de PDF solicitado
$input = json_decode(file_get_contents('php://input'), true);
$type = $input['type'];

// Crear el objeto PDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

if ($type === 'filtered') {
    // Datos filtrados
    $data = $input['data'];

    // Encabezado
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Reporte de Pacientes Filtrado', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Paciente ID', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Apellido', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Cedula', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Genero', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Telefono', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Fecha', 1, 1, 'C');

    foreach ($data as $row) {
        $pdf->Cell(20, 10, $row[0], 1, 0, 'C'); // ID
        $pdf->Cell(30, 10, $row[1], 1, 0, 'C'); // Paciente ID
        $pdf->Cell(35, 10, $row[2], 1, 0, 'C'); // Nombre
        $pdf->Cell(35, 10, $row[3], 1, 0, 'C'); // Apellido
        $pdf->Cell(30, 10, $row[4], 1, 0, 'C'); // Cedula
        $pdf->Cell(20, 10, $row[5], 1, 0, 'C'); // Genero
        $pdf->Cell(35, 10, $row[6], 1, 0, 'C'); // Telefono
        $pdf->Cell(40, 10, $row[7], 1, 1, 'C'); // Fecha
    }
} elseif ($type === 'all') {
    // Obtener todos los datos
    $conexion = conexion();
    $sql = "SELECT * FROM historial_pacientes INNER JOIN pacientes ON historial_pacientes.id_paciente = pacientes.id_paciente";
    $result = $conexion->query($sql);

    // Encabezado
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Reporte Completo de Pacientes', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Paciente ID', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Apellido', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Cedula', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Genero', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Telefono', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Fecha', 1, 1, 'C');

    while ($datos = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $datos['id_historial'], 1, 0, 'C');
        $pdf->Cell(30, 10, $datos['id_paciente'], 1, 0, 'C');
        $pdf->Cell(35, 10, $datos['primer_nombre'], 1, 0, 'C');
        $pdf->Cell(35, 10, $datos['primer_apellido'], 1, 0, 'C');
        $pdf->Cell(30, 10, $datos['cedula'], 1, 0, 'C');
        $pdf->Cell(20, 10, $datos['genero'], 1, 0, 'C');
        $pdf->Cell(35, 10, $datos['telefono'], 1, 0, 'C');
        $pdf->Cell(40, 10, $datos['fecha_consulta'], 1, 1, 'C');
    }
}

// Guardar el archivo PDF en el servidor
$file = $type === 'filtered' ? 'reporte_pacientes_filtrado.pdf' : 'reporte_pacientes_todo.pdf';
$pdf->Output('F', $file);

// Devolver la URL del PDF para la descarga
echo json_encode(['url' => $file]);
?>
