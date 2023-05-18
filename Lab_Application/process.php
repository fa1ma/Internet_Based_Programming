<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve the form data
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

// Connect to the database
    $servername = "127.0.0.1"; // Replace with your MySQL server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "lab_application"; // Replace with your MySQL database name

// Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Prepare and execute the SQL statement to insert the form data into a table
    $sql = "INSERT INTO student (id, full_name, email, gender) VALUES ('$id','$full_name', '$email', '$gender')";

    if ($conn->query($sql) === true) {
        $response = "SUCCESSFULLY ADDED.";
    } else {
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }

// Close the database connection
    $conn->close();

// Send the response back to the client
    header("Location: index.html?response=" . urlencode($response));
    exit();
}
?>