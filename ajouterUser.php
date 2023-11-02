<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPseudo = $_POST['pseudo'];
    $newMotDePasse = $_POST['mot_de_passe'];
    
    // Vérifiez si la case à cocher "SuperUser" est cochée
    $groupeId = isset($_POST['SuperUser']) ? 1 : 0;

    // Placez ici votre code pour la connexion à la base de données (assurez-vous que la base de données est correctement configurée)
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête d'insertion
    $insertQuery = "INSERT INTO administrateurs (nom, mot_de_passe, groupe_id) VALUES (:pseudo, :mot_de_passe, :groupe_id)";

    // Préparez la requête
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':pseudo', $newPseudo, PDO::PARAM_STR);
    $stmt->bindParam(':mot_de_passe', password_hash($newMotDePasse, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $stmt->bindParam(':groupe_id', $groupeId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin.php"); // Redirigez vers la page d'administration ou toute autre page de succès
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'administrateur.";
    }
} else {
    header("Location: admin.php"); // Redirigez en cas de requête incorrecte (non-POST)
    exit;
}
?>
