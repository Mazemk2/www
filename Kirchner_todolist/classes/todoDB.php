<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO-Liste</title>
    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <h1>Meine TODO-Liste</h1>

    <form id="todo-form">
        <input type="text" id="todo-input" placeholder="Neue Aufgabe hinzufügen">
        <button type="submit">Hinzufügen</button>
    </form>

    <ul id="todo-list">
        <!-- Unordered list to dynamically add todo list items. -->
    </ul>

    <script src="todo.js"></script>
</body>
</html>
