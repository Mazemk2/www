function createTitle(title) {
    return title || 'Default title';
}

function Header(props) {
    const { subtitle, title, test } = props;

    return <>
        <h1>Develop. Preview. Ship. - {createTitle(title)}</h1>
        <h2>{subtitle ? subtitle : 'JavaScript and more'}</h2>
    </>;
}

function MyFooter() {
    return <footer>
        <p>@2024 US-FI36</p>
    </footer>;
}

function LikeButton () {
    const [likes, setLikes] = React.useState(0); // Initialwert 0 für `likes`

    function handleClick() {
        setLikes(likes + 1);
    }

    return <button onClick={ handleClick }>Like --- ({likes}) ---</button>;
}

function HomePage() {
    const names = ['Ada Lovelace', 'Grace Hopper', 'Margaret Hamilton'];

    return <>
        <Header subtitle="Great informatics" />
        <ul>
        {names.map((name) => (
            <li key={name}>{name}</li> // `key`-Prop für eindeutige Identifikation
        ))}
        </ul>
        <LikeButton />
        <MyFooter />
    </>
}

const app = document.getElementById('app'); // Auswahl des div-Elements
const root = ReactDOM.createRoot(app);
root.render(<HomePage />);