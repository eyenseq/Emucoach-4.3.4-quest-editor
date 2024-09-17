<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Connection</title>
</head>
<body>
    <h2>Enter MySQL Database Details</h2>
    <form action="create.php" method="post">
        <label for="ip">MySQL IP:</label>
        <input type="text" id="ip" name="ip" required><br><br>
        <label for="port">Port:</label>
        <input type="text" id="port" name="port" required><br><br>
        <label for="user">User:</label>
        <input type="text" id="user" name="user" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="dbname">Database Name:</label>
        <input type="text" id="dbname" name="dbname" required><br><br>
        <input type="submit" value="Connect">
    </form>
</body>
</html>
