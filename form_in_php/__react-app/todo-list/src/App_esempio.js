import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';

function App() {

  const booklist =[
    {
      titolo:"AAA",
      autore:"XYZ"
    },
    {
      titolo:"BBB",
      autore:"NXT"
    },
    {
      titolo:"CCC",
      autore:"BEC"
    }
  ]

  // trasformo le informazioni in componenti
  const card_list = booklist.map((book,key) => <CardBase key={key} testo={book.autore} titolo={book.titolo}/>)

  return (
    // <div className="App">
    //  <CardBase titolo={"erri poter"}></CardBase>
    //  <CardBase titolo={"il grande Gabibbo"}></CardBase>
    //  <CardBase titolo={5+5}></CardBase>
    // </div>
    <section>
    <div className="App">{card_list}</div>
    <div className="App">{booklist.map(book => <CardBase key={book.titolo} titolo={book.titolo}/>)}</div>
    </section>
  );
}

export default App;
