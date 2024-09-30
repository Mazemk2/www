'use strict'

// Container auswählen, in den die Tabelle eingefügt wird
const container = document.querySelector('#artists-container');

// JSON-Daten abrufen und die Tabelle erstellen
fetch('artists.json')
  .then(response => response.json())
  .then(data => {
    // Sobald die Daten geladen sind, die Tabelle erstellen und dem Container hinzufügen
    const table = createTable();
    data.forEach(artist => {
      artist.albums.forEach(album => {
        // Füge für jedes Album eine Zeile hinzu
        const row = createTableRow(artist.name, album.title, album.year);
        table.appendChild(row);
      });
    });
    // Füge die erstellte Tabelle in den Container ein
    container.appendChild(table);
  })
  .catch(error => {
    console.error('Fehler beim Laden der Daten:', error);
  });

// Funktion zur Erstellung der Tabelle
function createTable() {
    // Tabelle und Header-Elemente erstellen
    const table = document.createElement('table');
    const tableHead = document.createElement('thead');
    const tableHeadRow = document.createElement('tr');
    
    // Tabellenkopf-Zellen für Künstler, Album und Jahr
    const tableHeadCell_1 = document.createElement('th');
    const tableHeadCell_2 = document.createElement('th');
    const tableHeadCell_3 = document.createElement('th');

    // Textinhalt der Kopfzeilen festlegen
    tableHeadCell_1.textContent = 'Künstler';
    tableHeadCell_2.textContent = 'Album';
    tableHeadCell_3.textContent = 'Jahr';

    // Kopfzeile zusammenbauen
    tableHeadRow.append(tableHeadCell_1, tableHeadCell_2, tableHeadCell_3);
    tableHead.appendChild(tableHeadRow);
    table.appendChild(tableHead);

    // Inline-Styling für die Tabelle
    table.style.width = '100%';
    table.style.borderCollapse = 'collapse';
    table.style.margin = '20px 0';

    // Kopfzeile stilisieren
    tableHeadRow.style.backgroundColor = '#f2f2f2';
    tableHeadRow.style.textAlign = 'left';

    // Zellen stilisieren
    const thStyles = [tableHeadCell_1, tableHeadCell_2, tableHeadCell_3];
    thStyles.forEach(th => {
        th.style.border = '1px solid #ddd';
        th.style.padding = '8px';
    });

    return table;
}

// Funktion zur Erstellung einer Tabellenzeile
function createTableRow(artist, title, year) {
    // Erstelle eine Tabellenzeile und Zellen
    const row = document.createElement('tr');
    const cell_1 = document.createElement('td');
    const cell_2 = document.createElement('td');
    const cell_3 = document.createElement('td');

    // Fülle die Zellen mit den Daten (Künstler, Album, Jahr)
    cell_1.textContent = artist;
    cell_2.textContent = title;
    cell_3.textContent = year;

    // Inline-Styling für die Zellen
    const tdStyles = [cell_1, cell_2, cell_3];
    tdStyles.forEach(td => {
        td.style.border = '1px solid #ddd';
        td.style.padding = '8px';
    });

    // Zeilen-Hintergrundfarbe bei Hover-Effekt
    row.onmouseover = () => {
        row.style.backgroundColor = '#f5f5f5';
    };
    row.onmouseout = () => {
        row.style.backgroundColor = '';
    };

    // Zeile zusammenfügen
    row.append(cell_1, cell_2, cell_3);

    return row;
}
