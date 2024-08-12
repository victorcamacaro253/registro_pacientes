<?php
require('fpdf/fpdf.php');
include("conexion.php");

class PDF extends FPDF
{
    // Encabezado de la página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        // Título
        $this->Cell(0, 10, 'Lista de Pacientes', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);

        // Encabezados de la tabla
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 15, 'ID', 1, 0, 'C');
        $this->Cell(30, 15, 'Nombre', 1, 0, 'C');
        $this->Cell(30, 15, 'Apellido', 1, 0, 'C');
        $this->Cell(30, 15, 'Cedula', 1, 0, 'C');
        $this->Cell(20, 15, 'Genero', 1, 0, 'C');
        $this->Cell(80, 15, 'Direccion', 1, 0, 'C'); // Incrementé el ancho de la celda para "Direccion"
        $this->Cell(30, 15, 'Telefono', 1, 1, 'C');
        $this->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Creación del objeto de PDF
$pdf = new PDF('L', 'mm', 'A4'); // 'L' indica Landscape (Horizontal)
$pdf->AddPage();

// Conexión y consulta
$conexion = conexion();
$sql = "SELECT * FROM pacientes";
$result = $conexion->query($sql);

// Verificar si se obtuvo resultado
if ($result->num_rows > 0) {
    // Fuente para el contenido de la tabla
    $pdf->SetFont('Arial', '', 10);

    // Llenado de la tabla con los datos
    while ($datos = $result->fetch_assoc()) {
        $pdf->Cell(15, 20, $datos['id_paciente'], 1, 0, 'C');
        $pdf->Cell(30, 20, $datos['primer_nombre'], 1, 0, 'C');
        $pdf->Cell(30, 20, $datos['primer_apellido'], 1, 0, 'C');
        $pdf->Cell(30, 20, $datos['cedula'], 1, 0, 'C');
        $pdf->Cell(20, 20, $datos['genero'], 1, 0, 'C');
        
        // Usar MultiCell para la dirección y mantener la posición para las celdas siguientes
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->MultiCell(80, 20, $datos['direccion'], 1, 'C');
        
        // Asegurar que la celda de Teléfono quede en la misma línea
        $pdf->SetXY($x + 80, $y);
        $pdf->Cell(30, 20, $datos['telefono'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros.', 1, 1, 'C');
}

// Salida del PDF
$pdf->Output();
?>
