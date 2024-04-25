<?php
class Post {
    private $id_post;
    private $blogger_id;
    private $content;
    private $conn; 

    public function __construct($content, $conn) {
        // Check if $content is not empty or null
        if (!empty($content)) {
            $this->content = $content;
        } else {
            // Handle the case where $content is empty or null
            throw new InvalidArgumentException("Content cannot be empty");
        }
        $this->conn = $conn;
    }

    public function createPost() {
        $sql = "INSERT INTO post (content) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->content]);
    }
}
?>

