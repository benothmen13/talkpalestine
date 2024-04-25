<?php

// Connexion à la base de données avec PDO
$host = 'localhost'; // Adresse du serveur de la base de données
$dbname ='gazablogers'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Requête pour récupérer les noms depuis une table nommée ''
$query = "SELECT content FROM post";

// Préparation et exécution de la requête
$stmt = $pdo->prepare($query);
$stmt->execute();

// Récupération des résultats dans un tableau associatif
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            background-image: url('flag.jpg');
            background-size: cover;
            background-position: center;
        }
        .ctn{
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(green,white);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        h2{
          color:red; 
        
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
            <p class="text-dark  my-2 mx-5 fs-3 text-wrap" >talkpalestine</p>
            <div class="d-flex">
                <button class="btn btn-danger mr-sm-2"><a href="publier.php"> publier</a></button>
            </div>
        </nav>
    </header>
    <div class="ctn">
        <h2>latest news</h2>
        <table>
            <thead>
                <tr>
                    <th>latest news</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $news): ?>
                    <tr>
                        <td><?= $news['content'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
