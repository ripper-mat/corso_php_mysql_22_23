

const primari_additivi = ["rosso", "verde", "blue"]
const primari_sottrattivi = ["cyano", "magenta", "giallo"]

// console.log("rosso","verde","blue")
// console.log(...colori)

console.log("rosso", "verde", "blue","cyano", "magenta", "giallo")
const tutti_colori_primary = [...primari_additivi, ...primari_sottrattivi]
console.log(tutti_colori_primary)

const persona = {
    nome:"mario",
    cognome:"rossi"
}

const persona2 = {...persona}

persona2.indirizzo = "via novara 33"

console.log(persona)



