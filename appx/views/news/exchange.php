<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Casa de Cambio | Nuevo cambio monetario</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                      $AED = 'AED';
                      $USD = 'USD';
                    

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
  <div class="register-logo">
  <b>Casa de Cambio</b>
	  <br>
	  <h4>Version Alpha 1.0</h4>
  </div>
  <div class="register-box-body">
  <center>
    <p class="login-box-msg"><h3>Nuevo cambio monetario</h3></p>
    </center>
      <!-- Horizontal Form -->
      
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-group has-feedback">
            <form class="form-horizontal" action="http://localhost/CasaCambio/index.php/news/date" method="post">
             
            <!--moneda de origen-->
            <div class="box-body">
                <div class="form-group">
                <label for="moneda_origen"></label>
                  <select form="moneda origen" for="moneda_origen"class="form-control" name="moneda_origen" id="moneda_origen" placeholder="Moneda del cliente">
                  <div class="col-xl-10">
                  <option value="seleccionar moneda">Seleccionar moneda del cliente</option>
                  <?php  foreach ($exchangeRates['rates'] as $rates => $valor):?>
                        <option><?php echo $rates?>  <?php echo $valor?></option>
                 <?php endforeach ?>
                    </select> 
                    <label for="moneda_cambio"></label>
                    <select for="moneda_cambio"class="form-control" name="moneda_cambio" id="moneda_cambio" value='moneda'>
                  <option value="seleccionar moneda">Seleccionar moneda deseada</option>
                 
                 <?php  foreach ($exchangeRates['rates'] as $rates => $valor):?>
                 <option><?php echo $rates?>  <?php echo $valor?></option>
                 <?php endforeach ?>
                    </select>    
                  <label for="total"></label>
                  <div id="total" class="col-xl-10">
                  <form id="form" name="form" method="post">
		<a href="#" id="agregar">convertir moneda</a>
		<ul id="campos"></ul>
	</form>
                  </div>
                </div>
              </div>

            
                  <!-- /.col -->
        <center>
        <a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/index.php/news/create/"><span class="glyphicon glyphicon-chevron-left">Regresar</span></a>
        <a class="btn btn-info btn-sm" value="Create exchanges item" href="http://localhost/CasaCambio/index.php/news/"><span class="glyphicon glyphicon-chevron-rigth">Continuar</span></a>
        
        </center>
       
        <!-- /.col -->
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

              <!-- /.box-footer -->
        
          </div>
          <!-- /.box -->

   <!--- <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />
 <input type="submit" name="submit" value="Create news item" />-->
 

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
	$(function() {
		$(document).on('keyup', '#campos input', function(e){
		 var p = $(this).parent().find('input');
		 p.eq(2).val(p.eq(0).val()*p.eq(1).val());
		});
			
		$(document).on('click', '#agregar', function(e){    
		 $('#campos').append('<li><input type="number" id="cantidad" placeholder="Cantidad" value="" />  <input type="number" id="valor_moneda" placeholder="valor de moneda" value="" />  <input type="number" id="total" placeholder="total" /></li>');
		 e.preventDefault();
		});
	});
</script>


</html>