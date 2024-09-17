<?php
if (isset($_GET['id']) && isset($_GET['ip']) && isset($_GET['port']) && isset($_GET['user']) && isset($_GET['password']) && isset($_GET['dbname'])) {
    $id = $_GET['id'];
    $ip = $_GET['ip'];
    $port = $_GET['port'];
    $user = $_GET['user'];
    $password = $_GET['password'];
    $dbname = $_GET['dbname'];

    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Id FROM quest_template WHERE Id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "used";
    } else {
        echo "unused";
    }

    $conn->close();
}
?>
