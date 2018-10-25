<?php



// specify the REST web service to interact with

$url = 'https://localhost/~jmertic/sugar7/ent/sugarcrm/rest/v10';



// And admin username/password

$username = 'will';

$password = 'will';



// And the report_id you wish to export

$report_id = '74468a92-f2cb-68e1-664c-523741f7d3c7';



// And the filename to create

$pdf_filename = 'reportexport.pdf';



/**

  * Authenicate and get back token

  */

$curl = curl_init($url . "/oauth2/token");

curl_setopt($curl, CURLOPT_POST, true);

curl_setopt($curl, CURLOPT_HEADER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



// Set the POST arguments to pass to the Sugar server

$rawPOSTdata = array(

    "grant_type" => "password",

    "username" => $username,

    "password" => $password,

    "client_id" => "sugar",

    "client_secret" => "",

    "platform" => "base",

    );

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($rawPOSTdata));

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 



// Make the REST call, returning the result

$response = curl_exec($curl);

if (!$response) {

    die("Connection Failure. ".curl_error($curl)."\n");

}



// Convert the result from JSON format to a PHP array

$result = json_decode($response);



curl_close($curl);



$token = $result->access_token;



echo "Success! OAuth token is $token\n";



/**

  * Export the given report

  */



// Open a curl session for making the call

$curl = curl_init($url . "/Reports/74468a92-f2cb-68e1-664c-523741f7d3c7/pdf");

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($curl, CURLOPT_HEADER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/pdf',"OAuth-Token: $token")); 



// Make the REST call, returning the result

$response = curl_exec($curl);

if (!$response) {

    die("Connection Failure.\n");

}



// Convert the result from JSON format to a PHP array

file_put_contents($pdf_filename, $response);



echo "PDF saved to $pdf_filename";