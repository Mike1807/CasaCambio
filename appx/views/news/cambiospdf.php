
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

    <title>Historial de cambios monetarios</title>

</head>



<?php

	require_once "mpdf/mpdf.php";
	require_once "php/conectari.php";
		
	$mysqli = conectar();

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
			<th>FECHA</th>
			<th>ID</th>
			<th>NOMBRE</th>
            <th>MONEDA DE ORIGEN</th>
            <th>MONEDA DE CAMBIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
            </tr>',2);
        while ($fila = $resultado -> fetch_array()){
			
            $mpdf->WriteHTML('
            	<tr>
                    <td>' .$fila['fecha'] .'</td>
                    <td>' .$fila['id'] .'</td>
                    <td>' .$fila['nombre_completo'] .'</td>
					<td>' .$fila['moneda_origen'] .'</td>
					<td>' .$fila['moneda_cambio'] .'</td>
					<td>' .$fila['cantidad'] .'</td>
					<td>' .$fila['total'] .'</td>
                </tr>
                ', 2);
        }
        $mpdf->WriteHTML('</table>',2);             
        $mpdf->Output('Cambios_Monetarios.pdf','I');
        exit;

	$mysqli -> close();

?>