import sqlite3

# Verbindung zur SQLite-Datenbank (wird erstellt, wenn sie nicht existiert)
conn = sqlite3.connect('todos.db')
c = conn.cursor()

# Tabelle erstellen, falls sie nicht existiert
c.execute('''
CREATE TABLE IF NOT EXISTS todos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL,
    completed INTEGER NOT NULL DEFAULT 0
)
''')

# Funktion zum Hinzufügen einer Aufgabe
def add_task(task):
    c.execute('INSERT INTO todos (task) VALUES (?)', (task,))
    conn.commit()
    print(f'Aufgabe "{task}" hinzugefügt.')

# Funktion zum Anzeigen aller Aufgaben
def show_tasks():
    c.execute('SELECT * FROM todos')
    tasks = c.fetchall()
    for task in tasks:
        status = 'Erledigt' if task[2] else 'Offen'
        print(f'{task[0]}: {task[1]} [{status}]')

# Funktion zum Markieren einer Aufgabe als erledigt
def complete_task(task_id):
    c.execute('UPDATE todos SET completed = 1 WHERE id = ?', (task_id,))
    conn.commit()
    print(f'Aufgabe {task_id} als erledigt markiert.')

# Menü für den Benutzer
while True:
    print("\nTODO-Liste:")
    print("1. Aufgabe hinzufügen")
    print("2. Aufgaben anzeigen")
    print("3. Aufgabe als erledigt markieren")
    print("4. Beenden")

    choice = input("Wähle eine Option: ")

    if choice == '1':
        task = input("Gib die neue Aufgabe ein: ")
        add_task(task)
    elif choice == '2':
        show_tasks()
    elif choice == '3':
        task_id = input("Gib die ID der Aufgabe ein, die du als erledigt markieren möchtest: ")
        complete_task(task_id)
    elif choice == '4':
        print("Programm beendet.")
        break
    else:
        print("Ungültige Auswahl. Bitte wähle erneut.")

# Verbindung schließen
conn.close()
