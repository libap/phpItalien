<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // Utilisez une structure de contrôle pour diriger vers la fonction appropriée
    switch ($action) {

        case 'ajouterUser':
            ajouterUser();
            break;

        case 'editerUser':
            editerUser();
            break;

        case 'supprimerUser':
            supprimerUser();
            break; 
            

        case 'ajouterRepas':
            ajouterRepas();
            break;

        case 'editerRepas':
            editerRepas();
            break;

        case 'supprimerRepas':
            supprimerRepas();
            break;

        default:
            echo "Action inconnue : $action";
            break;
    }
} else {
    // Gestion du cas où la requête n'est pas de type POST ou où le champ "action" est manquant
    echo "Requête invalide.";
}



// Définissez vos fonctions de traitement pour chaque formulaire
function supprimerUser() {
    print_r($_POST['id']);
    if (isset($_POST['id'])) {
        $adminId = $_POST['id'];

        // Le reste de votre logique, par exemple, la suppression
        $db = new PDO('sqlite:db/database.db');

        // Préparez la requête de suppression
        $deleteQuery = "DELETE FROM administrateurs WHERE id = :id";

        // Préparez la requête
        $stmt = $db->prepare($deleteQuery);
        $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Erreur lors de la suppression de l'administrateur.";
        }
    }
}

function ajouterUser() {
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
}

function editerUser() {
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
    $groupe_id = isset($_POST['SuperUser']) ? 1 : 0;
    
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
}

function ajouterRepas() {
    // Assurez-vous de bien récupérer les valeurs du type de repas et des nouvelles données.
    $typeRepas = $_POST['typeRepas'];
    $newTitre = $_POST['nom'];
    $newDescription = $_POST['description'];
    $newPrix = $_POST['prix'];

    $pathDossier = 'frontendAssets/images/' . $typeRepas;
    $newImage = "";
    $nomFinalImage = "";

    // Vérifier si $newImage est défini
    if (isset($_FILES['image']['name'])) {
        // Récupérez le nom du fichier image depuis $_FILES
        $newImage = $_FILES['image']['name'];
        //print_r($newImage);

        
        // Appel à ajouterImage et vérification du résultat
        $resultatAjout = ajouterImage($newImage, $pathDossier);

        if ($resultatAjout !== false) {
            // Si l'ajout est réussi, assigner la valeur à $nomFinalImage
            $nomFinalImage = $resultatAjout;
        } else {
            // Gérer le cas où l'ajout a échoué
            echo "Erreur lors de l'ajout de l'image.";
        }
    } else {
        // Gérer le cas où $newImage n'est pas défini
        echo "Aucun fichier image n'a été fourni.";
    }

        


     
    // Ouvrez la connexion à la base de données
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête d'insertion
    $insertQuery = "INSERT INTO $typeRepas (nom, description, nom_fichier, lundi, mardi, mercredi, jeudi, vendredi, prix) VALUES (:titre, :description, :nom_fichier, :lundi, :mardi, :mercredi, :jeudi, :vendredi, :prix)";
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':titre', $newTitre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);


    // Vous pouvez récupérer les valeurs des cases cochées ici
    $lundi = isset($_POST['lundi']) ? 1 : 0;
    $mardi = isset($_POST['mardi']) ? 1 : 0;
    $mercredi = isset($_POST['mercredi']) ? 1 : 0;
    $jeudi = isset($_POST['jeudi']) ? 1 : 0;
    $vendredi = isset($_POST['vendredi']) ? 1 : 0;

    $stmt->bindParam(':lundi', $lundi, PDO::PARAM_INT);
    $stmt->bindParam(':mardi', $mardi, PDO::PARAM_INT);
    $stmt->bindParam(':mercredi', $mercredi, PDO::PARAM_INT);
    $stmt->bindParam(':jeudi', $jeudi, PDO::PARAM_INT);
    $stmt->bindParam(':vendredi', $vendredi, PDO::PARAM_INT);

    // Assurez-vous de définir $newPrix correctement
    $stmt->bindParam(':prix', $newPrix, PDO::PARAM_STR);
    $stmt->bindParam(':nom_fichier', $nomFinalImage, PDO::PARAM_STR); // Ajoutez cette ligne pour lier le nom_fichier


    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de l'ajout du repas.";
    }
}

