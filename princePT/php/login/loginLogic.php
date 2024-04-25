<?php

// Database credentials (replace with your actual values)
$dbHost = 'localhost';
$dbName = 'princetp';  // Assuming your database name is 'princetp'
$dbUsername = 'root';
$dbPassword = '';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to database: " . $e->getMessage();
    exit;
}

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = $_POST["password"]; 

$sql = "SELECT userId, email,pass FROM users WHERE email = :email"; 
$stmt = $db->prepare($sql);

try {
    $stmt->execute([':email' => $email]); 
} catch (PDOException $e) {
    echo "Error executing query: " . $e->getMessage();
    exit;
}

$user = $stmt->fetch(PDO::FETCH_ASSOC); 

if ($user) {
    if (password_verify($password, $user["pass"])){
        echo "Login successful!"; 
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$db = null; 