
export const addTask = (newTask, todos) => {
    // fai un a copia shallow
    const todosCopy = new Array(...todos)
    const newTaskCopy = {...newTask}
    newTaskCopy.id = (new Date).getTime()
    // cambia la copia
    todosCopy.push(newTaskCopy)
    return todosCopy
}
export const removeTask = (task_id, todos) => {
    const todosCopy = new Array(...todos)
    const indexToRemove = todosCopy.findIndex(task=>task.id==task_id)
    todosCopy.splice(indexToRemove,1)
    return todosCopy

}
export const updateTask = (taskToUpdate, todos) => {
    const todosCopy = new Array(...todos)
    return todosCopy.map(task => {
        if(task.id === taskToUpdate.id){
            return {...task,...taskToUpdate}
        }
        return task
    })


}




export const activeFilter = (todos) => {
    const newTodos = todos.filter(task=>!task.done)
    return newTodos
}
export const completedFilter = todos => todos.filter(task => task.done)
export const dateFilter = () => {}

