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
        lundi INTEGER DEFAULT 0,
        mardi INTEGER DEFAULT 0,
        mercredi INTEGER DEFAULT 0,
        jeudi INTEGER DEFAULT 0,
        vendredi INTEGER DEFAULT 0
     
    )
";

$db->exec($createTableQuery);

// Insertion de données de test dans la table "entree"
// Insertion de données de test dans la table "entree" avec des 1 pour chaque jour de la semaine
// Insertion de données de test dans la table "entree" avec des 1 pour chaque jour de la semaine
$insertDataQuery = "
    INSERT INTO entree (nom, image, nom_fichier, prix, description, lundi, mardi, mercredi, jeudi, vendredi)
    VALUES
        ('Entrée 1', 'image1.jpg', NULL, 10.99, 'Description de l entrée 1', 1, 1, 1, 1, 1),
        ('Entrée 2', 'image2.jpg', NULL, 9.99, 'Description de l entrée 2', 1, 1, 1, 1, 1)
";



$db->exec($insertDataQuery);

// Requête pour sélectionner toutes les données de la table "entree"
$selectQuery = "SELECT * FROM entree";
$result = $db->query($selectQuery);

if ($result) {
    $data = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }

    // Afficher les données avec print_r()
    print_r($data);
} else {
    echo "Aucun résultat trouvé.";
}

// Fermeture de la base de données
$db->close();

echo "Base de données créée, données insérées et affichées avec succès.";
?>
