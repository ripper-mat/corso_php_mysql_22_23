

// scrivere come argomento le parentesi graffe equivale a fare una costante con quegli argomeni e metterla come argomento della funzione
// si parla di destrutturazione
function CardBase({titolo, testo}) {
    return (
    <div>
        <h3>{titolo}</h3>
        <p>{testo}</p>
    </div>
    )
}

export default CardBase