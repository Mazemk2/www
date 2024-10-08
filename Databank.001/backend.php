<?php
// Verbindung zur SQLite-Datenbank herstellen
$db = new SQLite3('sharehop.db');

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
