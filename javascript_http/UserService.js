const base_url = "http://localhost/corso_php/form_in_php/rest_api"

// export function getUser(){
//      return fetch(base_url+"/users.php").then(response=>response.json())
// };

export async function getUser() {
     // con await ogni riga deve aspettare la risposta di quella precedente
     const response = await fetch(base_url + "/users.php")
     const json = await response.json()
     return json.data
     // console.log(json)
 }


















// // /users.php
// const base_url = "http://localhost/corso_php_mysql_2223/form_in_php/rest_api"

// export function getUser() {
   

//     const promise = fetch(base_url+"/users.php")
//     //console.log("1 promessa di fetch",promise)
//           promise
//           .then((response) => {
//                 return response.json()   
//           })
//           .then((json)=>{
//                 // DATI DISPONIBILI
//                 //console.log(json);
//                 const lista = document.getElementById("lista_utenti")
//                 const elenco = json.map((user)=>{
//                     // console.log("sono un utente",user)
//                     return "<li>"+user.first_name+"</li>"
//                 }).join("")

//                 lista.innerHTML = elenco
//                 console.log(elenco)
//           })
        
    
// }