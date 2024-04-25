<?php

class Bloggers {
    private $id;
    private $username;
    private $email;
    private $motdepasse;
    private $country;
    private $conn;

    public function __construct( $username, $email, $motdepasse, $country, $conn) {
        
        $this->username = $username;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->country = $country;
        $this->conn = $conn;
    }

    public function createBloggers() {
        $sql = "INSERT INTO bloggers (username, email, motdepasse, country) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->username, $this->email, $this->motdepasse, $this->country]);
    }

    public function authenticate() {
        $query = "SELECT * FROM bloggers WHERE username = :username AND motdepasse = :motdepasse";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':motdepasse', $this->motdepasse);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        if ($count > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['email'] = $user['email']; // Utilisez $user au lieu de $bloggers
            return true;
        } else {
            return false;
        }
    }
}

