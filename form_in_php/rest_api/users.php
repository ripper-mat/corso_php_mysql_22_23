<?php

use crud\UserCRUD;
use models\User;

include "../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];
$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($user_id)) {
            $response=[
                "data"=>$crud->read($user_id),
                "status"=>200
            ];
            echo json_encode($response);
            
        }else{
            $response =[
                "data"=> $crud->read(),
                "status"=>200
            ];
            echo json_encode($response);
            
        }
        // var_dump($user_id);die();
        // ottenere elenco degli utenti
        break;

        case 'DELETE':

        $user_id = filter_input(INPUT_GET, 'user_id');
            if (!is_null($user_id)) {
                $rows=$crud->delete($user_id);
                if($rows == 1){
                    /**
                    {
                    "errors": [
                        {
                        "status": "422",
                        "source": { "pointer": "/data/attributes/firstName" },
                        "title":  "Invalid Attribute",
                        "detail": "First name must contain at least two characters."
                        }
                    ]
                    }
                    */
                    $response=[
                        'data' => 
                        [

                            [
                                "status" => 200,
                                'title' => "utente eliminato",
                                'details' => $user_id
                            ],
                        ]
                    ];
                    
                }
                if($rows == 0){

                    http_response_code(404);

                    $response=[
                        'errors' => [
                            [
                                'status' => 404,
                            'title' => 'user non trovato',
                            'details' => $user_id
                            ]
                        ]
                    ];
                    
                }
            echo json_encode($response);
            }
            break;

            case 'POST' :
                try{
                // print_r($_POST);
                $input = file_get_contents('php://input');
                $request = json_decode($input, true); //con true ottengo un array associativo
                // var_dump($request);

                $user = User::arrayToUser($request);
                $last_id = $crud->create($user);
                $user->user_id=$last_id;
                // $response= [                    
                //     "data"=> [
                //         "type"=> "users",
                //         'id' => $last_id,
                //         'attributes' => $user
                //     ]
                // ];

                // $user = (array) $user;
                // unset($user['password']);

                // $user['user_id']= $last_id;
                $response=[
                    'data'=> $user,
                    'status' => 200
                ];
                echo json_encode($response);
            }catch(\Throwable $th) {
                $response = responseError($th);
                echo json_encode($response);
            }
                break;



                case 'PUT':
                    $user_id = filter_input(INPUT_GET, 'user_id');
                    $input = file_get_contents('php://input');
                    $request = json_decode($input, true);
                    $user = User::arrayToUser($request);
                    
                    if (!is_null($user_id)) {
                        $rows=$crud->update($user, $user_id);
                        if($rows == 1){
                        
                        $user = (array) $user;
                        unset($user['password']);
                        
                        $user['user_id']= $user_id;
                        $response=[
                            'data'=> $user,
                            'status' => 200
                        ];
                        
                        }if ($rows==0){
                            $user = $crud->read($user_id);
                            // var_dump($user);
                            if(!$user){
                                $response=[
                                    'errors' => [
                                        [
                                            'status' => 404,
                                            'title' => 'user non trovato',
                                            'details' => $user_id
                                            ]
                                            ]
                                        ];
                            }else{
                                $response = "Utente con id ".$user_id." gia aggiornato";
                            }
                        }
                        echo json_encode($response);
                    }else{
                        $users = $crud->read();
                        echo json_encode($users);
                        
                    }

    
    default:
        # code...
        break;
}