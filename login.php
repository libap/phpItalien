<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="login.php" method="POST">
    <div>
        <label for="identifiant">Identifiant :</label>
        <input type="text" id="identifiant" name="identifiant" required>
    </div>
    <div>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
    </div>
    <div>
        <button type="submit">Se Connecter</button>
    </div>
</form>

</body>
</html>
<?php
//GERER LA CONNEXION ICI
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
            $_SESSION['user_nom'] = $admin['nom'];
            $_SESSION['user_groupe'] = $admin['groupe_id'];
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
