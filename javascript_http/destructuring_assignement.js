const task = {
    'name':"comprare il latte",
    'due_date':"2000-01-01",
    'done':true

}


// const frase = `Ti ricordi che il ${task.due_date} hai ${task.name} ?`

const {name,due_date} = task


// nella funzione metto come argomenti i dati che voglio del json
function frase({name, due_date}) {
    const frase2 = `Ti ricordi che il ${due_date} hai ${name} ?`
    console.log(frase2)
    
}

// ma quando la richiamo passo direttamente tutto il json e lui si prende i dati che ho specificato come argomento della funzione
frase(task)