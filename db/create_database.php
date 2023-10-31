<?php
// Création de la base de données SQLite
$db = new SQLite3('database.db');

// Création de la table "entree"
$createTableQuery = "
    CREATE TABLE IF NOT EXISTS entree (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
        image TEXT,
        nom_fichier TEXT DEFAULT NULL,
        prix DECIMAL(6, 2),
        description TEXT,
        lundi BOOLEAN,
        mardi BOOLEAN,
        mercredi BOOLEAN,
        jeudi BOOLEAN,
        vendredi BOOLEAN
    )
";

$createAdminsTableQuery = "
    CREATE TABLE IF NOT EXISTS administrateurs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
        email TEXT,
        mot_de_passe TEXT,
        groupe_id INTEGER
    )
";

$createGroupesTableQuery = "
    CREATE TABLE IF NOT EXISTS groupes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT
    )
";

$db->exec($createTableQuery);
$db->exec($createAdminsTableQuery);
$db->exec($createGroupesTableQuery);

// Insertion de données de test dans la table "entree"
$insertDataQuery = "
    INSERT INTO entree (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Entrée 1', 'image1.jpg', NULL, 10.99, 'Description de l entrée 1', 1, 0, 1, 0, 1),
        ('Entrée 2', 'image2.jpg', NULL, 9.99, 'Description de l entrée 2', 0, 1, 0, 1, 0)
";

$superAdminNom = 'admin';
$superAdminEmail = 'superadmin@example.com';
$superAdminMotDePasse = password_hash('mdp', PASSWORD_BCRYPT);
$superAdminGroupeId = 1; // L'ID du groupe Super Admin

$insertSuperAdminQuery = "
    INSERT INTO administrateurs (nom, email, mot_de_passe, groupe_id) VALUES
    ('$superAdminNom', '$superAdminEmail', '$superAdminMotDePasse', $superAdminGroupeId)
";

$clientNom = 'jm';
$clientEmail = 'client@example.com';
$clientMotDePasse = password_hash('mdp', PASSWORD_BCRYPT);
$clientGroupeId = 2; // L'ID du groupe Client

$insertClientQuery = "
    INSERT INTO administrateurs (nom, email, mot_de_passe, groupe_id) VALUES
    ('$clientNom', '$clientEmail', '$clientMotDePasse', $clientGroupeId)
";

$db->exec($insertDataQuery);
$db->exec($insertSuperAdminQuery);
$db->exec($insertClientQuery);

$selectQuery = "SELECT * FROM entree";
$result = $db->query($selectQuery);

if ($result) {
    $dataEntree = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $dataEntree[] = $row;
    }
} else {
    $dataEntree = [];
}

// Récupérer les données de la table "administrateurs"
$selectAdminsQuery = "SELECT * FROM administrateurs";
$resultAdmins = $db->query($selectAdminsQuery);

if ($resultAdmins) {
    $dataAdmins = [];
    while ($row = $resultAdmins->fetchArray(SQLITE3_ASSOC)) {
        $dataAdmins[] = $row;
    }
} else {
    $dataAdmins = [];
}

// Récupérer les données de la table "groupes"
$selectGroupesQuery = "SELECT * FROM groupes";
$resultGroupes = $db->query($selectGroupesQuery);

if ($resultGroupes) {
    $dataGroupes = [];
    while ($row = $resultGroupes->fetchArray(SQLITE3_ASSOC)) {
        $dataGroupes[] = $row;
    }
} else {
    $dataGroupes = [];
}

// Fermer la base de données
$db->close();

// Afficher toutes les données
echo "Données de la table 'entree':<br>";
print_r($dataEntree);

echo "<br><br>";

echo "Données de la table 'administrateurs':<br>";
print_r($dataAdmins);

echo "<br><br>";

echo "Données de la table 'groupes':<br>";
print_r($dataGroupes);

echo "<br><br>";

echo "Base de données créée, données insérées et affichées avec succès."
?>
