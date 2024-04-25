<?php 

require_once 'post.php';
include 'connect.php';
session_start();

// Debugging statement to check the $_POST array
// var_dump($_POST);

// Ensure that the 'content' key exists in the $_POST array
if(isset($_POST['content'])) {
    $content = $_POST['content'];
    try {
        // Your existing code for creating a Post object and inserting into the database
        $post = new Post($content, $conn);
        $post->createPost();
    } catch (InvalidArgumentException $e) {
        // Catch and handle the exception
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: 'content' key is not set in the \$_POST array.";
}

?>



?>




<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <title>talkpalestine</title>
    
    <link href="vendor\twbs\bootstrap\dist\css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
      html {
        height: 100%;
      }
      body{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url('handala.jpg');
    background-size: cover;
    background-position: center
      }
      .content{
        max-width: 800px;
  margin: 0 auto;
  background: linear-gradient(to bottom, #007bff, #00bfff);
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

    </style>
  
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
    <p class="text-dark  my-2 mx-5 fs-3 text-wrap" >talkpalestine</p>
    <div class="d-flex">
    <button class="btn btn-danger mr-sm-2"><a href="accueil.php"> home</a></button> </div>
</nav>
  
</header>
<div class="content">
  <form method="POST">
    <textarea placeholder="talk about palestine" name="content"></textarea>
    <button class="btn btn-dark">publier</button>
  </form>


</diV>
    
</body>
</html>