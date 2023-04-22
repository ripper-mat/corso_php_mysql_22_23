const a = [1,2,3,4]

// così a e b sono lo stesso oggetto e se cambia uno cambia l'altro
// const b = a

// così sono due oggetti diversi ma con lo stesso contenuto, se cambio a cambia b ma se cambio b non cambia a
// è detta shallow copy
// a.push("X")
const b = new Array(...a)
b.push("z")

console.log(a)
console.log(b)