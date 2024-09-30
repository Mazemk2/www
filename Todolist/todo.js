document.addEventListener("DOMContentLoaded", function() {

    // Define the URL to our PHP API.
    const apiUrl = "todo-http://172.30.148.126/Todolist/todo.phpapi.php";

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        const todoList = document.getElementById('http://172.30.148.126/Todolist/main.html');
        data.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.title;
            todoList.appendChild(li);
        });
    });
});