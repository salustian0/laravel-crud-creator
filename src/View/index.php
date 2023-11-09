<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="?create-crud">

    <input type="hidden" name="request_made" value="true">
    <div>
        <label for="entity-name">Entity name</label>
        <input id="entity-name" type="text" name="entity_name" />
    </div>

    <div>
        <label for="action">Ação</label>
        <select name="crud_action" id="action">
            <option value="create">Create crud</option>
            <option value="delete">Delete crud</option>
        </select>
    </div>

    <button type="submit">Criar crud</button>
</form>
</body>
</html>