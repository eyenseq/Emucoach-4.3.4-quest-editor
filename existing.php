<?php
session_start();

$mysql_ip = $_SESSION['mysql_ip'];
$mysql_port = $_SESSION['mysql_port'];
$mysql_user = $_SESSION['mysql_user'];
$mysql_password = $_SESSION['mysql_password'];
$mysql_server = $_SESSION['mysql_server'];

$conn = new mysqli($mysql_ip, $mysql_user, $mysql_password, $mysql_server, $mysql_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Existing Quests</title>
    <script>
        function searchQuests() {
            var id = document.getElementById("id").value;
            var title = document.getElementById("title").value;
            var limit = document.getElementById("limit").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "search.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("results").innerHTML = xhr.responseText;
                }
            };
            xhr.send("id=" + id + "&title=" + title + "&limit=" + limit);
        }
    </script>
</head>
<body>
    <h1>Existing Quests</h1>
    <form>
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" oninput="searchQuests()"><br><br>

        <label for="title">Quest Title:</label>
        <input type="text" id="title" name="title" oninput="searchQuests()"><br><br>

        <label for="limit">Limit:</label>
        <input type="text" id="limit" name="limit" oninput="searchQuests()"><br><br>
    </form>

    <div id="results"></div>
</body>
</html>
