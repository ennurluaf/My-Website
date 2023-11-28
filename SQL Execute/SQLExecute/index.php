<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Compiler</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>SQL Compiler</h1>
        <textarea id="sqlCode" placeholder="Enter SQL code here" spellcheck="false" class="resizable"></textarea>
        <button onclick="executeSQL()">Execute</button>
        <div id="result"></div>
    </div>
    <script src="scripts/main.js"></script>
</body>
</html>
