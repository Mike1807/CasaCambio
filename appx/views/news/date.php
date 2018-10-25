<body class="hold-transition skin-blue sidebar-mini">
<?php echo validation_errors(); ?>

<?php echo form_open('news/date'); ?>
<div class="container">
<center>
    <p class="login-box-msg"><h3>Datos de cambio de moneda</h3></p>
    </center>
    <br>    
    <br>
    <br>
<?php
//usar esto para llamada de datos en la bd
$link = new PDO('mysql:host=localhost;dbname=ccambio', 'miguel', 'psymeg18'); 

?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="lista_monedas" class="table table-bordered table-hover">
                <thead>
		<tr>
			<th>FECHA</th>
			<th>NOMBRE DEL CLIENTE</th>
            <th>MONEDA INGRESADA</th>
            <th>CANTIDAD INGRESADA</th>
            <th>MONEDA DESEADA</th>
            <th>CANTIDAD CONVERTIDA</th>
			
		</tr>
		</thead>
<?php foreach ($link->query('SELECT * from  monedas') as $row){ ?> 
<tr>
	<td><?php echo $row['fecha'] ?></td>
    <td><?php echo $row['nombre_cliente'] ?></td>
    <td><?php echo $rates['rate'] ?></td>
    <td><?php echo $row['cantidad_origen'] ?></td>
    <td><?php echo $row['moneda_cambio'] ?></td>
    <td><?php echo $row['cantidad_final'] ?></td>


 </tr>
<?php
	}
?>
</table>
</div>
<a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/index.php/news"><span class="glyphicon glyphicon-chevron-left">Regresar</span></a>
</body>
</html>