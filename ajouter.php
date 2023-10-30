<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $image = $_POST['image'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $lundi = isset($_POST['lundi']) ? 1 : 0;
    $mardi = isset($_POST['mardi']) ? 1 : 0;
    $mercredi = isset($_POST['mercredi']) ? 1 : 0;
    $jeudi = isset($_POST['jeudi']) ? 1 : 0;
    $vendredi = isset($_POST['vendredi']) ? 1 : 0;
    $prix = $_POST['prix'];

    // Connexion à la base de données SQLite avec PDO
    $db = new PDO('sqlite:db/database.db');

    // Requête SQL d'insertion
    $insertQuery = "INSERT INTO entree (image, nom, description, lundi, mardi, mercredi, jeudi, vendredi, prix) VALUES (:image, :titre, :description, :lundi, :mardi, :mercredi, :jeudi, :vendredi, :prix)";

    // Préparation de la requête
    $stmt = $db->prepare($insertQuery);

    // Liaison des valeurs
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':lundi', $lundi, PDO::PARAM_INT);
    $stmt->bindParam(':mardi', $mardi, PDO::PARAM_INT);
    $stmt->bindParam(':mercredi', $mercredi, PDO::PARAM_INT);
    $stmt->bindParam(':jeudi', $jeudi, PDO::PARAM_INT);
    $stmt->bindParam(':vendredi', $vendredi, PDO::PARAM_INT);
    $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);

    // Exécution de la requête d'insertion
    if ($stmt->execute()) {
        // Rediriger vers une page de confirmation ou ailleurs
        header('Location: admin.php');
        exit;
    } else {
        echo "Erreur lors de l'insertion dans la base de données.";
    }
}
?>
