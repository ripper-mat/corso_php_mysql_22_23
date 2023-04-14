<?php 
namespace crud;

use models\Task;
use crud\UserCRUD;
use PDO;

class TaskCRUD {


    public function create(Task $task, $user_id)
    {
        $crud = new UserCRUD();
        $user_fk = $crud->read($user_id);
        if($user_fk){
        $query = "INSERT INTO tasks ( name, due_date, done, user_id) 
                  VALUES (:name, :due_date, :done, :user_id)
                 ";
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':name',$task->name,\PDO::PARAM_STR);
        $stm->bindValue(':due_date',$task->due_date,\PDO::PARAM_STR);
        $stm->bindValue(':done',$task->done,\PDO::PARAM_BOOL);
        $stm->bindValue(':user_id',$user_id,\PDO::PARAM_INT);
        $stm->execute();
        }
        if(!$user_fk){
            echo "Impossibile creare una task per questo utente";
        }
        
    }

    public function update($task, $task_id)
    {
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $query = "UPDATE `tasks` SET  `name`= :name, `due_date`= 
        :due_date, `done` = :done, `user_id`= :user_id WHERE task_id= :task_id;";
        $stm = $conn->prepare($query);

        $stm->bindValue(':task_id',$task_id,\PDO::PARAM_INT);
        $stm->bindValue(':name',$task->name,\PDO::PARAM_STR);
        $stm->bindValue(':due_date',$task->due_date,\PDO::PARAM_STR);
        $stm->bindValue(':done',$task->done,\PDO::PARAM_BOOL);
        $stm->bindValue('user_id',$task->user_id, \PDO::PARAM_INT);
     
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
        return $result;
    }

    public function readByUser(int $user_id=null):Task|array|bool|string
    {
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        if(!is_null($user_id)){
            $query = "SELECT * FROM tasks where user_id = :user_id";
            $stm = $conn->prepare($query);
            $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS,Task::class);
            if(count($result)>=1){
                return $result;
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
        return $result;
    }

    public function delete($task_id)
    {
        $conn= new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $query="DELETE from tasks WHERE task_id = :task_id";
        $stm = $conn->prepare($query);
        $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();

    }
 }