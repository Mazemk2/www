<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SQLite-Installation und Fallstricke</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Sample Post</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>SQLite-Installation und Fallstricke</h1>
                        <h2 class="subheading">Eine Schritt-für-Schritt-Anleitung</h2>
                        <span class="meta">Posted by <a href="#!">Start Bootstrap</a> on October 20, 2024</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Content from Part 1 -->
                    <h1>SQLite Installation – Eine Schritt-für-Schritt-Anleitung</h1>

                    <h2>Schritt 1: Überprüfen, ob SQLite installiert ist</h2>
                    <p>Um zu prüfen, ob SQLite auf deinem System installiert ist, gib den folgenden Befehl ein:</p>

                    <pre><code>sqlite3 --version</code></pre>

                    <h2>Schritt 2: Installation von SQLite</h2>
                    <h3>Ubuntu/Debian:</h3>
                    <pre><code>sudo apt update && sudo apt install sqlite3</code></pre>

                    <h3>Fedora:</h3>
                    <pre><code>sudo dnf install sqlite</code></pre>

                    <h3>Arch Linux:</h3>
                    <pre><code>sudo pacman -S sqlite</code></pre>

                    <h2>Schritt 3: SQLite in PHP verwenden</h2>
                    <h3>Ubuntu/Debian:</h3>
                    <pre><code>sudo apt install php-sqlite3</code></pre>

                    <h3>Fedora:</h3>
                    <pre><code>sudo dnf install php-sqlite3</code></pre>

                    <p>Nachdem das Modul installiert wurde, musst du den Apache-Webserver neu starten:</p>

                    <pre><code>sudo systemctl restart apache2</code></pre>

                    <!-- Content from Part 2 -->
                    <h1>Fallstricke und Lösungen bei SQLite</h1>

                    <h3>Fallstrick 1: Schreibrechte für die Datenbank</h3>
                    <p>Ein häufiger Fehler ist, dass die Datenbank nur lesbar ist. Das führt zu einem Fehler wie:</p>

                    <pre><code>SQLSTATE[HY000]: attempt to write a readonly database</code></pre>

                    <p>Lösung: Setze die Schreibrechte korrekt:</p>

                    <pre><code>chmod 775 /pfad/zu/todo.db</code></pre>

                    <p>Stelle außerdem sicher, dass der Webserver (z. B. Apache) Zugriff auf die Datei hat:</p>

                    <pre><code>sudo chown www-data:www-data /pfad/zu/todo.db</code></pre>

                    <h3>Fallstrick 2: Datenbank im falschen Verzeichnis</h3>
                    <p>Die Datenbankdatei muss sich in einem Verzeichnis befinden, auf das der Webserver zugreifen kann. Stelle sicher, dass sie in einem öffentlich zugänglichen Verzeichnis wie <code>/srv/www/</code> abgelegt ist. Verwende außerdem absolute Pfade in deinem PHP-Code:</p>

                    <pre><code>$db = new PDO('sqlite:/srv/www/todo.db');</code></pre>

                    <h3>Fallstrick 3: Datenbank-Sperren (Locking)</h3>
                    <p>Wenn mehrere Schreibvorgänge gleichzeitig ausgeführt werden, sperrt SQLite die Datenbank, was zu Fehlern führen kann. Lösung: Vermeide gleichzeitige Schreibzugriffe und füge Fehlerbehandlungsmechanismen hinzu:</p>

                    <!-- Content from Part 3 -->
                    <h1>Erstellen und Einbinden einer SQLite-Datenbank</h1>
                <p>Um SQLite in deinem Projekt zu verwenden, folge diesen Schritten:</p>
                <h2>1. SQLite-Installation</h2>
                <p>Installiere SQLite auf deinem Linux-System mit dem folgenden Befehl:</p>
                <pre><code>sudo apt-get install sqlite3 libsqlite3-dev</code></pre>
                <p>Überprüfe die Installation mit:</p>
                <pre><code>sqlite3 --version</code></pre>

                <h2>2. Erstellen der Datenbank</h2>
                <p>Erstelle eine neue SQLite-Datenbank, z.B. für eine TODO-Liste:</p>
                <pre><code>sqlite3 todo.db</code></pre>
                <p>Innerhalb der SQLite-Shell kannst du dann Tabellen anlegen:</p>
                <pre><code>
                CREATE TABLE todos (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                task TEXT NOT NULL,
                completed INTEGER DEFAULT 0
                );
                </code></pre>

                <!-- Content from Part 4 -->
                <h1>3. Einbindung in PHP</h1>
                <p>Um auf die Datenbank in PHP zuzugreifen, musst du das SQLite-Modul aktivieren und eine Verbindung herstellen:</p>
                <pre><code>
                $pdo = new PDO('sqlite:' . __DIR__ . '/todo.db');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                </code></pre>
                <p>Jetzt kannst du SQL-Befehle wie <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code> und <code>DELETE</code> ausführen.</p>

                <h1>CRUD-Operationen mit SQLite in PHP</h1>
                <p>CRUD steht für Create, Read, Update und Delete – die vier grundlegenden Operationen zur Verwaltung von Daten.</p>

                <h2>1. Create (Erstellen einer neuen Aufgabe)</h2>
                <pre><code>
                $statement = $pdo->prepare("INSERT INTO todos (task) VALUES (:task)");
                $statement->execute(['task' => $task]);
                </code></pre>
                <p>Dies fügt eine neue Aufgabe in die Datenbank ein.</p>

                <h2>2. Read (Auslesen der Aufgaben)</h2>
                <pre><code>
                $statement = $pdo->query("SELECT * FROM todos");
                $todos = $statement->fetchAll(PDO::FETCH_ASSOC);
                </code></pre>
                <p>Hiermit werden alle Aufgaben aus der Datenbank ausgelesen.</p>

                <h2>3. Update (Aktualisieren einer Aufgabe)</h2>
                <pre><code>
                $statement = $pdo->prepare("UPDATE todos SET completed = 1 WHERE id = :id");
                $statement->execute(['id' => $id]);
                </code></pre>
                <p>Damit wird eine Aufgabe als erledigt markiert.</p>

                <h2>4. Delete (Löschen einer Aufgabe)</h2>
                <pre><code>
                $statement = $pdo->prepare("DELETE FROM todos WHERE id = :id");
                $statement->execute(['id' => $id]);
                </code></pre>
                <p>Dies löscht eine Aufgabe aus der Datenbank.</p>


                <h1>Verbindung zwischen Frontend (JavaScript) und SQLite über PHP-API</h1>
                <p>Um das Frontend (JavaScript) mit einer SQLite-Datenbank zu verbinden, verwenden wir eine PHP-API.</p>

                <h2>1. Abrufen der Aufgaben</h2>
                <pre><code>
fetch('api.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(todo => {
            // Aufgabe anzeigen
        });
    });
                </code></pre>
                <p>Hier wird ein GET-Request an die PHP-API gesendet, um die Aufgaben aus der SQLite-Datenbank zu laden.</p>

                <h2>2. Hinzufügen einer neuen Aufgabe</h2>
                <pre><code>
fetch('api.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ task: newTask })
});
                </code></pre>
                <p>Dies sendet eine neue Aufgabe über einen POST-Request an die API, die sie in die Datenbank einfügt.</p>

                <h2>3. Aktualisieren und Löschen</h2>
                <p>Ähnlich wie beim Hinzufügen kannst du PUT- und DELETE-Requests verwenden, um Aufgaben zu aktualisieren oder zu löschen.</p>
                <pre><code>
fetch('api.php', {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id: taskId })
});
                </code></pre>
                <p>Mit dem oben gezeigten PUT-Request kannst du den Status einer Aufgabe ändern.</p>

                </div>
            </div>
        </div>
    </article>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2024 - Your Website</div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
