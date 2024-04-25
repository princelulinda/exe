<?php

function idGenerator($length = 32) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $id = '';

    for ($i = 0; $i < $length; $i++) {
        $id .= $chars[random_int(0, strlen($chars) - 1)];
    }

    return $id;
}

$dbHost = 'localhost';
$dbName = 'princetp';
$dbUsername = 'root';
$dbPassword = ''; 

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error connecting to database: " . $e->getMessage();
    exit;
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = strip_tags($_POST['name']); 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $idUser = idGenerator();

    $sql = 'INSERT INTO users(UserId, name, Email, pass) VALUES (?,?, ?, ?)';
    $stmt = $db->prepare($sql);

    try {
        $stmt->execute(array($idUser, $name,$email,$password));
        session_start();
        $_SESSION["idUser"] = $idUser;
    } catch (PDOException $e) {
        echo "Error creating user: " . $e->getMessage();
    }
} else {
    echo "Please fill out all required fields.";
}

?>
