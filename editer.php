<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entryId = $_POST['id'];
    $newImage = $_POST['image'];
    $newTitre = $_POST['titre'];
    $newDescription = $_POST['description'];

    $db = new PDO('sqlite:db/database.db');
    $updateQuery = "UPDATE entree SET image = :image, nom = :titre, description = :description, lundi = :lundi, mardi = :mardi, mercredi = :mercredi, jeudi = :jeudi, vendredi = :vendredi WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':id', $entryId, PDO::PARAM_INT);
    $stmt->bindParam(':image', $newImage, PDO::PARAM_STR);
    $stmt->bindParam(':titre', $newTitre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);

    // Vous pouvez récupérer les valeurs des cases cochées ici
    $lundi = isset($_POST['input-editer-lundi']) ? 1 : 0;
    $mardi = isset($_POST['input-editer-mardi']) ? 1 : 0;
    $mercredi = isset($_POST['input-editer-mercredi']) ? 1 : 0;
    $jeudi = isset($_POST['input-editer-jeudi']) ? 1 : 0;
    $vendredi = isset($_POST['input-editer-vendredi']) ? 1 : 0;

    $stmt->bindParam(':lundi', $lundi, PDO::PARAM_INT);
    $stmt->bindParam(':mardi', $mardi, PDO::PARAM_INT);
    $stmt->bindParam(':mercredi', $mercredi, PDO::PARAM_INT);
    $stmt->bindParam(':jeudi', $jeudi, PDO::PARAM_INT);
    $stmt->bindParam(':vendredi', $vendredi, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour.";
    }
} else {
    header("Location: admin.php");
    exit;
}


?>

