<head>
<link href="~/Content/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<style>
    .bb-alert {
        position: fixed;
        top: 0;
        right: 0;
        font-size: 1.2em;
        padding: 1em 1.3em;
        z-index: 2000;
    }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="container">
<center>
    <p class="login-box-msg"><h3>Lista de clientes</h3></p>
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
              <table id="lista_clientes" class="table table-bordered table-hover">
                <thead>
		<tr>
            <th>FECHA DE REGISTRO</th>
			<th>ID</th>
			<th>NOMBRE</th>
            <th>PAIS</th>
            <th>EMAIL</th>
            <th>PASAPORTE EXTRANJERO</th>
            <th>PASAPORTE MEXICANO</th>
			
		</tr>
		</thead>
<?php foreach ($link->query('SELECT * from clientes') as $row){ ?> 
<tr>
    <td><?php echo $row['fecha'] ?></td>
	<td><?php echo $row['id'] ?></td>
    <td><?php echo $row['nombre_completo'] ?></td>
    <td><?php echo $row['pais'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['extranjero'] ?></td>
    <td><?php echo $row['mexicano'] ?></td>
 </tr>
<?php
	}
?>
</table>
</div>
<div style="text-align: left">
<a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/news/"><span class="glyphicon glyphicon-chevron-left">Regresar</span></a>
</div>
<div style="text-align: right">
<a class="btn btn-primary btn-xs" id="enlace" href="http://localhost/CasaCambio/news/clientespdf/" method="post"><span class="fa fa-file-pdf-o" aria-hidden="true">  Descargar PDF</span></a>
<a class="btn btn-primary btn-xs" href="http://localhost/CasaCambio/news/clientesexcel/" method="post"><span class="fa fa-file-excel-o" aria-hidden="true"> Descargar Excel</span></a>
</div>
</body>
<script>
$(document).on("click", "[data-toggle=\"confirm\"]", function (e) {
        e.preventDefault();
        var lHref = $(this).attr('href');
        var lText = value : "Selecciona el tipo de archivo que deseas descargar";
        bootbox.confirm(lText, function (confirmed) {
            if (confirmed) {
                //window.location.replace(lHref); // similar behavior as an HTTP redirect (DOESN'T increment browser history)
                window.location.href = lHref; // similar behavior as clicking on a link (Increments browser history)
            }
        });
    });
</script>