<?php

use PHPUnit\Framework\TestCase;

class SommaTest extends TestCase{

public function test_somma()
{
    $this->assertEquals(10, 5+5,"ok 5+5 fa 10");
}

// su thunder si può ottenere il formato php di una chiamata impostando php e cURL nelle parentesi graffe in basso a dx

public function test_getUser(){

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://localhost/corso_php/form_in_php/rest_api/users.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//   echo $response;
}
$parse = json_decode($response);

$this->assertIsObject($parse, "non è un oggetto");
$this->assertIsArray($parse->data);
}



}