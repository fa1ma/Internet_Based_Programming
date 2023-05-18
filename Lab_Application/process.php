<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $servername = "127.0.0.1"; // Replace with your MySQL server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "lab_application"; // Replace with your MySQL database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO student (id, full_name, email, gender) VALUES ('$id','$full_name', '$email', '$gender')";

    if ($conn->query($sql) === true) {
        $response = "SUCCESSFULLY ADDED.";
    } else {
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("Location: index.html?response=" . urlencode($response));
    exit();
}
?>
