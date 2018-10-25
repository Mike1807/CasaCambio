<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Miguel de Jesus Zavala Santiago">

    <!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
	crossorigin="anonymous">

    <title>Clientes registrados</title>

</head>

<body>

<?php

	require_once "mpdf/mpdf.php";
	require_once "php/conectari.php";
		
	$mysqli = conectar();

	// SI PULSAMOS GENERAR PDF
	if (isset($_POST["generar"])) {
        $cabecera = "<span><b>Datos de cliente</b></span>";
		$pie = "<span align='center'>
		
		<img aligne='middle' src='C:/xampp/htdocs/CasaCambio/img/OEA-Transparente.png' width='100px' height='50px'/>.......
		<i>Casa de Cambio... version alpha 1.0</i>
		 - <i>Creado ".date("d/m/Y")."</i>.......
		 
		</span>";
        $mpdf=new mPDF();
        $mpdf->SetHTMLHeader($cabecera);
        $mpdf->SetHTMLFooter($pie);

        $sql = "SELECT * FROM  clientes";                       
        $resultado = $mysqli -> query($sql);

        $mpdf->WriteHTML('<table stylle="overflow: auto" class="table-hover table-responsive table-striped">
            <tr>
			<th>FECHA DE REGISTRO</th>
			<th>ID</th>
			<th>NOMBRE</th>
            <th>PAIS</th>
            <th>EMAIL</th>
            <th>PASAPORTE EXTRANJERO</th>
            <th>PASAPORTE MEXICANO</th>
            </tr>',2);
        while ($fila = $resultado -> fetch_array()){
			
            $mpdf->WriteHTML('
            	<tr>
                    <td>' .$fila['fecha'] .'</td>
                    <td>' .$fila['id'] .'</td>
                    <td>' .$fila['nombre_completo'] .'</td>
					<td>' .$fila['pais'] .'</td>
					<td>' .$fila['email'] .'</td>
					<td>' .$fila['extranjero'] .'</td>
					<td>' .$fila['mexicano'] .'</td>
                </tr>
                ', 2);
        }
        $mpdf->WriteHTML('</table>',2);             
        $mpdf->Output('archivo.pdf','I');
        exit;
    } // CIERRE DE IF GENERAR
?>


<!-- FORMULARIO -->

<div class="form-group">
	<fieldset>

	<?php 
		// LANZAMOS LA CONSULTA DE TODOS LOS DATOS DE LA TABLA MANUALES
		// PARA MOSTRARLOS EN EL FORMULARIO
		
		$sql = "SELECT * FROM  clientes";						
		$resultado = $mysqli -> query($sql);						
	?>
		<legend><span>Datos de clientes registrados</span></legend> 

		<form class="form" method="POST" enctype="multipart/form-data" 
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<table class="table-hover table-responsive table-striped">
				
				<tr>
			<th>FECHA DE REGISTRO</th>
			<th>ID</th>
			<th>NOMBRE</th>
            <th>PAIS</th>
            <th>EMAIL</th>
            <th>PASAPORTE EXTRANJERO</th>
            <th>PASAPORTE MEXICANO</th>
				</tr>
		<?php
			while ($fila = $resultado -> fetch_array()){
				echo '
				<tr>
					<td><input type="text" name="fecha" class="form-control" value="' .$fila['fecha'] .'" readonly></td>
					<td><input type="text" name="id" class="form-control" value="' .$fila['id'] .'"></td>
					<td><input type="text" name="nombre_completo" class="form-control" value="' .$fila['nombre_completo'] .'"></td>
					<td><input type="text" name="pais" class="form-control" value="' .$fila['pais'] .'"></td>
					<td><input type="text" name="email" class="form-control" value="' .$fila['email'] .'"></td>
					<td><input type="text" name="extranjero" class="form-control" value="' .$fila['extranjero'] .'"></td>
					<td><input type="text" name="mexicano" class="form-control" value="' .$fila['mexicano'] .'"></td>
				</tr>';
				
			}
			echo '<tr><td colspan="2"><button type="submit" class="btn btn-default" name="generar"/>Generar PDF</button></td>';
			echo '</tr>';

			
			echo "</table>";
			echo "</form>"
		?> 
	
	</fieldset>
	<div id="error" class="" role="alert">
		<!-- AQUI SE MOSTRARÁ EL MENSAJE DE CONEXIÓN EXITOSA CON LA BD O ERROR -->
	</div>

</div>

<?php
	$mysqli -> close();
?>

</body>

</html>
