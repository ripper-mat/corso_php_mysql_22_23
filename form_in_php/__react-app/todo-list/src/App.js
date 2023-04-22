import './components/taskItem/TaskItem.css'
import TaskItem from './components/taskItem/TaskItem';
import './App.css'
import TaskList from './components/TaskList/TaskList';
import {useState} from 'react'
import SearchBar from './components/SearchBar';

function App() {
  // const taskListData=[
  //   {
  //     task_id: 10,
  //     user_id: 12,
  //     name: "comprare il latte",
  //     due_date:"2022-04-04",
  //     done:false
  //   },
    
      // {
      //   user_id: 11,
      //   name: "Uccidere tutti",
      //   due_date: "2023-04-04",
      //   done: true,
      //   task_id: 5
      // }
    
  // ]
  // const taskListData = []
  const [taskListData, setTasklistData]= useState([])

  function aggiungiTask(){
    setTasklistData((attuale)=>{
      attuale.push({
          user_id: 11,
          name: "Uccidere tutti",
          due_date: "2023-04-04",
          done: true,
          task_id: 5
      })
      console.log(attuale)
      return attuale
    })
  }

  const list = taskListData.map(task => <TaskItem nome_task={task.name}/>)

  return(
  <main>
    <button onClick={aggiungiTask}>Add task</button>
    <SearchBar></SearchBar><br/>
    <TaskList header={'Paolo'} task={taskListData}>
      {taskListData.map(task => <TaskItem key={task.task_id} done={task.done} nome_task={task.name}/>)}
    </TaskList>
    <TaskList header={'Giovanni'} task={taskListData}>
      {taskListData.map(task => <TaskItem key={task.task_id} done={task.done} nome_task={task.name}/>)}
    </TaskList>
  </main>
  )
}


export default App;
