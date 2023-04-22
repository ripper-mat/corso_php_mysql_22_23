
const base_url = "http://localhost/corso_php/form_in_php/rest_api"
// VERSIONE LUNGA PROMESSA CON THEN
// const promessa_response = fetch(base_url+"/users.php").then(res =>{
//     // conversione in json della response restituisce un'altra promessa
//     return res.json
// })

// const promessa_json = promessa_response.then(json => {
//     console.log(json)
// })

// VERISONE CORTA PROMESSA CON ASYNC AWAIT
// Una funzione asincrona restituirà sempre una promessa
export async function getUser() {
    // con await ogni riga deve aspettare la risposta di quella precedente
    const response = await fetch(base_url + "/users.php")
    const json = await response.json()
    return json.data
    // console.log(json)
}


// const users= getUser().then(data=>console.log(data))

// const users= await getUser()
// console.log(users)










// fetch(base_url+"tasks.php")