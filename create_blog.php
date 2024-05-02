<?php
// Database connection parameters
$servername = "localhost"; // Replace with your database host
$username = "new_user"; // Replace with your database username
$password = "new_password"; // Replace with your database password
$dbname = "blog_database"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
    $blog_description = mysqli_real_escape_string($conn, $_POST['blog_description']);
    $blog_data = mysqli_real_escape_string($conn, $_POST['blog_data']);

    // Check if blog_id already exists
    $sql_check = "SELECT * FROM blogs WHERE blog_id='$blog_id'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "Error: Blog ID already exists.";
        $conn->close();
        exit();
    }

    // File upload handling
    // Your file upload code here...

    // Insert data into database
    $sql = "INSERT INTO blogs (blog_id, blog_description, blog_data, image_path)
            VALUES ('$blog_id', '$blog_description', '$blog_data', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
