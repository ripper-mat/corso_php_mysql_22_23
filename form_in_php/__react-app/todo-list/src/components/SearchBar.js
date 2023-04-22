import { useState } from "react"

const SearchBar = () => {

    const [taskName, setTaskName] = useState('')
    const [taskDueDate, setTaskDueDate] = useState('')
  

    return (
        <section className="container">
            <pre>
                {taskName}
                {taskDueDate}
            </pre>
        <div>
            {/* var taskName = document.getElementById("myselect").value; */}
            {/* [ ] assegnare una variabile di stato al value */}
            {/* [ ] assegnare onChange */}
        <input type="text" 
        value={taskName}
        onChange={evento => setTaskName(evento.target.value)}
        id="myInput" placeholder="Aggiungi/Cerca"/><br/>
        <button className="addBtn btn">Add</button><br/><br/><br/><br/>
        </div>
            
        <div>
        <input type="date" 
        value={taskDueDate}
        onChange={evento => setTaskDueDate(evento.target.value)}
        /><br/>
        </div>
        </section>
    )
}

export default SearchBar