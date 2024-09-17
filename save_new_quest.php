<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];
    $new_id = $_POST['new_id'];

    $conn = new mysqli($ip, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO quest_template (Id, CompletedText, Details, EndText, Objectives, ObjectiveText1, ObjectiveText2, ObjectiveText3, ObjectiveText4) VALUES ($new_id, '', '', '', '', '', '', '', '')";
    if ($conn->query($sql) === TRUE) {
        header("Location: quest.php?id=$new_id&ip=$ip&port=$port&user=$user&password=$password&dbname=$dbname");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    die("Invalid access.");
}
?>
