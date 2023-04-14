

function UserList(array_users, element_selector){
    const lista = document.getElementById(element_selector)
    const elenco = array_users.map((user)=>{
        return "<li>("+user.user_id+")"+user.first_name+" "+user.last_name+"</li>"
    })
    .join("\n")

    lista.innerHTML = elenco
}

// UserTable() // Function expression
// assegno la funzione ad una variabile, così la funzione non può essere riscritta con lo stesso nome
//più avanti nel codice, mentre se faccio un'altra funzione UserList per esempio la prima verrà annullata dalla seconda

const UserTable = (array_users, element_selector) => {
    //backtick = Template literal
    const html = `<table border="1">
    <tr>
        <th>Nome</th>
    </tr>
    `
    +
    array_users.map((user)=>{

    return `   <tr>
            <td>
                ${user.first_name}
            </td>
        </tr>`
    }).join("")

    +
    `</table>`

    document.getElementById(element_selector).innerHTML = html
    
}

export { UserList }
export { UserTable }