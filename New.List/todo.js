document.addEventListener("DOMContentLoaded", function() {
    // Define the URL to our PHP API.
    const apiUrl = "todo-api.php";

    function loadItems() {
        // Fetch TODO items from the API
        fetch(apiUrl)
        .then(response => {
            if (!response.ok) throw new Error("Fehler beim Laden der TODOs");
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            const todoList = document.getElementById('todo-list');
            todoList.innerHTML = ""; // Clear the current list
            data.forEach(item => {
                const li = document.createElement('li'); // Create a new list item
                li.textContent = item.task; // Set the text of the list item
                li.id = item.id; // Set the ID of the item
                if (item.completed) {
                    li.className = "completed"; // Mark as completed if applicable
                }

                // Create and configure the delete button
                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger ms-2';
                deleteButton.textContent = 'Löschen';

                // Handle delete button click
                deleteButton.addEventListener('click', function() {
                    fetch(apiUrl, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: item.id }) // Send the ID of the item to delete
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Fehler beim Löschen");
                        li.remove(); // Remove the todo from the list
                    })
                    .catch(error => alert(error.message)); // Alert on error
                });
                li.appendChild(deleteButton); // Append delete button to the list item

                // Create and configure the complete button
                const completeButton = document.createElement('button');
                completeButton.className = 'btn btn-success ms-2';
                completeButton.textContent = 'Erledigt';

                // Handle complete button click
                completeButton.addEventListener('click', function() {
                    fetch(apiUrl, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: item.id }) // Send the ID of the item to mark as completed
                    })
                    .then(response => {
                        if (!response.ok) throw new Error("Fehler beim Aktualisieren");
                        li.classList.toggle("completed"); // Toggle completed class on the item
                    })
                    .catch(error => alert(error.message)); // Alert on error
                });
                li.appendChild(completeButton); // Append complete button to the list item

                todoList.appendChild(li); // Add the list item to the todo list
            });
        })
        .catch(error => alert(error.message)); // Alert on fetch error
    }

    // Event listener for the form submission
    document.getElementById('todo-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        const todoInput = document.getElementById('todo-input').value.trim(); // Get the input value

        if (todoInput === "") {
            alert("Bitte geben Sie eine Aufgabe ein."); // Alert if input is empty
            return;
        }

        // Send the new TODO to the API
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ task: todoInput }) // Send the input value
        })
        .then(response => {
            if (!response.ok) throw new Error("Fehler beim Hinzufügen der Aufgabe");
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            loadItems(); // Reload the todo list
            document.getElementById('todo-input').value = ""; // Clear the input field
        })
        .catch(error => alert(error.message)); // Alert on error
    });

    loadItems(); // Load the todo items when the page loads
});
