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
$creature = [];
$condition = [];
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

    // Conditions inputs
    $sourceType = filter_input(INPUT_POST, 'source_type', FILTER_VALIDATE_INT);
    $sourceGroup = filter_input(INPUT_POST, 'source_group', FILTER_VALIDATE_INT);
    $sourceEntry = filter_input(INPUT_POST, 'source_entry', FILTER_VALIDATE_INT);
    $sourceId = filter_input(INPUT_POST, 'source_id', FILTER_VALIDATE_INT);
    $elseGroup = filter_input(INPUT_POST, 'else_group', FILTER_VALIDATE_INT);
    $conditionType = filter_input(INPUT_POST, 'condition_type', FILTER_VALIDATE_INT);
    $conditionTarget = filter_input(INPUT_POST, 'condition_target', FILTER_VALIDATE_INT);
    $condition1 = filter_input(INPUT_POST, 'condition1', FILTER_VALIDATE_INT);
    $condition2 = filter_input(INPUT_POST, 'condition2', FILTER_VALIDATE_INT);
    $condition3 = filter_input(INPUT_POST, 'condition3', FILTER_VALIDATE_INT);
    $negativeCondition = filter_input(INPUT_POST, 'negative_condition', FILTER_VALIDATE_INT);
    $errorText = filter_input(INPUT_POST, 'error_text', FILTER_VALIDATE_INT);
    $scriptName = trim($_POST['script_name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    // Validate required numeric fields
    if (!$entry || !$item) {
        $errors[] = "Creature Id and Item Id are required and must be valid numbers.";
    }

    // You can add more validation as needed

    if (empty($errors)) {
        // Insert or update creature_loot_template
        $query_creature_loot = "INSERT INTO creature_loot_template (Entry, Item, ChanceOrQuestChance, LootMode, GroupId, MinCountOrRef, MaxCount) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)
                                ON DUPLICATE KEY UPDATE 
                                    ChanceOrQuestChance = VALUES(ChanceOrQuestChance),
                                    LootMode = VALUES(LootMode),
                                    GroupId = VALUES(GroupId),
                                    MinCountOrRef = VALUES(MinCountOrRef),
                                    MaxCount = VALUES(MaxCount)";
        $stmt = $conn->prepare($query_creature_loot);
        if ($stmt) {
            $stmt->bind_param('iidiiii', $entry, $item, $chance, $lootMode, $groupId, $minCount, $maxCount);
            if ($stmt->execute()) {
                echo "<p>Record saved successfully to creature_loot_template.</p>";
            } else {
                echo "<p>Error saving to creature_loot_template: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for creature_loot_template: " . htmlspecialchars($conn->error) . "</p>";
        }

        // Insert or update conditions
        $query_conditions = "INSERT INTO conditions 
                             (SourceTypeOrReferenceId, SourceGroup, SourceEntry, SourceId, ElseGroup, ConditionTypeOrReference, ConditionTarget, ConditionValue1, ConditionValue2, ConditionValue3, NegativeCondition, ErrorTextId, ScriptName, Comment)
                             VALUES 
                             (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                             ON DUPLICATE KEY UPDATE 
                                 ConditionTypeOrReference = VALUES(ConditionTypeOrReference),
                                 ConditionTarget = VALUES(ConditionTarget),
                                 ConditionValue1 = VALUES(ConditionValue1),
                                 ConditionValue2 = VALUES(ConditionValue2),
                                 ConditionValue3 = VALUES(ConditionValue3),
                                 NegativeCondition = VALUES(NegativeCondition),
                                 ErrorTextId = VALUES(ErrorTextId),
                                 ScriptName = VALUES(ScriptName),
                                 Comment = VALUES(Comment)";
        $stmt = $conn->prepare($query_conditions);
        if ($stmt) {
            $stmt->bind_param('iiiiiiiiiissss', 
                $sourceType, 
                $sourceGroup, 
                $sourceEntry, 
                $sourceId, 
                $elseGroup, 
                $conditionType, 
                $conditionTarget, 
                $condition1, 
                $condition2, 
                $condition3, 
                $negativeCondition, 
                $errorText, 
                $scriptName, 
                $comment
            );
            if ($stmt->execute()) {
                echo "<p>Record saved successfully to conditions.</p>";
            } else {
                echo "<p>Error saving to conditions: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for conditions: " . htmlspecialchars($conn->error) . "</p>";
        }
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
    
    if ($entry && $item) {
        // Prepare and execute delete for creature_loot_template
        $query_delete_creature = "DELETE FROM creature_loot_template WHERE Entry = ? AND Item = ?";
        $stmt = $conn->prepare($query_delete_creature);
        if ($stmt) {
            $stmt->bind_param('ii', $entry, $item);
            if ($stmt->execute()) {
                echo "<p>Record deleted successfully from creature_loot_template.</p>";
            } else {
                echo "<p>Error deleting record from creature_loot_template: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for deleting creature_loot_template: " . htmlspecialchars($conn->error) . "</p>";
        }

        // Prepare and execute delete for conditions
        $query_delete_condition = "DELETE FROM conditions WHERE SourceGroup = ? AND SourceEntry = ?";
        $stmt = $conn->prepare($query_delete_condition);
        if ($stmt) {
            $stmt->bind_param('ii', $entry, $item);
            if ($stmt->execute()) {
                echo "<p>Record deleted successfully from conditions.</p>";
            } else {
                echo "<p>Error deleting record from conditions: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Prepare failed for deleting conditions: " . htmlspecialchars($conn->error) . "</p>";
        }
    } else {
        echo "<p>Invalid Creature Id or Item Id for deletion.</p>";
    }
}

// Handle search request
$search_creature_id = filter_input(INPUT_POST, 'search_creature_id', FILTER_VALIDATE_INT);
$search_item_id = filter_input(INPUT_POST, 'search_item_id', FILTER_VALIDATE_INT);

if (!empty($search_creature_id) && !empty($search_item_id)) {
    // Query creature_loot_template
    $query_fetch_creature = "SELECT * FROM creature_loot_template WHERE entry = ? AND item = ?";
    $stmt = $conn->prepare($query_fetch_creature);
    $stmt->bind_param('ii', $search_creature_id, $search_item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $creature = $result->fetch_assoc();
    $stmt->close();

    // Query conditions table
    $query_fetch_condition = "SELECT * FROM conditions WHERE SourceGroup = ? AND SourceEntry = ?";
    $stmt = $conn->prepare($query_fetch_condition);
    $stmt->bind_param('ii', $search_creature_id, $search_item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $condition = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creature Quest Loot</title>
</head>
<body>
    <h1>Creature Quest Loot Editor</h1>

    <form method="post">
        <!-- Search Fields -->
        <h3>Search</h3>
        Creature Search Id: <input type="number" name="search_creature_id" value=""><br>
        Item Search Id: <input type="number" name="search_item_id" value=""><br>
        <input type="submit" name="search" value="Search"><br>

        <!-- Creature Loot Template Fields -->
        <h3>Creature Loot Template</h3>
        Creature Id: <input type="number" name="entry" value="<?php echo htmlspecialchars($creature['entry'] ?? ''); ?>"><br>
        Item Id: <input type="number" name="item" value="<?php echo htmlspecialchars($creature['item'] ?? ''); ?>"><br>
        Chance to drop +/-: <input type="number" step="0.01" name="chance" value="<?php echo htmlspecialchars($creature['ChanceOrQuestChance'] ?? ''); ?>"><br>
        Loot Mode: 
        <select name="loot_mode">
            <option value="1" <?php echo (isset($creature['lootmode']) && $creature['lootmode'] == 1) ? 'selected' : ''; ?>>Normal</option>
            <option value="2" <?php echo (isset($creature['lootmode']) && $creature['lootmode'] == 2) ? 'selected' : ''; ?>>Heroic</option>
            <option value="4" <?php echo (isset($creature['lootmode']) && $creature['lootmode'] == 4) ? 'selected' : ''; ?>>Raid</option>
        </select><br>
        Group Id: <input type="number" name="group_id" value="<?php echo htmlspecialchars($creature['groupid'] ?? ''); ?>"><br>
        Min Amt Dropped or Ref +/-: <input type="number" name="min_count" value="<?php echo htmlspecialchars($creature['mincountOrRef'] ?? ''); ?>"><br>
        Max Amt Dropped: <input type="number" name="max_count" value="<?php echo htmlspecialchars($creature['maxcount'] ?? ''); ?>"><br>

        <!-- Conditions Fields -->
        <h3>Conditions</h3>
        Source Type or Ref: <input type="number" name="source_type" value="<?php echo htmlspecialchars($condition['SourceTypeOrReferenceId'] ?? ''); ?>"><br>
        Source Group: <input type="number" name="source_group" value="<?php echo htmlspecialchars($condition['SourceGroup'] ?? ''); ?>"><br>
        Source Entry: <input type="number" name="source_entry" value="<?php echo htmlspecialchars($condition['SourceEntry'] ?? ''); ?>"><br>
        Source Id: <input type="number" name="source_id" value="<?php echo htmlspecialchars($condition['SourceId'] ?? ''); ?>"><br>
        Else Group Id: <input type="number" name="else_group" value="<?php echo htmlspecialchars($condition['ElseGroup'] ?? ''); ?>"><br>
        Condition Type or Ref +/-: <input type="number" name="condition_type" value="<?php echo htmlspecialchars($condition['ConditionTypeOrReference'] ?? ''); ?>"><br>
        Condition Target: <input type="number" name="condition_target" value="<?php echo htmlspecialchars($condition['ConditionTarget'] ?? ''); ?>"><br>
        Condition 1: <input type="number" name="condition1" value="<?php echo htmlspecialchars($condition['ConditionValue1'] ?? ''); ?>"><br>
        Condition 2: <input type="number" name="condition2" value="<?php echo htmlspecialchars($condition['ConditionValue2'] ?? ''); ?>"><br>
        Condition 3: <input type="number" name="condition3" value="<?php echo htmlspecialchars($condition['ConditionValue3'] ?? ''); ?>"><br>
        Negative Condition: <input type="number" name="negative_condition" value="<?php echo htmlspecialchars($condition['NegativeCondition'] ?? ''); ?>"><br>
        Error Text: <input type="number" name="error_text" value="<?php echo htmlspecialchars($condition['ErrorTextId'] ?? ''); ?>"><br>
        Script Name: <input type="text" name="script_name" value="<?php echo htmlspecialchars($condition['ScriptName'] ?? ''); ?>"><br>
        Notes: <input type="text" name="comment" value="<?php echo htmlspecialchars($condition['Comment'] ?? ''); ?>"><br>

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

