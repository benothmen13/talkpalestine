<?php
// Database connection parameters
$dsn = 'mysql:host=localhost;dbname=gazablogers;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $PDO = new PDO($dsn, $username, $password);
    
    // Set PDO to throw exceptions for errors
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Your SQL query to create the table goes here
    $PDO->exec("CREATE TABLE bloggers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(55) NOT NULL,
        email VARCHAR(55) NOT NULL,
        motdepasse VARCHAR(55) NOT NULL,
        content TEXT,
        country VARCHAR(55)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

  

    echo 'Table "bloggers" created successfully.';
} catch(PDOException $e) {
    // If an error occurs, handle it here
    echo 'Error creating table: ' . $e->getMessage();
}
?>

