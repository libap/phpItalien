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
        jour TEXT,
        prix DECIMAL(6, 2),
        description TEXT
    )
";

$db->exec($createTableQuery);

// Insertion de données de test dans la table "entree"
$insertDataQuery = "
    INSERT INTO entree (nom, image, nom_fichier, jour, prix, description)
    VALUES
        ('Entrée 1', 'image1.jpg', NULL, 'lundi', 10.99, 'Description de l entrée 1'),
        ('Entrée 2', 'image2.jpg', NULL, 'mardi', 9.99, 'Description de l entrée 2')
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
