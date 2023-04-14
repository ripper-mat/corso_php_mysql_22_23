// require
import { getUser } from "./UserService.js";
import { UserList } from "./RenderView.js";
import { UserTable } from "./RenderView.js";

getUser()
.then( json => {
    UserList(json.data, 'lista_utenti_1')

})

const user_locale= [
    {
        "first_name": "Amedeo",
        "last_name": "Verdi",
        "birthday": "2017-03-17",
        "birth_city": "sfdsf",
        "regione_id": 16,
        "provincia_id": 15,
        "gender": "M",
        "username": "giuseppe@xcvxc",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 15
    },
   
    {
        "first_name": "Ranuncolo",
        "last_name": "Rivola",
        "birthday": "1999-03-01",
        "birth_city": "sdfdsfs",
        "regione_id": 18,
        "provincia_id": 17,
        "gender": "M",
        "username": "a@b.it",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 21
    }
]

UserTable(user_locale, 'lista_utenti_2')






// getUser()
// .then(json => {
//     console.log(json.data);
//     const lista = document.getElementById("lista_utenti")
//     const elenco = json.map((user)=>{
//         return "<li>("+user.user_id+")"+user.first_name+" "+user.last_name+"</li>"
//     })
//     .join("\n")

//     lista.innerHTML = elenco
//     console.log(elenco)
// })
// .then((json)=>{
//     alert(json.data[0])
// });

