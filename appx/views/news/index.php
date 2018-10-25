<body class="hold-transition skin-blue sidebar-mini">
<center><h1>Casa de cambio version alpha1.0 </h1></center>
<br>
<br>
<div class="container">
  <h2>Elige una de las siguientes opciones:</h2>
  <br>
  <br>
           <center>
  <table class="table">
    <thead>
      <tr>
        <th>Registrar cliente</th>
        <!--<th>Realizar nuevo cambio</th>-->
        <th>Lista de clientes</th>
        <th>Historial de cambios monetarios</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/index.php/news/create" ><span class="glyphicon glyphicon-user"></span></a></td>
        <!--<td><a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/index.php/news/exchange" ><span class="glyphicon glyphicon-transfer"></span></a></td>-->
        <td><a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/news/lista" ><span class="glyphicon glyphicon-list-alt"></span></a></td>
        <td><a class="btn btn-info btn-sm" href="http://localhost/CasaCambio/news/history" ><span class="glyphicon glyphicon-book"></span></a></td>
      </tr>
    </tbody>
  </table>
  </center>
</div>
    
<?php
// set API Endpoint and API key 
//$endpoint = 'latest';
//$access_key = '4adfb5ebc26cd2d4c4abbaa4c5f8dcdb';

// Initialize CURL:
//$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
//$json = curl_exec($ch);
//curl_close($ch);

// Decode JSON response:
//$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
/*echo $exchangeRates['rates']['GBP'];*/

//echo '<pre>'.
//print_r($exchangeRates, true).'</pre>';
    ?>
</body>
