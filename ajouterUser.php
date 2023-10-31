<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPseudo = $_POST['pseudo'];
    $newMotDePasse = $_POST['mot_de_passe'];

    // Assurez-vous d'ajouter d'autres validations ou vérifications de sécurité avant d'ajouter l'utilisateur à la base de données.

    // Placez ici votre code pour la connexion à la base de données
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête d'insertion
    $insertQuery = "INSERT INTO administrateurs (nom, mot_de_passe, groupe_id) VALUES (:pseudo, :mot_de_passe, :groupe_id)";

    // Vérifiez si la case à cocher a été cochée
    if (isset($_POST['SuperUser']) && $_POST['SuperUser'] === 'on') {
        $groupeId = 1; // SuperAdmin
    } else {
        $groupeId = 0; // Autre groupe (par exemple, Client)
    }

    // Préparez la requête
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':pseudo', $newPseudo, PDO::PARAM_STR);
    $stmt->bindParam(':mot_de_passe', password_hash($newMotDePasse, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $stmt->bindParam(':groupe_id', $groupeId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'administrateur.";
    }
} else {
    header("Location: admin.php");
    exit;
}

?>
