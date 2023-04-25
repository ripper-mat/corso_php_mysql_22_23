import { activeFilter, addTask, completedFilter, removeTask, updateTask } from "./TOdoService.js";

const tasklist = [
    
        {
            name:"comprare il latte",
            user_id:12,
            id:11,
            due_date:"2023-04-25",
            done: true
        },
    
        {
            name:"vendere il latte",
            user_id:12,
            id:12,
            due_date:"2023-04-25",
            done: false
        },
    
        {
            name:"drogarsi",
            user_id:10,
            id:13,
            due_date:"2023-04-22",
            done: true
        },
    
]

const activeTaskList = activeFilter(tasklist)

if (!(activeTaskList.length == 1)){
    console.log("test active fallito")
}

// console.log(completedFilter(tasklist))

const completedTask = completedFilter(tasklist)
if(!(completedTask.length == 2)){
    console.log("test completed fallito")
}

// const newTaskList = addTask('Fare esercizi', '2000-12-01')
const newTask={
    name:"fare i compiti",
    user_id:12,
    due_date: "2000-12-01"
}

// glia rgomenti saranno cosa aggiungere e dove aggiungerlo
const newTasklist = addTask(newTask,tasklist)
// console.log(newTasklist)

if (!(newTasklist.length==4)){
    console.log("test addTask fallito")
}

const task_id = 12
const removedTasklist = removeTask(task_id,tasklist)


console.log("------------------------------")
// console.log(removedTasklist)


const updatedTaskItem= {
    name:"nuovonome",
    id:12
}

const updatedTasklist = updateTask(updatedTaskItem, tasklist)
console.log(updatedTasklist)


