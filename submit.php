<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_data";

try {
    // Establishing a connection to the database using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    // Prepare SQL statement to insert data into table
    $stmt = $conn->prepare("INSERT INTO form_info (fname,lname, email, phone, message) VALUES (:fname, :lname, :email, :phone, :message)");

    // Bind parameters and execute the statement
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    echo "New record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null; // Close connection
?>
