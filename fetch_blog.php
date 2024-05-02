<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $blog_id = $_POST["blog_id"];

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

        // SQL query to fetch blog details
        $sql = "SELECT * FROM blogs WHERE blog_id = '$blog_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the blog details
            while($row = $result->fetch_assoc()) {
                echo "<h2>Blog Details:</h2>";
                echo "<p><strong>Blog ID:</strong> " . $row['blog_id'] . "</p>";
                echo "<p><strong>Blog Description:</strong> " . $row['blog_description'] . "</p>";
                echo "<p><strong>Blog Data:</strong> " . $row['blog_data'] . "</p>";
                echo "<img src='" . $row['image_path'] . "' class='blog-image' alt='Blog Image'>";
            }
        } else {
            echo "Blog with ID: $blog_id not found";
        }

        // Close connection
        $conn->close();
    }
    ?>