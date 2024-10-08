<?php
// Verbindung zur SQLite-Datenbank herstellen
$db = new SQLite3('import sqlite3

# Verbindung zur SQLite-Datenbank herstellen (die Datei wird erstellt, wenn sie nicht existiert)
connection = sqlite3.connect("sharehop.db")
cursor = connection.cursor()

# Tabelle für Mitarbeiter erstellen
cursor.execute('''
CREATE TABLE IF NOT EXISTS Mitarbeiter (
    mitarbeiternummer INTEGER PRIMARY KEY AUTOINCREMENT,
    vorname TEXT NOT NULL,
    nachname TEXT NOT NULL,
    strasse TEXT NOT NULL,
    plz TEXT NOT NULL,
    ort TEXT NOT NULL,
    telefon TEXT,
    email TEXT
)
''')

# Tabelle für externe Mitarbeiter erstellen
cursor.execute('''
CREATE TABLE IF NOT EXISTS ExterneMitarbeiter (
    mitarbeiternummer INTEGER PRIMARY KEY AUTOINCREMENT,
    vorname TEXT NOT NULL,
    nachname TEXT NOT NULL,
    strasse TEXT NOT NULL,
    plz TEXT NOT NULL,
    ort TEXT NOT NULL,
    telefon TEXT,
    email TEXT,
    firma TEXT NOT NULL
)
''')

# Tabelle für Kunden erstellen
cursor.execute('''
CREATE TABLE IF NOT EXISTS Kunden (
    kundennummer INTEGER PRIMARY KEY AUTOINCREMENT,
    vorname TEXT NOT NULL,
    nachname TEXT NOT NULL,
    strasse TEXT NOT NULL,
    plz TEXT NOT NULL,
    ort TEXT NOT NULL,
    telefon TEXT,
    email TEXT,
    branche TEXT NOT NULL
)
''')

# Beispielhafte Datensätze für Mitarbeiter einfügen
cursor.executemany('''
INSERT INTO Mitarbeiter (vorname, nachname, strasse, plz, ort, telefon, email) 
VALUES (?, ?, ?, ?, ?, ?, ?)
''', [
    ('Dallas', 'Arthur', 'Kommandobrücke Nostromo', '12345', 'Nostromo', '001-345-6789', 'dallas@weyland.com'),
    ('Ripley', 'Ellen', 'Kommunikationsstation Nostromo', '12345', 'Nostromo', '001-456-7890', 'ripley@weyland.com'),
    ('Kane', 'Thomas', 'Offiziersquartiere Nostromo', '12345', 'Nostromo', '001-567-8910', 'kane@weyland.com'),
    ('Lambert', 'Joan', 'Navigationsstation Nostromo', '12345', 'Nostromo', '001-678-9123', 'lambert@weyland.com'),
    ('Ash', 'Android', 'Wissenschaftsstation Nostromo', '12345', 'Nostromo', '001-789-1234', 'ash@weyland.com'),
    ('Parker', 'Dennis', 'Maschinenraum Nostromo', '12345', 'Nostromo', '001-890-2345', 'parker@weyland.com'),
    ('Brett', 'Samuel', 'Maschinenraum Nostromo', '12345', 'Nostromo', '001-901-3456', 'brett@weyland.com')
])

# Beispielhafte Datensätze für externe Mitarbeiter einfügen
cursor.executemany('''
INSERT INTO ExterneMitarbeiter (vorname, nachname, strasse, plz, ort, telefon, email, firma) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)
''', [
    
    ('Bishop', 'Android', 'USCSS Sulaco Labor', '34567', 'Colonialmarine', '0123456781', 'bishop@weyland.com', 'Weyland-Yutani Corp.'),
    ('Newt', 'Rebecca', 'Hadleys Hope', '45678', 'Civilian', '0123456782', 'newt@hadleyshope.com', 'Hadleys Hope Colony'),
    ('Scott', 'Gorman', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123456', 'gorman@uscss.com', 'United States Colonial Marines'),
    ('Al', 'Simpson', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123457', 'simpson@uscss.com', 'United States Colonial Marines'),
    ('Jernigan', 'Stuart', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123458', 'jernigan@uscss.com', 'United States Colonial Marines'),
    ('Russ', 'Jorden', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123459', 'jorden@uscss.com', 'United States Colonial Marines'),
    ('Timmy', 'Jorden', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123460', 'timmy.jorden@uscss.com', 'United States Colonial Marines'),
    ('Hicks', 'Dwayne', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123461', 'hicks@uscss.com', 'United States Colonial Marines'),
    ('Hudson', 'William', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123462', 'hudson@uscss.com', 'United States Colonial Marines'),
    ('Carter', 'J. Burke', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123463', 'burke@uscss.com', 'Weyland-Yutani Corp.'),
    ('Frost', 'Ricco', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123464', 'frost@uscss.com', 'United States Colonial Marines'),
    ('Apone', 'Sergeant', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123465', 'apone@uscss.com', 'United States Colonial Marines'),
    ('Vasquez', 'Jenette', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123466', 'vasquez@uscss.com', 'United States Colonial Marines'),
    ('Drake', 'Mark', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123467', 'drake@uscss.com', 'United States Colonial Marines'),
    ('Spunkmeyer', 'Private', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123468', 'spunkmeyer@uscss.com', 'United States Colonial Marines'),
    ('Crowe', 'Tip', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123469', 'crowe@uscss.com', 'United States Colonial Marines'),
    ('Wierzbowski', 'Trevor', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123470', 'wierzbowski@uscss.com', 'United States Colonial Marines'),
    ('Dietrich', 'Corporal', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123471', 'dietrich@uscss.com', 'United States Colonial Marines'),
    ('Ferro', 'Corporal', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123472', 'ferro@uscss.com', 'United States Colonial Marines'),
    ('Van', 'Leuwen', 'USCSS Sulaco', '54321', 'USCSS Sulaco', '0123123473', 'vanleuwen@uscss.com', 'United States Colonial Marines'),
    ('Colonist', 'Cocooned', 'Hadleys Hope', '12345', 'Hadleys Hope', '0123123474', 'cocooned@hadleyshope.com', 'Hadleys Hope Colony')
    
    
])

# Beispielhafte Datensätze für Kunden einfügen
cursor.executemany('''
INSERT INTO Kunden (vorname, nachname, strasse, plz, ort, telefon, email, branche) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)
''', [
    
    ('Andrew', 'Clemens', 'Fiorina 161', '12345', 'Fiorina', '0123456789', 'clemens@fiorina.com', 'Fiorina 161 Colony'),
    ('Rafael', 'Dillon', 'Fiorina 161', '12345', 'Fiorina', '0123456790', 'dillon@fiorina.com', 'Fiorina 161 Colony'),
    ('Frank', 'Golic', 'Fiorina 161', '12345', 'Fiorina', '0123456791', 'golic@fiorina.com', 'Fiorina 161 Colony'),
    ('Johnny', 'Rains', 'Fiorina 161', '12345', 'Fiorina', '0123456792', 'rains@fiorina.com', 'Fiorina 161 Colony'),
    ('Bennett', 'Aaron', 'Fiorina 161', '12345', 'Fiorina', '0123456793', 'aaron@fiorina.com', 'Fiorina 161 Colony'),
    ('Ted', 'Morse', 'Fiorina 161', '12345', 'Fiorina', '0123456794', 'morse@fiorina.com', 'Fiorina 161 Colony'),
    ('David', 'Warriner', 'Fiorina 161', '12345', 'Fiorina', '0123456795', 'warriner@fiorina.com', 'Fiorina 161 Colony'),
    ('Martin', 'Junior', 'Fiorina 161', '12345', 'Fiorina', '0123456796', 'junior@fiorina.com', 'Fiorina 161 Colony'),
    ('Frank', 'Golic', 'Fiorina 161', '12345', 'Fiorina', '0123456797', 'golic2@fiorina.com', 'Fiorina 161 Colony'),
    ('Randy', 'Rains', 'Fiorina 161', '12345', 'Fiorina', '0123456798', 'rains2@fiorina.com', 'Fiorina 161 Colony'),
    ('Annalee', 'Call', 'USM Auriga', '23456', 'USM Auriga', '0987654322', 'call@weyland.com', 'Weyland-Yutani Corp.'),
    ('Johnny', 'Johner', 'USM Auriga', '23456', 'USM Auriga', '0987654323', 'johner@usmauriga.com', 'USM Auriga Crew'),
    ('Christophe', 'Vriess', 'USM Auriga', '23456', 'USM Auriga', '0987654324', 'vriess@usmauriga.com', 'USM Auriga Crew'),
    ('Ted', 'Elgyn', 'USM Auriga', '23456', 'USM Auriga', '0987654325', 'elgyn@usmauriga.com', 'USM Auriga Crew'),
    ('Jude', 'Wren', 'USM Auriga', '23456', 'USM Auriga', '0987654326', 'wren@usmauriga.com', 'USM Auriga Crew'),
    ('Jeunet', 'Breton', 'USM Auriga', '23456', 'USM Auriga', '0987654327', 'breton@usmauriga.com', 'USM Auriga Crew'),
    ('Anthony', 'Purvis', 'USM Auriga', '23456', 'USM Auriga', '0987654328', 'purvis@usmauriga.com', 'USM Auriga Crew'),
    ('Ellen', 'Ripley', 'Betty', '34567', 'Betty', '0876543210', 'ripley@weyland.com', 'Weyland-Yutani Corp.'),
    ('Annalee', 'Call', 'Betty', '34567', 'Betty', '0876543211', 'call@weyland.com', 'Weyland-Yutani Corp.'),
    ('Johnny', 'Johner', 'Betty', '34567', 'Betty', '0876543212', 'johner@betty.com', 'Betty Crew'),
    ('Christophe', 'Vriess', 'Betty', '34567', 'Betty', '0876543213', 'vriess@betty.com', 'Betty Crew'),
    ('Ted', 'Elgyn', 'Betty', '34567', 'Betty', '0876543214', 'elgyn@betty.com', 'Betty Crew')
])

# Änderungen speichern
connection.commit()

# Ausgabe aller Daten aus den Tabellen
def print_table_data():
    # Daten aus der Mitarbeiter-Tabelle
    cursor.execute("SELECT * FROM Mitarbeiter")
    mitarbeiter = cursor.fetchall()
    print("\nMitarbeiter:")
    for row in mitarbeiter:
        print(row)
    
    # Daten aus der ExterneMitarbeiter-Tabelle
    cursor.execute("SELECT * FROM ExterneMitarbeiter")
    externe_mitarbeiter = cursor.fetchall()
    print("\nExterne Mitarbeiter:")
    for row in externe_mitarbeiter:
        print(row)
    
    # Daten aus der Kunden-Tabelle
    cursor.execute("SELECT * FROM Kunden")
    kunden = cursor.fetchall()
    print("\nKunden:")
    for row in kunden:
        print(row)

# Daten aller Tabellen zeilenweise ausgeben
print_table_data()

# Verbindung schließen
connection.close()

print("SQLite-Datenbank und Tabellen erfolgreich erstellt und Beispiel-Daten eingefügt.")
input()sharehop.db');

// Funktion, um die Daten einer Tabelle zu laden
function fetchTableData($db, $tableName) {
    $result = $db->query("SELECT * FROM $tableName");

    // Spaltennamen abrufen
    $columnsResult = $db->query("PRAGMA table_info($tableName)");
    $columns = [];
    while ($column = $columnsResult->fetchArray(SQLITE3_ASSOC)) {
        $columns[] = $column['name'];
    }

    // Daten als Array zurückgeben
    $data = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }

    return [
        'columns' => $columns,
        'rows' => $data
    ];
}

// Tabelleninhalte abrufen
$mitarbeiterData = fetchTableData($db, 'Mitarbeiter');
$externeMitarbeiterData = fetchTableData($db, 'ExterneMitarbeiter');
$kundenData = fetchTableData($db, 'Kunden');

// Verbindung schließen
$db->close();
