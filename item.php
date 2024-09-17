<?php
// Database credentials (replace these with actual credentials)

    $ip = $_GET['ip'];
    $port = $_GET['port'];
    $user = $_GET['user'];
    $password = $_GET['password'];
    $dbname = $_GET['dbname'];

    

// Initialize variables
$entry = '';
$name = '';
$limit = 10;
$results = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $entry = isset($_POST['entry']) ? $_POST['entry'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10;

    // Connect to the database
    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query
    $sql = "SELECT * FROM item_template WHERE 1=1";

    if (!empty($entry)) {
        $sql .= " AND entry LIKE '%" . $conn->real_escape_string($entry) . "%'";
    }

    if (!empty($name)) {
        $sql .= " AND name LIKE '%" . $conn->real_escape_string($name) . "%'";
    }

    $sql .= " LIMIT " . $limit;

    // Execute query
    $result = $conn->query($sql);

    $results = "<h2>Search Results:</h2>";
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $results .= "Entry: " . $row["entry"] . " - Name: " . $row["name"] . "<br>";
        }
    } else {
        $results .= "0 results";
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Item Template</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        form {
            text-align: center;
        }
    </style>
</head>
<body>
   <form method="post" action="">
	<input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="port" value="<?php echo $port; ?>">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="dbname" value="<?php echo $dbname; ?>">
        <label for="entry">Entry:</label>
        <input type="text" id="entry" name="entry" value="<?php echo htmlspecialchars($entry); ?>">
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <br>
        <label for="limit">Limit:</label>
        <input type="number" id="limit" name="limit" value="<?php echo htmlspecialchars($limit); ?>">
        <br>
        <button type="submit">Search</button>
    </form>
    <div>
        <?php echo $results; ?>
    </div>
</body>
</html>
