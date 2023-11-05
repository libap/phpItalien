<?php 
//Vérifier utilisateur connecté
    session_start();
    //var_dump($_SESSION);

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_nom']) && isset($_SESSION['user_groupe'])) {
        // Récupérez l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user_id'];
    
        
        // Placez ici votre code pour la connexion à la base de données
        $db = new PDO('sqlite:db/database.db');
    
        // Préparez la requête de sélection en fonction de l'ID de l'utilisateur
        $selectQuery = "SELECT id, nom, groupe_id FROM administrateurs WHERE id = :userId";
    
        // Préparez la requête
        $stmt = $db->prepare($selectQuery);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        // Récupérez l'enregistrement correspondant
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Stockez le nom et le groupe ID dans la session
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_groupe'] = $user['groupe_id'];
    
        } else {
            // L'utilisateur n'a pas été trouvé dans la table "administrateurs"
            header('Location: login.php');
            exit;
        }
    } else {
        // L'ID de l'utilisateur n'est pas défini dans la session
        header('Location: login.php');
        exit;
    }
    

?>
<?php

// Ouvrez la connexion à la base de données
$db = new PDO('sqlite:db/database.db');

// Sélectionnez toutes les données pour les entrées
$selectEntreesQuery = "SELECT * FROM entrees";
$stmt = $db->prepare($selectEntreesQuery);
$stmt->execute();
$entreesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sélectionnez toutes les données pour les plats
$selectPlatsQuery = "SELECT * FROM plats";
$stmt = $db->prepare($selectPlatsQuery);
$stmt->execute();
$platsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sélectionnez toutes les données pour les desserts
$selectDessertsQuery = "SELECT * FROM desserts";
$stmt = $db->prepare($selectDessertsQuery);
$stmt->execute();
$dessertsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sélectionnez toutes les données pour les boissons
$selectBoissonsQuery = "SELECT * FROM boissons";
$stmt = $db->prepare($selectBoissonsQuery);
$stmt->execute();
$boissonsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fermez la connexion à la base de données
$db = null;

// Créez une liste clé-valeur avec les données
$listeCleValeur = [
    'entrees' => $entreesData,
    'plats' => $platsData,
    'desserts' => $dessertsData,
    'boissons' => $boissonsData
];




?>   

<!DOCTYPE html>
<html>
<head>
	<link href="backendAssets/css/styles.css" rel="stylesheet" />
</head>
<body>
    
	<h1>Minicucina</h1>
	<!-- Container -->
	<ul id="accordion" class="accordion">
		<?php
		foreach ($listeCleValeur as $cle => $valeur) {
			echo '<li>';
			echo '<div class="link"><i class="fa fa-paint-brush"></i>' . ucfirst($cle) . '<i class="fa fa-chevron-down"></i></div>';
			echo '<ul class="submenu">';
			
			// AJOUTER NOUVEAU ÉLÉMENT
			$typeRepasTable = $cle;
			$action = "ajouterRepas";
			echo '<li><a href="#">Ajouter</a></li>';
			echo '<div class="wrapper">';
			echo '<div class="heading">';
			echo '<h2>Mode ajout</h2>';
			echo '</div>';
			echo '<form action="fonctionsCRUD.php" method="POST" class="form-example">';
			echo '<div class="input-group">';
			echo '<input type="text" class="input-field" name="action" value="' . $action . '" hidden>';
			echo '<input type="text" class="input-field" name="typeRepas" value="' . $typeRepasTable . '" hidden>';
			echo '</div>';
			echo '<div class="input-group">';
			echo '<input type="text" class="input-field" name="nom" placeholder="Nom">';
			echo '</div>';
			echo '<div class="input-group">';
			echo '<input type="text" class="input-field" name="description" placeholder="Description">';
			echo '</div>';
			echo '<div class="input-group">';
			echo '<input type="text" class="input-field" name="prix" placeholder="Prix">';
			echo '</div>';

			// CASE JOUR SEMAINE FORM EDIT
			$joursSemaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];

			foreach ($joursSemaine as $jour) {
				echo '<div class="jour">';
				echo '<input type="checkbox" class="custom-checkbox" name="' . $jour . '" hidden>';
				echo '<label for="' . $jour . '">' . ucfirst($jour) . '</label>';
				echo '</div>';
			}

			echo '<div class="input-group">';
			echo '<button class="BTNajouterEditer" type="submit">Ajouter</button>';
			echo '</div>';
			echo '</form>';
			echo '</div>';
			
			/* ÉDITER ET BOUCLER SUR CHAQUE ÉLÉMENT */
			$typeRepasTable = $cle;
			$action = "editerRepas";
			foreach ($valeur as $repas) {

				/* POPUP POUR SUPPRIMER SUR CHAQUE ÉLÉMENT */
				echo '<div class="popup" data-id="' . $repas['id'] . '-' . $typeRepasTable . '" style="display: none;">
					<p>Êtes-vous sûr de vouloir supprimer ' . $repas['nom'] . ' ?</p>
					<div class="button-container">
						<form action="fonctionsCRUD.php" method="POST">
							<input type="hidden" name="action" value="supprimerRepas">
							<input type="hidden" name="id" value="' . $repas['id'] . '">
							<input type="hidden" name="typeRepas" value="' . $typeRepasTable . '">
							<button type="submit" class="popup-button-oui">Oui</button>
						</form>
						<button class="popup-button-non" data-id="' . $repas['id'] . '-' . $typeRepasTable . '">Non</button>
					</div>
				</div>';
			






				echo '<li><a href="#">' . $repas['nom'] . '</a><p data-id="' . $repas['id'] . '-' . $typeRepasTable . '" class="iconePoubelle">🗑️</p></li>';
				echo '<div class="wrapper">';
				echo '<div class="heading">';
				echo '<h2>Mode édition</h2>';
				echo '</div>';
				echo '<form action="fonctionsCRUD.php" method="POST" class="form-example">';
				echo '<div class="input-group">';
				echo '<input type="text" class="input-field" name="action" value="' . $action . '" hidden>';
				echo '<input type="text" class="input-field" name="typeRepas" value="' . $typeRepasTable . '" hidden>';
				echo '<input type="text" class="input-field" name="id" value="' . $repas['id'] . '" hidden>';
				echo '</div>';
				echo '<div class="input-group">';
				echo '<input type="text" class="input-field" name="nom" placeholder="Nom" value="' . $repas['nom'] . '">';
				echo '</div>';
				echo '<div class="input-group">';
				echo '<input type="text" class="input-field" name="description" placeholder="Description" value="' . $repas['description'] . '">';
				echo '</div>';
				echo '<div class="input-group">';
				echo '<input type="text" class="input-field" name="prix" placeholder="Prix" value="' . $repas['prix'] . '">';
				echo '</div>';

				// CASE JOUR SEMAINE FORM EDIT
				foreach ($joursSemaine as $jour) {
					$checked = ($repas[$jour] == 1) ? 'checked' : '';
					echo '<div class="jour">';
					echo '<input type="checkbox" class="custom-checkbox" name="' . $jour . '" hidden ' . $checked . '>';
					echo '<label for="' . $jour . '">' . ucfirst($jour) . '</label>';
					echo '</div>';
				}

				echo '<div class="input-group">';
				echo '<button class="BTNajouterEditer" type="submit">Modifier</button>';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
			echo '</ul>';
			echo '</li>';
		}
		?>
	</ul>








	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="backendAssets/js/script.js" type="text/javascript"> </script> 
</body>
</html>
