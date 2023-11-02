<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez l'ID de l'administrateur à supprimer
    $adminId = $_POST['id'];

    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête de suppression
    $deleteQuery = "DELETE FROM administrateurs WHERE id = :id";

    // Préparez la requête
    $stmt = $db->prepare($deleteQuery);
    $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de la suppression de l'administrateur.";
    }
} else {
    header("Location: admin.php");
    exit;
}
?>
