<?php
$dsn = 'mysql:host=localhost;dbname=gazablogers;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $PDO = new PDO($dsn, $username, $password);
    
    // Set PDO to throw exceptions for errors
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $PDO->exec("CREATE TABLE post (
        id_post INT AUTO_INCREMENT PRIMARY KEY,
        blogger_id INT,
        content varchar(600) NOT NULL,
        FOREIGN KEY(blogger_id) REFERENCES bloggers(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    
    echo 'Table "post" created successfully.';
} catch(PDOException $e) {
    // If an error occurs, handle it here
    echo 'Error creating table: ' . $e->getMessage();
}
?>

