<?php
// Database connection
$servername = "localhost";
$username = "username"; // Replace with your MySQL username
$password = "password"; // Replace with your MySQL password
$dbname = "blog_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = $_POST["blog_id"];

    // SQL query to delete the blog from the database
    $sql = "DELETE FROM blogs WHERE blog_id = '$blog_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Blog deleted successfully";
    } else {
        echo "Error deleting blog: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
