<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['identifiant']) && isset($_POST['mot_de_passe'])) {
    // Récupérez les données du formulaire
    $identifiant = $_POST['identifiant'];
    $motDePasse = $_POST['mot_de_passe'];

    // Placez ici votre code pour la connexion à la base de données
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête de sélection en fonction de l'identifiant
    $selectQuery = "SELECT * FROM administrateurs WHERE nom = :identifiant";

    // Préparez la requête
    $stmt = $db->prepare($selectQuery);
    $stmt->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérez l'enregistrement correspondant
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si un enregistrement correspondant a été trouvé
    if ($admin) {
        // Affichez le mot de passe stocké (crypté) et la version décodée fournie dans le formulaire
        //echo "Mot de passe stocké (crypté) : " . $admin['mot_de_passe'] . "<br>";
        //echo "Mot de passe fourni (décodé) : " . $motDePasse . "<br>";

        // Vérifiez le mot de passe
        if (password_verify($motDePasse, $admin['mot_de_passe'])) {
            // Mot de passe correct, connectez l'utilisateur
            session_start();
            $_SESSION['user_id'] = $admin['id'];
            header('Location: admin.php');
            exit;
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Identifiant incorrect
        echo "Identifiant incorrect.";
    }
} else {
    // Redirigez vers la page de connexion si le formulaire n'a pas été soumis
    //header('Location: login.php');
    echo "Première condition failed";
    exit;
}
?>
