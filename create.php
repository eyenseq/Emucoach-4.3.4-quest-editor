<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT MAX(Id) as max_id FROM quest_template";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_id = $row['max_id'] + 1;
    } else {
        $new_id = 1;
    }

    if (isset($_POST['search'])) {
        $search_id = $_POST['id'];
        $search_title = $_POST['title'];
        $search_limit = $_POST['limit'];

        $search_query = "SELECT Id, Title FROM quest_template WHERE 1=1";

        if (!empty($search_id)) {
            $search_query .= " AND Id = $search_id";
        }

        if (!empty($search_title)) {
            $search_query .= " AND Title LIKE '%$search_title%'";
        }

        if (!empty($search_limit) && is_numeric($search_limit)) {
            $search_query .= " LIMIT $search_limit";
        }

        $search_result = $conn->query($search_query);
    }

    $conn->close();
} else {
    die("Invalid access.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quest</title>
    <script>
        function checkId(id) {
            if (id === "" || id === null) {
                document.getElementById('status').innerHTML = '';
                document.getElementById('select').disabled = true;
                return;
            }
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText === "used") {
                        document.getElementById('status').innerHTML = '<span style="color: red;">&#x2717;</span>';
                        document.getElementById('select').disabled = true;
                    } else {
                        document.getElementById('status').innerHTML = '<span style="color: green;">&#x2713;</span>';
                        document.getElementById('select').disabled = false;
                    }
                }
            };
            xhr.open("GET", "check_id.php?id=" + id + "&ip=<?php echo $ip; ?>&port=<?php echo $port; ?>&user=<?php echo $user; ?>&password=<?php echo $password; ?>&dbname=<?php echo $dbname; ?>", true);
            xhr.send();
        }

        window.onload = function() {
            checkId(document.getElementById('new_id').value);
        }
    </script>
</head>
<body>
    <h2>Create New Quest</h2>
    <form method="post" action="save_new_quest.php">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="dbname" value="<?php echo $dbname; ?>">

        <label for="new_id">New ID:</label>
        <input type="text" id="new_id" name="new_id" value="<?php echo $new_id; ?>" oninput="checkId(this.value)" required><span id="status"></span><br><br>
        
        <input type="submit" id="select" value="New Quest" disabled>
    </form>

    <h2>Search Quests</h2>
    <form method="post" action="">
        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="dbname" value="<?php echo $dbname; ?>">

        <label for="id">ID:</label>
        <input type="text" id="id" name="id"><br><br>
        <label for="title">Quest Title:</label>
        <input type="text" id="title" name="title"><br><br>
        <label for="limit">Limit Results:</label>
        <input type="text" id="limit" name="limit"><br><br>
        <input type="submit" name="search" value="Search">
    </form>

    <?php if (isset($search_result)): ?>
        <h3>Results:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
            <?php while ($row = $search_result->fetch_assoc()): ?>
                <tr onclick="location.href='quest.php?id=<?php echo $row['Id']; ?>&ip=<?php echo $ip; ?>&port=<?php echo $port; ?>&user=<?php echo $user; ?>&password=<?php echo $password; ?>&dbname=<?php echo $dbname; ?>'">
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Title']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>
</html>
