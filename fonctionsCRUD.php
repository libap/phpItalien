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
}

function ajouterRepas() {
    // Assurez-vous de bien récupérer les valeurs du type de repas et des nouvelles données.
    // Assurez-vous de bien récupérer les valeurs du type de repas et des nouvelles données.
    $typeRepas = $_POST['typeRepas'];
    $newTitre = $_POST['nom'];
    $newDescription = $_POST['description'];
    $newPrix = $_POST['prix'];

    // Récupérez le nom du fichier image depuis $_FILES
    $newImage = $_FILES['image']['name'];
    print_r($newImage);
    $finalNewImage = '';
    // Assurez-vous d'avoir le bon chemin vers le répertoire
    $path = 'frontendAssets/images/' . $typeRepas;
    $imageExiste = 0;

    // Vérifiez si le répertoire existe
    if (is_dir($path)) {
        // Ouvrez le répertoire
        $dir = opendir($path);

        // Parcourez les fichiers du répertoire
        while (($file = readdir($dir)) !== false) {
            // Vérifiez si le fichier est une image (vous pouvez ajuster cette condition)
            if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                // Le fichier est une image
                echo "Image trouvée : " . $file . "<br>";
                if ($newImage === $file) {
                    $imageExiste = 1;
                    break;
                }
            }
        }

        // Fermez le répertoire
        closedir($dir);

        //  SI L IMAGE  EXISTE  DEJA DANS LE REPERTOIRE
        if ($imageExiste === 1) {
            $extension = pathinfo($newImage, PATHINFO_EXTENSION);
            $nouveauNom = uniqid() . '.' . $extension;
            $destination = $path . '/' . $nouveauNom;

            // Vérifiez si le fichier image avec le nouveau nom existe déjà
            while (file_exists($destination)) {
                $nouveauNom = uniqid() . '.' . $extension;
                $destination = $path . '/' . $nouveauNom;
            }

            // Téléchargez le fichier avec le nouveau nom
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                echo "Image téléchargée avec succès.";
                $finalNewImage = $nouveauNom;

                // Vous pouvez effectuer d'autres actions ici en cas de succès.
            } else {
                echo "Image doublon Erreur lors du téléchargement de l'image.";
                // Gérez les erreurs de téléchargement ici.
            }
        }
    }

    // SI L IMAGE N EXISTE PAS DEJA DANS LE REPERTOIRE
    if ($imageExiste === 0) {
        // Vérifiez si un fichier a été téléchargé
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $_FILES['image']['tmp_name'];
            $destination = $path . '/' . $newImage;

            // Téléchargez le fichier
            if (move_uploaded_file($tmpPath, $destination)) {
                echo "Image unique téléchargée avec succès.";
                $finalNewImage = $newImage;
                // Vous pouvez effectuer d'autres actions ici en cas de succès.
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                // Gérez les erreurs de téléchargement ici.
            }
        } else {
            echo "Aucun fichier image téléchargé ou erreur de téléchargement.";
            // Gérez le cas où aucun fichier n'a été téléchargé ou s'il y a eu une erreur.
        }
    }






     
    // Ouvrez la connexion à la base de données
    $db = new PDO('sqlite:db/database.db');

    // Préparez la requête d'insertion
    $insertQuery = "INSERT INTO $typeRepas (nom, description, nom_fichier, lundi, mardi, mercredi, jeudi, vendredi, prix) VALUES (:titre, :description, :nom_fichier, :lundi, :mardi, :mercredi, :jeudi, :vendredi, :prix)";
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':titre', $newTitre, PDO::PARAM_STR);
    $stmt->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $stmt->bindParam(':nom_fichier', $finalNewImage, PDO::PARAM_STR); // Ajoutez cette ligne pour lier le nom_fichier


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

    // Récupérez le nom du fichier image depuis $_FILES
    $newImage = $_FILES['image']['name'];
    print('        la new image apres       ');
    print_r($newImage);
    print('         la new image avant       ');
    $finalNewImage = '';
    // Assurez-vous d'avoir le bon chemin vers le répertoire
    $path = 'frontendAssets/images/' . $typeRepas;
    $imageExiste = 0;

    // Vérifiez si le répertoire existe
    if (is_dir($path)) {
        // Ouvrez le répertoire
        $dir = opendir($path);

        // Parcourez les fichiers du répertoire
        while (($file = readdir($dir)) !== false) {
            // Vérifiez si le fichier est une image (vous pouvez ajuster cette condition)
            if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                // Le fichier est une image
                echo "Image trouvée : " . $file . "<br>";
                if ($newImage === $file) {
                    $imageExiste = 1;
                    break;
                }
            }
        }

        // Fermez le répertoire
        closedir($dir);

        //  SI L IMAGE  EXISTE  DEJA DANS LE REPERTOIRE
        if ($imageExiste === 1) {
            $extension = pathinfo($newImage, PATHINFO_EXTENSION);
            $nouveauNom = uniqid() . '.' . $extension;
            $destination = $path . '/' . $nouveauNom;

            // Vérifiez si le fichier image avec le nouveau nom existe déjà
            while (file_exists($destination)) {
                $nouveauNom = uniqid() . '.' . $extension;
                $destination = $path . '/' . $nouveauNom;
            }

            // Téléchargez le fichier avec le nouveau nom
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                echo "Image téléchargée avec succès.";
                $finalNewImage = $nouveauNom;

                // Vous pouvez effectuer d'autres actions ici en cas de succès.
            } else {
                echo "Image doublon Erreur lors du téléchargement de l'image.";
                // Gérez les erreurs de téléchargement ici.
            }
        }
    }

    // SI L IMAGE N EXISTE PAS DEJA DANS LE REPERTOIRE
    if ($imageExiste === 0) {
        // Vérifiez si un fichier a été téléchargé
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpPath = $_FILES['image']['tmp_name'];
            $destination = $path . '/' . $newImage;

            // Téléchargez le fichier
            if (move_uploaded_file($tmpPath, $destination)) {
                echo "Image unique téléchargée avec succès.";
                $finalNewImage = $newImage;
                // Vous pouvez effectuer d'autres actions ici en cas de succès.
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                // Gérez les erreurs de téléchargement ici.
            }
        } else {
            echo "Aucun fichier image téléchargé ou erreur de téléchargement.";
            // Gérez le cas où aucun fichier n'a été téléchargé ou s'il y a eu une erreur.
        }
    }

    $db = new PDO('sqlite:db/database.db');
    // Préparez la requête de mise à jour
    $updateQuery = "UPDATE $typeRepas SET nom = :titre, description = :description, lundi = :lundi, mardi = :mardi, mercredi = :mercredi, jeudi = :jeudi, vendredi = :vendredi, prix = :prix";
    if (!empty($finalNewImage)) {
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

    if (!empty($finalNewImage)) {
        $stmt->bindParam(':nom_fichier', $finalNewImage, PDO::PARAM_STR);
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





?>