function editerRepas() {
    // Assurez-vous de bien récupérer les valeurs de l'ID, du type de repas et des nouvelles données.
    $entryId = $_POST['id'];
    $typeRepas = $_POST['typeRepas'];
    $newTitre = $_POST['nom'];
    $newDescription = $_POST['description'];
    $newPrix = $_POST['prix'];
    $imageNom = $_POST['image'];
    $pathDossier = 'frontendAssets/images/' . $typeRepas;

    $newImage = "";
    $nomFinalImage = "";

    // Vérifier si $newImage est défini
    if (isset($_FILES['image']['name'])) {
        // Récupérez le nom du fichier image depuis $_FILES
        $newImage = $_FILES['image']['name'];
        //print_r($newImage);
        
        // Appel à ajouterImage et vérification du résultat
        $resultatAjout = ajouterImage($newImage, $pathDossier);

        if ($resultatAjout !== false) {
            // Si l'ajout est réussi, assigner la valeur à $nomFinalImage
            $nomFinalImage = $resultatAjout;
        } else {
            // Gérer le cas où l'ajout a échoué
            echo "Erreur lors de l'ajout de l'image.";
        }
    } else {
        // Gérer le cas où $newImage n'est pas défini
        echo "Aucun fichier image n'a été fourni.";
    }





    $db = new PDO('sqlite:db/database.db');
    // Préparez la requête de mise à jour
    $updateQuery = "UPDATE $typeRepas SET nom = :titre, description = :description, lundi = :lundi, mardi = :mardi, mercredi = :mercredi, jeudi = :jeudi, vendredi = :vendredi, prix = :prix";
    if ($nomFinalImage != "") {
        $updateQuery .= ", nom_fichier = :nom_fichier";
    }
    $updateQuery .= " WHERE id = :id";
    $stmt = $db->prepare($updateQuery);
    $stmt->bindParam(':id', $entryId, PDO::PARAM_INT);
    $stmt->bindParam(':titre', $newTitre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);

    // Vous pouvez récupérer les valeurs des cases cochées ici
    $lundi = isset($_POST['lundi']) ? 1 : 0;
    $mardi = isset($_POST['mardi']) ? 1 : 0;
    $mercredi = isset($_POST['mercredi']) ? 1 : 0;
    $jeudi = isset($_POST['jeudi']) ? 1 : 0;
    $vendredi = isset($_POST['vendredi']) ? 1 : 0;

    $stmt->bindParam(':lundi', $lundi, PDO::PARAM_INT);
    $stmt->bindParam(':mardi', $mardi, PDO::PARAM_INT);
    $stmt->bindParam(':mercredi', $mercredi, PDO::PARAM_INT);
    $stmt->bindParam(':jeudi', $jeudi, PDO::PARAM_INT);
    $stmt->bindParam(':vendredi', $vendredi, PDO::PARAM_INT);

    // Assurez-vous de définir $newPrix correctement
    $stmt->bindParam(':prix', $newPrix, PDO::PARAM_STR);

    if ($nomFinalImage != "") {
        $stmt->bindParam(':nom_fichier', $nomFinalImage, PDO::PARAM_STR);
        if (supprimerImage($imageNom, $pathDossier)) {
            // Suppression réussie
            echo 'Suppression réussie';
        } else {
            // Suppression échouée
            echo 'Échec de la suppression';
        }

    }

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour.";
    }

    
        
}

