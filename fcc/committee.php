<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "fcc";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve committees from the database
function getCommittees() {
    global $conn;
    $sql = "SELECT * FROM committees";
    $result = $conn->query($sql);

    $committees = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $committees[] = $row;
        }
    }

    return $committees;
}

// Example: Displaying committee data
$committees = getCommittees();

foreach ($committees as $committee) {
    echo "Committee ID: " . $committee['id'] . "<br>";
    echo "Name: " . $committee['name'] . "<br>";
    echo "Description: " . $committee['description'] . "<br>";
    echo "Members: " . $committee['members'] . "<br>";
    echo "<hr>";
}

// Close the database connection
$conn->close();
?>
