<?php 
namespace crud;

use models\Task;
use PDO;

require "config.php";
class TaskCRUD {


    public function create(Task $task)
    {
        $query = "INSERT INTO tasks ( name, due_date, done) 
                  VALUES (:name, :due_date, :done)
                 ";
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':name',$task->name,\PDO::PARAM_STR);
        $stm->bindValue(':due_date',$task->due_date,\PDO::PARAM_STR);
        $stm->bindValue(':done',$task->done,\PDO::PARAM_STR);
        // $stm->bindValue(':user_id',$task->user_id,\PDO::PARAM_STR);
        $stm->execute();
        
    }

    public function update($task, $task_id)
    {
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $query = "UPDATE `tasks` SET  `name`= :name, `due_date`= 
        :due_date, `done` = :done WHERE task_id= :task_id;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':name',$task->name,\PDO::PARAM_STR);
        $stm->bindValue(':due_date',$task->due_date,\PDO::PARAM_STR);
        $stm->bindValue(':done',$task->done,\PDO::PARAM_STR);
        // $stm->bindValue(':user_id',$task->user_id,\PDO::PARAM_STR);
        $stm->execute();
        return $stm->rowCount();
    }

    public function read(int $task_id=null):Task|array|bool|string
    {
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        if(!is_null($task_id)){
            $query = "SELECT * FROM tasks where task_id = :task_id";
            $stm = $conn->prepare($query);
            $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS,Task::class);
            if(count($result)==1){
                return $result[0];
            }
            if(count($result)>1){
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if(count($result)=== 0){
                return false;
            }
        }else{
            $query = "SELECT * FROM tasks";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS,Task::class);
            if(count($result)=== 0){
                return false;
            }
            return $result;

        }
       // $result = $stm->fetchAll(PDO::FETCH_CLASS,User::class);
        // echo "ciao sono ".User::class."\n";
        return $result;
    }

//     public function delete($user_id)
//     {
//         $conn= new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
//         $query="DELETE from user WHERE user_id = :user_id";
//         $stm = $conn->prepare($query);
//         $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
//         $stm->execute();
//         return $stm->rowCount();

//     }
 }