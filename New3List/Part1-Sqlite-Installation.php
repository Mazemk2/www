<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlerübersicht und Lösungsvorschläge</title>

    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once(__DIR__ . '/classes/Template.php');
            $template = new Template(__DIR__ . '/templates', []);
            echo $template->render('nav.php', ['brandTitle' => 'Fehlerübersicht']);
        ?>
        <div class="row">
            <div class="col-2">
                <h5>Navigation</h5>
                <a href="./index.php">Zurück zur TODO-Liste</a><br>
                
            </div>
            <div class="col-8">
                <h1>SQLite-Installation und Fallstricke – Erklärungen</h1>

                <h2>Schritt 1: Überprüfen, ob SQLite installiert ist</h2>
                <p>Um zu prüfen, ob SQLite auf deinem System installiert ist, gib den folgenden Befehl ein:</p>

                <pre><code>sqlite3 --version</code></pre>

                <div class="explanation">
                    <p><strong>sqlite3 --version:</strong> Dieser Befehl zeigt die installierte Version von SQLite an. Wenn keine Ausgabe erfolgt, ist SQLite nicht installiert und du musst den nächsten Schritt ausführen.</p>
                </div>

                <h2>Schritt 2: Installation von SQLite</h2>
                <p>Verwende den Paketmanager deines Linux-Systems, um SQLite zu installieren:</p>

                <h3>Ubuntu/Debian:</h3>
                <pre><code>sudo apt update && sudo apt install sqlite3</code></pre>

                <div class="explanation">
                    <p><strong>sudo apt update:</strong> Aktualisiert die Liste der verfügbaren Pakete und deren Versionen.</p>
                    <p><strong>sudo apt install sqlite3:</strong> Installiert das SQLite-Paket auf deinem Ubuntu- oder Debian-System.</p>
                </div>

                <h3>Fedora:</h3>
                <pre><code>sudo dnf install sqlite</code></pre>

                <div class="explanation">
                    <p><strong>sudo dnf install sqlite:</strong> Installiert das SQLite-Paket auf einem Fedora-System mit dem DNF-Paketmanager.</p>
                </div>

                <h3>Arch Linux:</h3>
                <pre><code>sudo pacman -S sqlite</code></pre>

                <div class="explanation">
                    <p><strong>sudo pacman -S sqlite:</strong> Installiert SQLite mit dem Pacman-Paketmanager auf Arch-basierten Systemen.</p>
                </div>

                <h2>Schritt 3: PHP-SQLite-Modul installieren</h2>
                <p>Um SQLite mit PHP zu verwenden, musst du das SQLite-PHP-Modul installieren:</p>

                <h3>Ubuntu/Debian:</h3>
                <pre><code>sudo apt install php-sqlite3</code></pre>

                <div class="explanation">
                    <p><strong>sudo apt install php-sqlite3:</strong> Installiert das PHP-SQLite-Modul, damit PHP mit SQLite-Datenbanken arbeiten kann.</p>
                </div>

                <h3>Fedora:</h3>
                <pre><code>sudo dnf install php-sqlite3</code></pre>

                <div class="explanation">
                    <p><strong>sudo dnf install php-sqlite3:</strong> Installiert das SQLite-PHP-Modul auf einem Fedora-System.</p>
                </div>

                <p>Nachdem das Modul installiert wurde, musst du Apache neu starten:</p>

                <pre><code>sudo systemctl restart apache2</code></pre>

                <div class="explanation">
                    <p><strong>sudo systemctl restart apache2:</strong> Startet den Apache-Webserver neu, damit das PHP-SQLite-Modul korrekt geladen wird.</p>
                </div>

                <h2>Fallstricke und Lösungen bei SQLite</h2>

                <h3>Fallstrick 1: Schreibrechte für die Datenbank</h3>
                <p>Ein häufiger Fehler ist, dass die Datenbank nur lesbar ist. Das führt zu einem Fehler wie:</p>

                <pre><code>SQLSTATE[HY000]: attempt to write a readonly database</code></pre>

                <p>Lösung: Setze die Schreibrechte korrekt:</p>

                <pre><code>chmod 775 /pfad/zu/todo.db</code></pre>

                <div class="explanation">
                    <p><strong>chmod 775:</strong> Dieser Befehl setzt die Berechtigungen der Datenbankdatei so, dass sie vom Besitzer und der Gruppe schreibbar ist.</p>
                </div>

                <p>Stelle außerdem sicher, dass der Webserver (z. B. Apache) Zugriff auf die Datei hat:</p>

                <pre><code>sudo chown www-data:www-data /pfad/zu/todo.db</code></pre>

                <div class="explanation">
                    <p><strong>sudo chown www-data:www-data:</strong> Dieser Befehl ändert den Besitzer der Datenbankdatei auf den Webserver-Benutzer <code>www-data</code>, der von Apache verwendet wird, damit der Webserver darauf zugreifen kann.</p>
                </div>

                <h3>Fallstrick 2: Datenbank im falschen Verzeichnis</h3>
                <p>Die Datenbankdatei muss sich in einem Verzeichnis befinden, auf das der Webserver zugreifen kann. Stelle sicher, dass sie in einem öffentlich zugänglichen Verzeichnis wie <code>/srv/www/</code> abgelegt ist. Verwende außerdem absolute Pfade in deinem PHP-Code:</p>

                <pre><code>$db = new PDO('sqlite:/srv/www/todo.db');</code></pre>

                <div class="explanation">
                    <p><strong>$db = new PDO('sqlite:/pfad/zur/datenbank.db'):</strong> Der absolute Pfad zur SQLite-Datenbank wird hier verwendet, um sicherzustellen, dass PHP die Datei korrekt finden und verwenden kann.</p>
                </div>

                <h3>Fallstrick 3: Datenbank-Sperren (Locking)</h3>
                <p>Wenn mehrere Schreibvorgänge gleichzeitig ausgeführt werden, sperrt SQLite die Datenbank, was zu Fehlern führen kann. Lösung: Vermeide gleichzeitige Schreibzugriffe und füge Fehlerbehandlungsmechanismen hinzu:</p>

                <pre><code>try {
    $db->beginTransaction();
    // Datenbankoperationen
    $db->commit();
} catch (PDOException $e) {
    $db->rollBack();
    echo "Fehler: " . $e->getMessage();
}</code></pre>

                <div class="explanation">
                    <p><strong>beginTransaction()</strong> und <strong>commit():</strong> Diese Befehle starten und beenden eine Transaktion, wodurch mehrere Operationen zusammengefasst werden können.</p>
                    <p><strong>rollBack():</strong> Dieser Befehl wird verwendet, um die Transaktion zurückzusetzen, falls ein Fehler auftritt.</p>
                </div>
            </div>
            <div class="col-2">may bee</div>
        </div>
    </div>
</body>
</html>
