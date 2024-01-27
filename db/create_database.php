<?php
// Création de la base de données SQLite
$db = new SQLite3('database.db');

// Création de la table "entree"
$createEntreeTableQuery = "
    CREATE TABLE IF NOT EXISTS entrees (
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

// Création de la table "boissons"
$createBoissonsTableQuery = "
    CREATE TABLE IF NOT EXISTS boissons (
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

// Création de la table "plats"
$createPlatsTableQuery = "
    CREATE TABLE IF NOT EXISTS plats (
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

// Création de la table "desserts"
$createDessertsTableQuery = "
    CREATE TABLE IF NOT EXISTS desserts (
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
        groupe_id BOOLEAN
    )
";

$db->exec($createEntreeTableQuery);
$db->exec($createBoissonsTableQuery);
$db->exec($createPlatsTableQuery);
$db->exec($createDessertsTableQuery);
$db->exec($createAdminsTableQuery);

// Insertion de données de test dans la table "entree"
/*
$insertDataEntreeQuery = "
    INSERT INTO entrees (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Entrée 1', 'image1.jpg', NULL, 10.99, 'Description de l entrée 1', 1, 0, 1, 0, 1),
        ('Entrée 2', 'image2.jpg', NULL, 9.99, 'Description de l entrée 2', 0, 1, 0, 1, 0)
";

$insertDataBoissonsQuery = "
    INSERT INTO boissons (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Boisson 1', 'image1.jpg', NULL, 2.50, 'Description de la boisson 1', 1, 0, 1, 0, 1),
        ('Boisson 2', 'image2.jpg', NULL, 1.99, 'Description de la boisson 2', 0, 1, 0, 1, 0)
";

$insertDataPlatsQuery = "
    INSERT INTO plats (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Plat 1', 'image1.jpg', NULL, 15.99, 'Description du plat 1', 1, 0, 1, 0, 1),
        ('Plat 2', 'image2.jpg', NULL, 12.99, 'Description du plat 2', 0, 1, 0, 1, 0)
";

$insertDataDessertsQuery = "
    INSERT INTO desserts (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Dessert 1', 'image1.jpg', NULL, 5.99, 'Description du dessert 1', 1, 0, 1, 0, 1),
        ('Dessert 2', 'image2.jpg', NULL, 4.99, 'Description du dessert 2', 0, 1, 0, 1, 0)
";
*/

$superAdminNom = 'admin';
$superAdminEmail = 'superadmin@example.com';
$superAdminMotDePasse = password_hash('mdp', PASSWORD_BCRYPT);
$superAdminGroupeId = 1; // TRUE pour le groupe_id

$insertSuperAdminQuery = "
    INSERT INTO administrateurs (nom, email, mot_de_passe, groupe_id) VALUES
    ('$superAdminNom', '$superAdminEmail', '$superAdminMotDePasse', $superAdminGroupeId)
";

$clientNom = 'jm';
$clientEmail = 'client@example.com';
$clientMotDePasse = password_hash('mdp', PASSWORD_BCRYPT);
$clientGroupeId = 0; // Valeur booléenne (true) pour le groupe_id

$insertClientQuery = "
    INSERT INTO administrateurs (nom, email, mot_de_passe, groupe_id) VALUES
    ('$clientNom', '$clientEmail', '$clientMotDePasse', $clientGroupeId)
";
/*
$db->exec($insertDataEntreeQuery);
$db->exec($insertDataBoissonsQuery);
$db->exec($insertDataPlatsQuery);
$db->exec($insertDataDessertsQuery);
*/
$db->exec($insertSuperAdminQuery);
$db->exec($insertClientQuery);

$selectEntreeQuery = "SELECT * FROM entrees";
$resultEntree = $db->query($selectEntreeQuery);

if ($resultEntree) {
    $dataEntree = [];
    while ($row = $resultEntree->fetchArray(SQLITE3_ASSOC)) {
        $dataEntree[] = $row;
    }
} else {
    $dataEntree = [];
}

// Récupérer les données de la table "administrateurs"
$selectAdminsQuery = "SELECT * FROM Administrateurs";
$resultAdmins = $db->query($selectAdminsQuery);

if ($resultAdmins) {
    $dataAdmins = [];
    while ($row = $resultAdmins->fetchArray(SQLITE3_ASSOC)) {
        $dataAdmins[] = $row;
    }
} else {
    $dataAdmins = [];
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

echo "Base de données créée, données insérées et affichées avec succès."
?>
