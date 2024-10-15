import sqlite3

# Verbindung zur SQLite-Datenbank herstellen (Datei wird erstellt, wenn sie nicht existiert)
conn = sqlite3.connect('todo.db')
c = conn.cursor()

# Tabelle für To-dos erstellen
c.execute('''
CREATE TABLE IF NOT EXISTS todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL,
    completed INTEGER NOT NULL DEFAULT 0
)
''')

# Änderungen in der Datenbank speichern
conn.commit()

# Verbindung zur Datenbank schließen
conn.close()

print("Datenbank 'todo.db' wurde erfolgreich erstellt und Tabelle 'todos' eingerichtet.")