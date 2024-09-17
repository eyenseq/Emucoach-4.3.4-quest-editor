<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creature Form</title>
</head>
<body>
    <?php
    // Get the id and database credentials from the previous page
     $id = $_GET['id'];
    $ip = $_GET['ip'];
    $port = $_GET['port'];
    $user = $_GET['user'];
    $password = $_GET['password'];
    $dbname = $_GET['dbname'];

    // Create connection
    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $creatureStart = isset($_POST['creatureStart']) ? $_POST['creatureStart'] : '';
        $creatureEnd = isset($_POST['creatureEnd']) ? $_POST['creatureEnd'] : '';

        // Use INSERT ... ON DUPLICATE KEY UPDATE for saving and updating entries
        if (!empty($creatureStart)) {
            $sqlSaveStart = "INSERT INTO creature_queststarter (id, quest) VALUES ('$creatureStart', '$id') 
                             ON DUPLICATE KEY UPDATE id='$creatureStart'";
            $conn->query($sqlSaveStart);
        }

        if (!empty($creatureEnd)) {
            $sqlSaveEnd = "INSERT INTO creature_questender (id, quest) VALUES ('$creatureEnd', '$id') 
                           ON DUPLICATE KEY UPDATE id='$creatureEnd'";
            $conn->query($sqlSaveEnd);
        }
    }

    // Fetch Creature Start and Creature End data
    $creatureStart = "";
    $creatureEnd = "";

    $sqlStart = "SELECT id FROM creature_queststarter WHERE quest = '$id'";
    $resultStart = $conn->query($sqlStart);
    if ($resultStart->num_rows > 0) {
        $rowStart = $resultStart->fetch_assoc();
        $creatureStart = $rowStart['id'];
    }

    $sqlEnd = "SELECT id FROM creature_questender WHERE quest = '$id'";
    $resultEnd = $conn->query($sqlEnd);
    if ($resultEnd->num_rows > 0) {
        $rowEnd = $resultEnd->fetch_assoc();
        $creatureEnd = $rowEnd['id'];
    }

    // Search functionality for Creature Name
    $creatureName = isset($_GET['creatureName']) ? $_GET['creatureName'] : '';
    $searchResults = [];

    if (!empty($creatureName)) {
        $sqlSearch = "SELECT entry, name FROM creature_template WHERE name LIKE '%$creatureName%'";
        $resultSearch = $conn->query($sqlSearch);
        if ($resultSearch->num_rows > 0) {
            while($rowSearch = $resultSearch->fetch_assoc()) {
                $searchResults[] = $rowSearch;
            }
        }
    }

    // Search existing start functionality
    $searchStartResults = [];
    if (isset($_GET['searchStart']) && $_GET['searchStart'] === 'true') {
        $sqlSearchStart = "SELECT id, quest FROM creature_queststarter WHERE quest = '$id'";
        $resultSearchStart = $conn->query($sqlSearchStart);
        if ($resultSearchStart->num_rows > 0) {
            while($rowSearchStart = $resultSearchStart->fetch_assoc()) {
                $searchStartResults[] = $rowSearchStart;
            }
        }
    }

    // Search existing end functionality
    $searchEndResults = [];
    if (isset($_GET['searchEnd']) && $_GET['searchEnd'] === 'true') {
        $sqlSearchEnd = "SELECT id, quest FROM creature_questender WHERE quest = '$id'";
        $resultSearchEnd = $conn->query($sqlSearchEnd);
        if ($resultSearchEnd->num_rows > 0) {
            while($rowSearchEnd = $resultSearchEnd->fetch_assoc()) {
                $searchEndResults[] = $rowSearchEnd;
            }
        }
    }

    // Delete functionality
    if (isset($_GET['deleteStartId'])) {
        $deleteStartId = $_GET['deleteStartId'];
        $sqlDeleteStart = "DELETE FROM creature_queststarter WHERE id = '$deleteStartId'";
        $conn->query($sqlDeleteStart);
    }

    if (isset($_GET['deleteEndId'])) {
        $deleteEndId = $_GET['deleteEndId'];
        $sqlDeleteEnd = "DELETE FROM creature_questender WHERE id = '$deleteEndId'";
        $conn->query($sqlDeleteEnd);
    }

    $conn->close();
    ?>

    <!-- HTML Form and Search Results Display -->
    <h3>Creature Form</h3>
    <form method="post" onsubmit="return confirmSave()">
        <label for="creatureStart">Creature Start:</label>
        <input type="text" id="creatureStart" name="creatureStart" value="<?php echo htmlspecialchars($creatureStart); ?>"><br>

        <label for="creatureEnd">Creature End:</label>
        <input type="text" id="creatureEnd" name="creatureEnd" value="<?php echo htmlspecialchars($creatureEnd); ?>"><br>

        <input type="submit" value="Save">
    </form>

    <h3>Search Creature</h3>
    <input type="text" id="creatureName" name="creatureName" placeholder="Enter creature name">
    <button type="button" onclick="searchCreature()">Search</button>
    <?php if (!empty($searchResults)): ?>
        <h3>Search Results:</h3>
        <table border="1">
            <tr>
                <th>Entry</th>
                <th>Name</th>
            </tr>
            <?php foreach ($searchResults as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['entry']); ?></td>
                <td><?php echo htmlspecialchars($result['name']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <button type="button" onclick="searchExistingStart()">Search Existing Start</button>
    <button type="button" onclick="searchExistingEnd()">Search Existing End</button>

    <?php if (!empty($searchStartResults)): ?>
        <h3>Existing Start Search Results:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Quest</th>
                <th>Action</th>
            </tr>
            <?php foreach ($searchStartResults as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['id']); ?></td>
                <td><?php echo htmlspecialchars($result['quest']); ?></td>
                <td>
                    <button type="button" onclick="confirmDelete('start', <?php echo htmlspecialchars($result['id']); ?>)">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php if (!empty($searchEndResults)): ?>
        <h3>Existing End Search Results:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Quest</th>
                <th>Action</th>
            </tr>
            <?php foreach ($searchEndResults as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['id']); ?></td>
                <td><?php echo htmlspecialchars($result['quest']); ?></td>
                <td>
                    <button type="button" onclick="confirmDelete('end', <?php echo htmlspecialchars($result['id']); ?>)">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <script>
        function confirmSave() {
            return confirm("Are you sure you want to save changes?");
        }

        function searchCreature() {
            var creatureName = document.getElementById('creatureName').value;
            var url = window.location.href.split('?')[0] + '?id=<?php echo htmlspecialchars($id); ?>&ip=<?php echo htmlspecialchars($ip); ?>&port=<?php echo htmlspecialchars($port); ?>&user=<?php echo htmlspecialchars($user); ?>&password=<?php echo htmlspecialchars($password); ?>&dbname=<?php echo htmlspecialchars($dbname); ?>&creatureName=' + creatureName;
            window.location.href = url;
        }

        function searchExistingStart() {
            var url = window.location.href.split('?')[0] + '?id=<?php echo htmlspecialchars($id); ?>&ip=<?php echo htmlspecialchars($ip); ?>&port=<?php echo htmlspecialchars($port); ?>&user=<?php echo htmlspecialchars($user); ?>&password=<?php echo htmlspecialchars($password); ?>&dbname=<?php echo htmlspecialchars($dbname); ?>&searchStart=true';
            window.location.href = url;
        }

        function searchExistingEnd() {
            var url = window.location.href.split('?')[0] + '?id=<?php echo htmlspecialchars($id); ?>&ip=<?php echo htmlspecialchars($ip); ?>&port=<?php echo htmlspecialchars($port); ?>&user=<?php echo htmlspecialchars($user); ?>&password=<?php echo htmlspecialchars($password); ?>&dbname=<?php echo htmlspecialchars($dbname); ?>&searchEnd=true';
            window.location.href = url;
        }

        function confirmDelete(type, id) {
            if (confirm("Are you sure you want to delete this entry?")) {
                var url = window.location.href.split('?')[0] + '?id=<?php echo htmlspecialchars($id); ?>&ip=<?php echo htmlspecialchars($ip); ?>&port=<?php echo htmlspecialchars($port); ?>&user=<?php echo htmlspecialchars($user); ?>&password=<?php echo htmlspecialchars($password); ?>&dbname=<?php echo htmlspecialchars($dbname); ?>';
                if (type === 'start') {
                    url += '&deleteStartId=' + id;
                } else if (type === 'end') {
                    url += '&deleteEndId=' + id;
                }
                window.location.href = url;
            }
        }
    </script>
</body>
</html>
