

function TaskItem({nome_task, done}) {
    return(
           
        <li className={done ? 'done' : ''}>
            <div className="lblNbtns">
            <label className="labelTask">{nome_task} </label>
            <div className="listBtn">
            <button className="btn">Edit</button>
            <button className="btn">Delete</button>
            </div>
            </div>
        </li>
            
    )
}

export default TaskItem