<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session to retrieve DB credentials
session_start();

// Get DB credentials from session or previous page
$ip = $_SESSION['db_ip'] ?? $_GET['ip'] ?? '';
$user = $_SESSION['db_user'] ?? $_GET['user'] ?? '';
$password = $_SESSION['db_password'] ?? $_GET['password'] ?? '';
$dbname = $_SESSION['db_name'] ?? $_GET['dbname'] ?? '';
$port = $_SESSION['db_port'] ?? $_GET['port'] ?? '';

// Connect to the database
$conn = new mysqli($ip, $user, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$object = [];
$errors = [];

// Handle save request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    // Retrieve and validate inputs
    $entry = filter_input(INPUT_POST, 'entry', FILTER_VALIDATE_INT);
    $item = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);
    $chance = filter_input(INPUT_POST, 'chance', FILTER_VALIDATE_FLOAT);
    $lootMode = filter_input(INPUT_POST, 'loot_mode', FILTER_VALIDATE_INT);
    $groupId = filter_input(INPUT_POST, 'group_id', FILTER_VALIDATE_INT);
    $minCount = filter_input(INPUT_POST, 'min_count', FILTER_VALIDATE_INT);
    $maxCount = filter_input(INPUT_POST, 'max_count', FILTER_VALIDATE_INT);

    // Validate required numeric fields
    if ($entry === false || $item === false) {
        $errors[] = "Object Id and Item Id are required and must be valid numbers.";
    }

    // You can add more validation as needed

    if (empty($errors)) {
        // Insert or update gameobject_loot_template
        $query_object_loot = "INSERT INTO gameobject_loot_template (entry, item, ChanceOrQuestChance, lootmode, groupid, mincountOrRef, maxcount) 
                              VALUES (?, ?, ?, ?, ?, ?, ?)
                              ON DUPLICATE KEY UPDATE 
                                  ChanceOrQuestChance = VALUES(ChanceOrQuestChance),
                                  lootmode = VALUES(lootmode),
                                  groupid = VALUES(groupid),
                                  mincountOrRef = VALUES(mincountOrRef),
                                  maxcount = VALUES(maxcount)";
        $stmt = $conn->prepare($query_object_loot);
        if ($stmt) {
            $stmt->bind_param('iidiiii', $entry, $item, $chance, $lootMode, $groupId, $minCount, $maxCount);
            if ($stmt->execute()) {
                echo "<p>Record saved successfully to gameobject_loot_template.</p>";
            } else {
                echo "<p>Error saving to gameobject_loot_template: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for gameobject_loot_template: " . htmlspecialchars($conn->error) . "</p>";
        }

        // Clear the input fields
        $entry = $item = $chance = $lootMode = $groupId = $minCount = $maxCount = null;
        $object = [];
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>Error: " . htmlspecialchars($error) . "</p>";
        }
    }
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Retrieve and validate input
    $entry = filter_input(INPUT_POST, 'entry', FILTER_VALIDATE_INT);
    $item = filter_input(INPUT_POST, 'item', FILTER_VALIDATE_INT);

    if ($entry !== false && $item !== false) {
        // Prepare and execute delete for gameobject_loot_template
        $query_delete_object = "DELETE FROM gameobject_loot_template WHERE entry = ? AND item = ?";
        $stmt = $conn->prepare($query_delete_object);
        if ($stmt) {
            $stmt->bind_param('ii', $entry, $item);
            if ($stmt->execute()) {
                echo "<p>Record deleted successfully from gameobject_loot_template.</p>";
            } else {
                echo "<p>Error deleting record from gameobject_loot_template: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for deleting gameobject_loot_template: " . htmlspecialchars($conn->error) . "</p>";
        }

        // Clear the input fields
        $entry = $item = $chance = $lootMode = $groupId = $minCount = $maxCount = null;
        $object = [];
    } else {
        echo "<p>Invalid Object Id or Item Id for deletion.</p>";
    }
}

// Handle search request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $search_object_id = filter_input(INPUT_POST, 'search_object_id', FILTER_VALIDATE_INT);
    $search_item_id = filter_input(INPUT_POST, 'search_item_id', FILTER_VALIDATE_INT);

    if ($search_object_id !== false && $search_item_id !== false) {
        // Query gameobject_loot_template
        $query_fetch_object = "SELECT * FROM gameobject_loot_template WHERE entry = ? AND item = ?";
        $stmt = $conn->prepare($query_fetch_object);
        if ($stmt) {
            $stmt->bind_param('ii', $search_object_id, $search_item_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $object = $result->fetch_assoc();
                $stmt->close();
            } else {
                echo "<p>Error fetching data: " . htmlspecialchars($stmt->error) . "</p>";
            }
        } else {
            echo "<p>Prepare failed for fetching data: " . htmlspecialchars($conn->error) . "</p>";
        }
    } else {
        echo "<p>Please enter valid search criteria.</p>";
    }

    // Clear search fields
    $_POST['search_object_id'] = $_POST['search_item_id'] = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Object Quest Loot</title>
</head>
<body>
    <h1>Object Quest Loot Editor</h1>

    <form method="post">
        <!-- Search Fields -->
        <h3>Search</h3>
        Object Search Id: <input type="number" name="search_object_id" value=""><br>
        Item Search Id: <input type="number" name="search_item_id" value=""><br>
        <input type="submit" name="search" value="Search"><br>

        <!-- Gameobject Loot Template Fields -->
        <h3>Gameobject Loot Template</h3>
        Object Id: <input type="number" name="entry" value="<?php echo htmlspecialchars($object['entry'] ?? ''); ?>"><br>
        Item Id: <input type="number" name="item" value="<?php echo htmlspecialchars($object['item'] ?? ''); ?>"><br>
        Chance to drop +/-: <input type="number" step="0.01" name="chance" value="<?php echo htmlspecialchars($object['ChanceOrQuestChance'] ?? ''); ?>"><br>
        Loot Mode: 
        <select name="loot_mode">
            <option value="1" <?php echo (isset($object['lootmode']) && $object['lootmode'] == 1) ? 'selected' : ''; ?>>Normal</option>
            <option value="2" <?php echo (isset($object['lootmode']) && $object['lootmode'] == 2) ? 'selected' : ''; ?>>Heroic</option>
            <option value="4" <?php echo (isset($object['lootmode']) && $object['lootmode'] == 4) ? 'selected' : ''; ?>>Raid</option>
        </select><br>
        Group Id: <input type="number" name="group_id" value="<?php echo htmlspecialchars($object['groupid'] ?? ''); ?>"><br>
        Min Amt Dropped or Ref +/-: <input type="number" name="min_count" value="<?php echo htmlspecialchars($object['mincountOrRef'] ?? ''); ?>"><br>
        Max Amt Dropped: <input type="number" name="max_count" value="<?php echo htmlspecialchars($object['maxcount'] ?? ''); ?>"><br>

        <!-- Save and Delete Buttons -->
        <input type="submit" name="save" value="Save">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
