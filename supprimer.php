<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Récupérez l'ID à partir des données POST
    $entryId = $_POST['id'];

    // Placez ici votre code pour la connexion à la base de données
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête de suppression
    $deleteQuery = "DELETE FROM entree WHERE id = :id";

    // Préparez la requête
    $stmt = $db->prepare($deleteQuery);
    $stmt->bindParam(':id', $entryId, PDO::PARAM_INT);

    // Exécutez la requête de suppression
    if ($stmt->execute()) {
        // Redirigez vers la page principale ou faites d'autres actions
        header('Location: admin.php');
        exit;
    } else {
        // Gérez l'erreur de suppression, affichez un message d'erreur, etc.
        echo "Erreur lors de la suppression.";
    }
} else {
    // Redirigez vers la page principale ou affichez un message d'erreur si l'ID n'est pas fourni
    header('Location: admin.php');
    exit;
}
?>
