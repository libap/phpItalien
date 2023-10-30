<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que la page est appelée via une requête POST

    // Récupérez les données du formulaire
    $entryId = $_POST['id'];
    $newImage = $_POST['image'];
    $newTitre = $_POST['titre'];
    $newDescription = $_POST['description'];
    // ...

    // Effectuez la mise à jour des données dans la base de données (vous devez implémenter la logique de connexion à la base de données)
    // Assurez-vous d'éviter les failles de sécurité (injections SQL) en utilisant des requêtes préparées.

    // Exemple de requête SQL pour la mise à jour (vous devez adapter cela à votre schéma de base de données)
    $db = new PDO('sqlite:db/database.db');
    $updateQuery = "UPDATE entree SET image = :image, nom = :titre, description = :description WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':id', $entryId, PDO::PARAM_INT);
    $stmt->bindParam(':image', $newImage, PDO::PARAM_STR);
    $stmt->bindParam(':titre', $newTitre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // La mise à jour a réussi
        header("Location: admin.php");
        exit;
    } else {
        // La mise à jour a échoué, vous pouvez gérer l'erreur en conséquence
        echo "Erreur lors de la mise à jour.";
    }
} else {
    // Redirigez l'utilisateur vers admin.php s'il accède directement à cette page sans utiliser POST
    header("Location: admin.php");
    exit;
}
?>
