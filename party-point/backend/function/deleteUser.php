<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mydb";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM newusers WHERE id = ?";

    // Prepare the statement
    if ($stmt = $connection->prepare($sql)) {
        // Bind the ID parameter to the query
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the main page after deletion
            header("Location:../../frontend/components/admin.php?action=Admin"); // Update with your actual page
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $connection->error;
    }
} else {
    echo "Invalid request. No ID parameter provided.";
}

// Close the database connection
$connection->close();
?>
