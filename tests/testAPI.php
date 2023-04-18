<?php
use PHPUnit\Framework\TestCase;

class testAPI extends TestCase{

    public function test_getTasks(){

        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => "http://localhost/corso_php_mysql_2223/form_in_php/rest_api/tasks.php",
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

        public function test_getTasksByUser(){
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "http://localhost/corso_php_mysql_2223/form_in_php/rest_api/tasks.php?user_id=1",
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
        if($parse->data){
            $this->assertIsArray($parse->data);
        }
        if($parse->errors){
            $this->assertIsArray($parse->errors);
        }
    }

    public function test_updateTask(){
        $curl = curl_init();
        $task = [
            
                "user_id"=> 18,
                "name"=> "KKKKKKKK",
                "due_date"=> "2023-04-04",
                "done"=> true
              
        ];
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost/corso_php_mysql_2223/form_in_php/rest_api/tasks.php?task_id=10",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => "{\n      \"user_id\": 18,\n      \"name\": \"KKKKKKK\",\n      \"due_date\": \"2023-04-04\",\n      \"done\": true\n    }",
            CURLOPT_HTTPHEADER => [
              "Accept: */*",
              "Content-Type: application/json",
              "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
          ]);

          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
    $parse = json_decode($response);
    
    $this->assertIsObject($parse, "non è un oggetto");
    if($parse->data){
        $this->assertIsArray($parse->data);
    }
    if($parse->errors){
        $this->assertIsArray($parse->errors);
    }
}

}