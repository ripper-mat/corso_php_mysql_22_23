// error function, è come scrivere una funzione con gli argomenti ma in modo diverso e con i props
const TaskList = (props) => {
    return(
        // tag fragment è un finto tag che non viene visualizzato ma fa rispettare la regola di racchiudere le cose in un tag
        <>
        {/*commento jsx*/}
      <h4 className="task_list__header,">{props.header}</h4>
        <ul id="myUL" className="task_list__list results">{props.children}</ul>
        </>


    )
}

export default TaskList