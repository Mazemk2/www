<?php
// Verbindung zur SQLite-Datenbank herstellen
$db = new SQLite3('/srv/www/Databank.001/sharehop.db');

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
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datenbankinhalt anzeigen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Datenbankinhalt anzeigen</h1>

    <h2>Mitarbeiter</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($mitarbeiterData['columns'] as $column): ?>
                    <th><?php echo htmlspecialchars($column); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mitarbeiterData['rows'] as $row): ?>
                <tr>
                    <?php foreach ($mitarbeiterData['columns'] as $column): ?>
                        <td><?php echo htmlspecialchars($row[$column]); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Externe Mitarbeiter</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($externeMitarbeiterData['columns'] as $column): ?>
                    <th><?php echo htmlspecialchars($column); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($externeMitarbeiterData['rows'] as $row): ?>
                <tr>
                    <?php foreach ($externeMitarbeiterData['columns'] as $column): ?>
                        <td><?php echo htmlspecialchars($row[$column]); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Kunden</h2>
    <table>
        <thead>
            <tr>
                <?php foreach ($kundenData['columns'] as $column): ?>
                    <th><?php echo htmlspecialchars($column); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kundenData['rows'] as $row): ?>
                <tr>
                    <?php foreach ($kundenData['columns'] as $column): ?>
                        <td><?php echo htmlspecialchars($row[$column]); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>