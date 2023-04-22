import { getUser } from "./UserService.js"
import { UserTable, UserList } from "./RenderView.js"


const users = await getUser()

console.log(users)

UserTable(users, "lista_utenti_2")
UserList(users, "lista_utenti_1")
