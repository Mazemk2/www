document.addEventListener("DOMContentLoaded", function() {
    const apiUrl = "api.php"; // URL zu unserer PHP-API

    function loadItems() {
        fetch(apiUrl)
        .then(response => {
            if (!response.ok) throw new Error("Fehler beim Laden der TODOs");
            return response.json();
        })
        .then(data => {
            const todoList = document.getElementById('todo-list');
            todoList.innerHTML = "";
            data.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item.text;
                li.id = item.id;
                if (item.completed) {
                    li.className = "completed list-group-item list-group-item-success"; // Markieren als erledigt
                } else {
                    li.className = "list-group-item"; // Normale Klasse
                }

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger ms-2';
                deleteButton.textContent = 'Löschen';

                deleteButton.addEventListener('click', function() {
                    fetch(apiUrl, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: item.id })
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Fehler beim Löschen");
                        li.remove();
                    })
                    .catch(error => alert(error.message));
                });
                li.appendChild(deleteButton);

                const completeButton = document.createElement('button');
                completeButton.className = 'btn btn-success ms-2';
                completeButton.textContent = 'Erledigt';

                completeButton.addEventListener('click', function() {
                    fetch(apiUrl, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: item.id })
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Fehler beim Aktualisieren");
                        li.classList.toggle("completed");
                        li.classList.toggle("list-group-item-success");
                    })
                    .catch(error => alert(error.message));
                });
                li.appendChild(completeButton);

                todoList.appendChild(li);
            });
        })
        .catch(error => alert(error.message));
    }

    document.getElementById('todo-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const todoInput = document.getElementById('todo-input').value.trim();

        if (todoInput === "") {
            alert("Bitte geben Sie eine Aufgabe ein.");
            return;
        }

        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ text: todoInput })
        })
        .then(response => {
            if (!response.ok) throw new Error("Fehler beim Hinzufügen der Aufgabe");
            return response.json();
        })
        .then(data => {
            loadItems();
            document.getElementById('todo-input').value = "";
        })
        .catch(error => alert(error.message));
    });

    loadItems(); // TODOs beim Laden der Seite abrufen
});
