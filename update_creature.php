<?php
// Retrieve form data
$id = $_POST['questStart'];
$creatureStart = $_POST['creatureStart'];
$creatureEnd = $_POST['creatureEnd'];
$ip = $_POST['ip'];
$port = $_POST['port'];
$user = $_POST['user'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];

// Print database credentials for debugging (remove this in production)
echo "IP: $ip<br>";
echo "Port: $port<br>";
echo "User: $user<br>";
echo "Password: $password<br>";
echo "DBName: $dbname<br>";

// Create connection
$conn = new mysqli($ip, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update creature_queststarter
$sqlStart = "REPLACE INTO creature_queststarter (id, quest) VALUES ('$creatureStart', '$id')";
if ($conn->query($sqlStart) === TRUE) {
    echo "Creature Start updated successfully.<br>";
} else {
    echo "Error updating Creature Start: " . $conn->error . "<br>";
}

// Update creature_questender
$sqlEnd = "REPLACE INTO creature_questender (id, quest) VALUES ('$creatureEnd', '$id')";
if ($conn->query($sqlEnd) === TRUE) {
    echo "Creature End updated successfully.<br>";
} else {
    echo "Error updating Creature End: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
