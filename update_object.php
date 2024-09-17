<?php
// Retrieve form data
$id = $_POST['questStart'];
$gameobjectStart = $_POST['gameobjectStart'];
$gameobjectEnd = $_POST['gameobjectEnd'];
$ip = $_POST['ip'];
$port = $_POST['port'];
$user = $_POST['user'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];

// Create connection
$conn = new mysqli($ip, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update gameobject_queststarter
$sqlStart = "REPLACE INTO gameobject_queststarter (id, quest) VALUES ('$gameobjectStart', '$id')";
if ($conn->query($sqlStart) === TRUE) {
    echo "Object Start updated successfully.<br>";
} else {
    echo "Error updating Object Start: " . $conn->error . "<br>";
}

// Update gameobject_questender
$sqlEnd = "REPLACE INTO gameobject_questender (id, quest) VALUES ('$gameobjectEnd', '$id')";
if ($conn->query($sqlEnd) === TRUE) {
    echo "Object End updated successfully.<br>";
} else {
    echo "Error updating Object End: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
