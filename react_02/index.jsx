 
function createTitle(title) {
    return title || 'Default title';
}
 
function Header(props) {
    const { title, test } = props;
 
    return <>
        <h1>Develop. Preview. Ship. - {createTitle(title)}</h1>
        <h2>JavaScript and more</h2>
    </>;
}
 
function MyFooter() {
    return <footer>
        <p>@2024 US-FI36</p>
    </footer>;
}
function HomePage() {
    const names = ['Ada Lovelace', 'Grace Hopper', 'Margaret Hamilton'];
 
    return <>
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
}
 
const app = document.getElementById('app'); // Auswahl des div-Elements
const root = ReactDOM.createRoot(app);
root.render(<HomePage />);
 
 