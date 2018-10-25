<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Casa de Cambio | Registro cliente</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<link href="toastr.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="toastr.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="toastr.css" rel="stylesheet"/>
    <script src="toastr.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="register-logo">
  <b>Casa de Cambio</b>
	  <br>
	  <h4>Version Alpha 1.0</h4>
  </div>
  <?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>
  <div class="register-box-body">
  <center>
    <p class="login-box-msg"><h3>Registro de clientes</h3></p>
    </center>
      <!-- Horizontal Form -->
      
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-group has-feedback">
            <form class="form-horizontal" action="http://localhost/CasaCambio/index.php/news/">
              <div class="box-body">
                <div class="form-group">
                  <label for="fecha"></label>
                  <div class="col-xl-10">
                  <input type="datetime-local" name="fecha" id="fecha">
                  </div>
                </div>
            </div>
         
            <!--nombre-->
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_completo"></label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre Completo">
                  </div>
                </div>
            </div>
             <!--email-->
             <div class="box-body">
                <div class="form-group">
                  <label for="pais"></label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="pais" id="pais" placeholder="Pais">
                  </div>
                </div>
              </div>
            <!--email-->
            <div class="box-body">
                <div class="form-group">
                  <label for="email"></label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>
              </div>
            <!--password
              <div class="box-body">
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                </div>
              </div>-->
              <center><small>Ingrese el pasaporte o identificacion oficial que disponga el cliente</small></center>
             <!--numero pasaporte ext-->
              <div class="box-body">
                <div class="form-group">
                  <label for="extranjero"></label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="extranjero" id="extranjero" placeholder="Pasaporte extranjero">
                  </div>
                </div>
              </div>
              <!--numero pasaporte mx-->
              <div class="box-body">
                <div class="form-group">
                  <label for="mexicano"></label>
                  <div class="col-xl-10">
                    <input type="input" class="form-control" name="mexicano" id="mexicano" placeholder="Pasaporte mexicano">
                  </div>
                </div>
              </div>
     <!-- /.col -->
  
  
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

              <!-- /.box-footer -->
        
          </div>
          <!-- /.box -->
        
       
  <!--FIXER.API-->
  <link rel="form" href="http://data.fixer.io/api/latest?access_key=4adfb5ebc26cd2d4c4abbaa4c5f8dcdb">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="hold-transition register-page">
<?php
                      // set API Endpoint and API key 
                      $endpoint = 'latest';
                      $access_key = '4adfb5ebc26cd2d4c4abbaa4c5f8dcdb';

                      // Initialize CURL:
                      $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                      // Store the data:
                      $json = curl_exec($ch);
                      curl_close($ch);

                      // Decode JSON response:
                      $exchangeRates = json_decode($json, true);
                      ?>
               

<div class="register-box">

  <div class="register-box-body">
  <center>
    <p class="login-box-msg"><h3>Nuevo cambio monetario</h3></p>
    </center>
      <!-- Horizontal Form -->
      
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-group has-feedback">
            <form class="form-horizontal" action="http://localhost/CasaCambio/index.php/news/" method="post">
             
            <!--moneda de origen-->
            <div class="box-body">
                <div class="form-group">
                <label for="moneda_origen"></label>
                    <select for="moneda_origen"class="form-control" name="moneda_origen" id="moneda_origen" value='moneda'>
                  <option value="seleccionar moneda">Moneda del cliente</option>
                 <?php  foreach ($exchangeRates['rates'] as $rates => $valor):?>
                 <option><?php echo $rates?>  <?php echo $valor?></option>
                 <?php endforeach ?>
                    </select>    
                    <label for="moneda_cambio"></label>
                    <select for="moneda_cambio"class="form-control" name="moneda_cambio" id="moneda_cambio" value='moneda'>
                  <option value="seleccionar moneda">Moneda de cambio</option>
                 <?php  foreach ($exchangeRates['rates'] as $rates => $valor):?>
                 <option><?php echo $rates?>  <?php echo $valor?></option>
                 <?php endforeach ?>
                    </select>    
<br>
                    <center>
		<a class="btn btn-info btn-sm" href="#" id="agregar"><span class="align-middle"></span>convertir moneda</span></a>
            </center>
            <label for="campos"></label>
                  <div id="campos">
                    <br>
                  <form id="form" name="form">
	</form>
                  </div>
                </div>
              </div>
<br>        
                  <!-- /.col -->
        <a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/index.php/news/"><span class="glyphicon glyphicon-chevron-left">Regresar</span></a>
        
        <button class="success btn btn-success" id="success">Guardar datos</button>
        <!-- /.col -->
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

              <!-- /.box-footer -->
        
          </div>
          <!-- /.box -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
		$(document).on('keyup', '#campos input', function(e){
		 var p = $(this).parent().find('input');
		 p.eq(2).val(p.eq(0).val()*p.eq(1).val());
		});
			
		$(document).on('click', '#agregar', function(e){    
		 $('#campos').append('<label for="cantidad"></label><input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" value="" /><br><label for="valor_moneda"></label><input type="number" id="valor_moneda" placeholder="valor de moneda" value="" /><br><label for="total"></label><input type="number" id="total" name="total" readonly placeholder="total" />');
		 e.preventDefault();
		});
	});
</script>
<script>

function toasterOptions() {

toastr.options = {
  "closeButton": true,
  "debug": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "50000",
  "hideDuration": "10000",
  "timeOut": 0,
  "extendedTimeOut": 0,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut",
  "tapToDismiss": true
}
};

toasterOptions();
$('#success').click(function() {
       // show when the button is clicked
       toastr.success('Datos registrados Satisfactoriamente <button type="submit" id="success" class="btn btn-primary" value="Create news item">Continuar</button>');

    });
  </script>
</body>
</html>