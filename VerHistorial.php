<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="sweetalert.min.js"></script>
	<link rel="stylesheet" href="css/sweetalert.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
	<script type="text/javascript" src="vanilla-dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="vanilla-dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script type="text/javascript" src="funciones2.js"></script>
	<link rel="shortcut icon" href="imagenes/consultorio.png" type="image/x-icon">

    <style type="text/css">
		.container{
			margin-top: 6em;
			
		}
	</style>
    <title>Ver historial de consultas</title>
</head>
<body>
<?php include_once ("header.php"); ?>

<div class="container">
		<div class="row">
			<div class="col-sm-12  col-sm-8 col-sm-4">

				<div class="card bg-light mb-3">
					<div class="card-header">
						<li class="fa fa-lock"></li>
						<strong>Ver historial de pacientes</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<section class="text-right">
									<span class="btn btn-primary btn-sm" onclick="imprimirTabla()"  data-toggle="modal" data-target="#modalinsertar">
									<i class="fa fa-print"></i> Imprimir
								</span>
								</section>
								<div id="tablaDatosHistorial"></div>
						</div>
					</div>
				</div>
					<div class="card-footer text-muted text-right" style="text-align: right;">
						Victor camacaro
					</div>
				</div>


			</div>
		</div>
	</div>


    
<script type="text/javascript">
  	$(document).ready(function(){

  		mostrarDatosHistorial();
  	})

      function imprimirTabla() {
        var printContents = document.querySelector('.table-responsive').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

  </script>

</body>
</html>