function supprimerRepas() {
    if (isset($_POST['id']) && isset($_POST['typeRepas'])) {
        $entryId = $_POST['id'];
        $typeRepas = $_POST['typeRepas'];
        $imageNom = $_POST['image'];
        $pathDossier = 'frontendAssets/images/' . $typeRepas;
        
        if (supprimerImage($imageNom, $pathDossier)) {
            // Suppression réussie
            echo 'Suppression réussie';
        } else {
            // Suppression échouée
            echo 'Échec de la suppression';
        }
        

 

        // Placez ici votre code pour la connexion à la base de données
        $db = new PDO('sqlite:db/database.db');

        // Préparez la requête de suppression
        $deleteQuery = "DELETE FROM $typeRepas WHERE id = :id";

        // Préparez la requête
        $stmt = $db->prepare($deleteQuery);
        $stmt->bindParam(':id', $entryId, PDO::PARAM_INT);

        // Exécutez la requête de suppression
        if ($stmt->execute()) {
            // Redirigez vers la page principale ou faites d'autres actions
            header('Location: admin.php');
            exit;
        } else {
            // Gérez l'erreur de suppression, affichez un message d'erreur, etc.
            echo "Erreur lors de la suppression.";
        }
    } else {
        // Redirigez vers la page principale ou affichez un message d'erreur si l'ID n'est pas fourni
        header('Location: admin.php');
        exit;
    }
}


//Gestion des images

function ajouterImage($image, $pathDossier) {
    // Si l'image existe déjà
    if (imageOuDossierExiste($image, $pathDossier)) {

        $nouveauNomImage = genererNomImage($image, $pathDossier);

        if (telechargerImage($nouveauNomImage, $pathDossier)) {
            print('Téléchargement réussi');
            return $nouveauNomImage;
        } else {
            print('Échec du téléchargement');
            return false;
        }

    } else {
        // Si l'image n'existe pas encore, téléchargez directement
        if (telechargerImage($image, $pathDossier)) {
            print('Téléchargement réussi');
            return $image;
        } else {
            print('Échec du téléchargement');
            return false;
        }
    }
}

function supprimerImage($image, $pathDossier) {
    $path = $pathDossier . "/" . $image;

    // Vérifier si le fichier existe avant de le supprimer
    if (file_exists($path)) {
        // Supprimer le fichier
        if (unlink($path)) {
            // La suppression a réussi
            return true;
        } else {
            // La suppression a échoué
            return false;
        }
    } else {
        // Le fichier n'existe pas
        return false;
    }
}

function imageOuDossierExiste($image, $pathDossier){
 
    // Vérifiez si le répertoire existe
    if (is_dir($pathDossier)) {
        // Ouvrez le répertoire
        $dir = opendir($pathDossier);

        // Parcourez les fichiers du répertoire
        while (($file = readdir($dir)) !== false) {
            // Vérifiez si le fichier est une image (vous pouvez ajuster cette condition)
            if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'heic'])) {
                // Le fichier est une image
                echo "Image trouvée : " . $file . "<br>";
                if ($image === $file) {
                    break;
                    closedir($dir);
                    return True;
                }
            }
        }

        // Si image pas trouvé
        closedir($dir);
        return False;
    }

}

function telechargerImage($image, $pathDossier) {
    $tmpPath = $_FILES['image']['tmp_name'];
    $destination = $pathDossier . '/' . $image;

    // Téléchargez le fichier
    if (move_uploaded_file($tmpPath, $destination)) {
        // Redimensionnez l'image à 100x100 pixels tout en conservant ses proportions
        $imageModification = imagecreatefromstring(file_get_contents($destination));
        $nouvelleLargeur = 100;
        $nouvelleHauteur = 100;
        list($largeur, $hauteur) = getimagesize($destination);

        $nouvelleImage = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur);

        imagecopyresampled(
            $nouvelleImage,
            $imageModification,
            0,
            0,
            0,
            0,
            $nouvelleLargeur,
            $nouvelleHauteur,
            $largeur,
            $hauteur
        );

        // Sauvegardez l'image redimensionnée
        imagejpeg($nouvelleImage, $destination);

        return true;  // Retourne true en cas de succès
    } else {
        return false;  // Retourne false en cas d'échec
    }
}

function genererNomImage($image, $pathDossier) {
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    $nouveauNomInitial = uniqid() . '.' . $extension;
    $nouveauNom = $nouveauNomInitial;

    // Si l'image avec le même nom existe déjà, générer un nouveau nom unique
    while (imageOuDossierExiste($nouveauNom, $pathDossier)) {
        $nouveauNom = uniqid() . '.' . $extension;
    }

    return $nouveauNom;
}





?>
