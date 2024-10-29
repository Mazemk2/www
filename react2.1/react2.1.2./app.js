// Funktion zum Erstellen des Titels
function createTitle(title) {
    return title || 'Default title';
  }
  
  // Loading-Komponente als Fallback-Inhalt
  function Loading() {
    return <div>Wird geladen...</div>;
  }
  
  // Header-Komponente
  function Header(props) {
    const { title, test } = props;
    
    return (
      <>
        <h1>Develop. Preview. Ship. - {createTitle(title)}</h1>
        <h2>JavaScript and more</h2>
      </>
    );
  }
  
  // Footer-Komponente
  function MyFooter() {
    return (
      <footer>
        <p>@2024 US-FI36</p>
      </footer>
    );
  }
  
  // Hauptseite-Komponente
  function HomePage() {
    const names = ['Ada Lovelace', 'Grace Hopper', 'Margaret Hamilton'];
    
    return (
      <>
        <Header title="Awesome new title" test="23" />
        <Header subtitle="JS with JSX" />
        <p>This is just some Text: lorem ipsum</p>
        <ul>
          {names.map((name) => (
            <li key={name}>{name}</li> // `key`-Prop für eindeutige Identifikation
          ))}
        </ul>
        <MyFooter />
      </>
    );
  }
  
  // App-Komponente, die den Fallback-Inhalt und die Hauptseite steuert
  function App() {
    const [isLoaded, setIsLoaded] = React.useState(false);
  
    // Simulierte Ladezeit mit useEffect
    React.useEffect(() => {
      setTimeout(() => {
        setIsLoaded(true); // Setzt isLoaded auf true nach 2 Sekunden
      }, 2000);
    }, []);
  
    return isLoaded ? <HomePage /> : <Loading />;
  }
  
  // React-Root erstellen und die App-Komponente rendern
  const app = document.getElementById('app');
  const root = ReactDOM.createRoot(app);
  root.render(<App />);
  