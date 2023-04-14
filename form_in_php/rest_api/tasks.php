<?php

use crud\TaskCRUD;
use models\Task;
use models\User;

include "../config.php";
include "../autoload.php";

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $task_id = filter_input(INPUT_GET, 'task_id');
        $user_id = filter_input(INPUT_GET, 'user_id');
        if (!is_null($task_id)) {
            $task= $crud->read($task_id);
            if($task){

                $response = [
                    "data"=>[
                        $task
                    ],
                       "status"=> 200
                ];
            }else{
                http_response_code(404);
                    
                $response=[
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => 'task non trovata',
                            'details' => $task_id
                        ]
                    ]
                ];
            }
            
        }else if (!is_null($user_id)) {
            $tasks= $crud->readByUser($user_id);
            if($tasks){
            $response = [
                "data"=>$tasks,
                "status"=> 200
            ];
            }else{
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
            
        } else{
            $tasks = $crud->read();
            $response =[
                "data"=> $tasks,
                "status"=> 200
            ];
        }
        echo json_encode($response);
        break;

        case 'DELETE':

        $task_id = filter_input(INPUT_GET, 'task_id');
            if (!is_null($task_id)) {
                $rows=$crud->delete($task_id);
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
                        'errors' => 
                        [

                            [
                                "status" => 200,
                                'title' => "task eliminata",
                                'details' => $task_id
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
                            'title' => 'task non trovata',
                            'details' => $task_id
                            ]
                        ]
                    ];
                    
                }
            echo json_encode($response);
            }
            break;

            case 'POST' :

                // print_r($_POST);
                $input = file_get_contents('php://input');
                $request = json_decode($input, true); //con true ottengo un array associativo
                // var_dump($request);
                $user_id=$request["user_id"];
                // var_dump($user_id);               
                
                $task = Task::arrayToTask($request);
                $last_id = $crud->create($task, $user_id);  

                $task = (array) $task;
                $task['task_id']= $last_id;
                $response=[
                    'data'=> $task,
                    'status' => 201
                ];
                echo json_encode($response);



                case 'PUT':
                    $task_id = filter_input(INPUT_GET, 'task_id');
                    $input = file_get_contents('php://input');
                    $request = json_decode($input, true);
                    $task = Task::arrayToTask($request);
                    
                    if (!is_null($task_id)) {
                        $rows=$crud->update($task, $task_id);
                        if($rows == 1){
                        
                        $task = (array) $task;
                        
                        $task['task_id']= $task_id;
                        $response=[
                            'data'=> $task,
                            'status' => 200
                        ];
                        
                        }if ($rows==0){
                            $task = $crud->read($task_id);
                            // var_dump($user);
                            if(!$task){
                                $response=[
                                    'errors' => [
                                        [
                                            'status' => 404,
                                            'title' => 'task non trovata',
                                            'details' => $task_id
                                            ]
                                            ]
                                        ];
                            }else{
                                $response = "Task con id ".$task_id." gia aggiornata";
                            }
                        }
                        echo json_encode($response);
                    }else{
                        $task = $crud->read();
                        echo json_encode($task);
                        
                    }

    
    default:
        # code...
        break;
}