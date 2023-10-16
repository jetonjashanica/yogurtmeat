<?php

// Connect to database
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=yogurt', 'root' , '');
} catch (PDOException $e) {
    echo '<p>Whoops, something went wrong</p>';
    echo '<br>';
    echo '<a href="http://localhost/project-yogurt/">Back to homepage</a>';
    exit();
}

$custumer = [
    'name' => isset($_POST['name']) ? $_POST['name'] : NULL,
    'email' => isset($_POST['email']) ? $_POST['email'] : NULL,
    'created_at' => date("Y-m-d"),
];

$db -> prepare("
    INSERT INTO newsletter (name, email, created_at) VALUES (:name, :email, :created_at)
    ") -> execute($custumer);

// Redirect browser
header("http://localhost/project-yogurt/");
exit();