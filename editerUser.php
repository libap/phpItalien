<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminId = $_POST['id'];
    $newPseudo = $_POST['pseudo'];
    
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête de mise à jour
    $updateQuery = "UPDATE administrateurs SET nom = :pseudo, groupe_id = :groupe_id";

    // Mettez à jour le mot de passe uniquement si un nouveau mot de passe est fourni
    if (!empty($_POST['mot_de_passe'])) {
        $newMotDePasse = $_POST['mot_de_passe'];
        $updateQuery .= ", mot_de_passe = :mot_de_passe";
    }

    $updateQuery .= " WHERE id = :id";

    // Préparez la requête
    $stmt = $db->prepare($updateQuery);
    
    // Liaison des variables
    $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);
    $stmt->bindParam(':pseudo', $newPseudo, PDO::PARAM_STR);
    
    // Récupérez le nom de la case à cocher en fonction de la valeur d'ID
    $checkboxName = 'id-' . $adminId;
    $groupe_id = isset($_POST[$checkboxName]) ? 1 : 0;
    
    $stmt->bindParam(':groupe_id', $groupe_id, PDO::PARAM_INT);

    // Mettez à jour le mot de passe uniquement si un nouveau mot de passe est fourni
    if (!empty($_POST['mot_de_passe'])) {
        $hashedPassword = password_hash($newMotDePasse, PASSWORD_BCRYPT);
        $stmt->bindParam(':mot_de_passe', $hashedPassword, PDO::PARAM_STR);
    }

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'administrateur.";
    }
} else {
    header("Location: admin.php");
    exit;
}
?>
