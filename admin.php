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

<!DOCTYPE html>
<html>
<head>
    <title>Accordion Menu</title>
    <style>
        /* CSS ACCORDEON*/
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background: #2d2c41;
            font-family: 'Open Sans', Arial, Helvetica, Sans-serif, Verdana, Tahoma;
        }

        ul {
            list-style-type: none;
        }

        a {
            color: #b63b4d;
            text-decoration: none;
        }

        /* Contenedor Principal */
        h1 {
            color: #FFF;
            font-size: 24px;
            font-weight: 400;
            text-align: center;
            margin-top: 80px;
        }

        .accordion {
            width: 100%;
            max-width: 360px;
            margin: 30px auto 20px;
            background: #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .accordion .link {
            cursor: pointer;
            display: block;
            padding: 15px 15px 15px 42px;
            color: #4D4D4D;
            font-size: 14px;
            font-weight: 700;
            border-bottom: 1px solid #CCC;
            position: relative;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li:last-child .link {
            border-bottom: 0;
        }

        .accordion li i {
            position: absolute;
            top: 16px;
            left: 12px;
            font-size: 18px;
            color: #595959;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .accordion li i.fa-chevron-down {
            right: 12px;
            left: auto;
            font-size: 16px;
            transform: rotate(0deg);
            transition: transform 0.2s;
        }

        .accordion li.open .link {
            color: #b63b4d;
        }

        .accordion li.open i.fa-chevron-down {
            transform: rotate(180deg);
        }

        .accordion li.close .submenu { display: none; }

        /* Submenu */
        .submenu {
            display: none;
            background: #444359;
            font-size: 14px;
        }

        .submenu li {
            border-bottom: 1px solid #4b4a5e;
            position: relative;
        }

        .submenu a {
            display: block;
            text-decoration: none;
            color: #d9d9d9;
            padding: 12px;
            padding-left: 42px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .submenu a:hover {
            background: #b63b4d;
            color: #FFF;
        }



        .AfficherDetails{
            cursor: pointer;
            display: block;
            
            color: grey;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid black;
            position: relative;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            transition: all 0.4s ease;
            background: white;
        }

        /*Ajout de css*/
        ::selection{
        color: #ffffff;
        background-color: #31285C;
        }




        .custom-wrapper{
        
        min-height:100px;
        background-color: #FFFFFF;
        border-radius: 5px;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.05);
        padding: 30px;
        }

        .custom-input-field{
        width: 100%;
        height: 45px;
        border: none;
        padding: 10px;
        background-color: #eeeeee;
        color: gray;
        outline: none;
        font-size: 15px;
        margin-bottom: 20px;
        transition: .5s;
        border-radius: 5px;
        }


        .custom-heading{
        color: #3B3663;
        margin-bottom: 20px;
        }

        .custom-heading p{ 
        color: #AAA8BB;
        }

        .custom-heading i{
        font-size: 30px;
        color: #4D61FC;
        } 

        .custom-label{
        color: #AAA8BB;
        font-weight: 400;
        }

        custom-button{
        width: 100%;
        height: 45px;
        border: none;
        color: #FFFFFF;
        background-color: #31285C;
        border-radius: 5px;
        font-size: 17px;
        font-weight: 500;
        transition: 0.3s;
        }

        .custom-button:hover{
        background-color: #31283B;
        }

        .custom-row{
        min-width: 5px;
        min-height: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 15px;
        }


        .AjouterElement{
            background-color: grey;
        }

        /*CSS case à cocher*/

        .container {
        position :relative;
        display:block;
        width: 2rem;
        height: 1rem;
        }

        .background {
        position:absolute;
        inset:0;
            background-color: rgba(200,200,200,1);
            border-radius: 20px;
            transition:all 150ms ease;
        }

        .circle {
        width: 1rem;
        height: 1rem;
        position: absolute;
        background-color: white;
        border-radius: 100%;
        outline: 1px solid rgba(200,200,200,1);
        left: 0;
        top: 0;
        transition: all 150ms ease;
        }

        .checkbox {
        display: none;
        }

        .checkbox:checked ~ .background{
            background-color: #623CEA;
        border-color: #623CEA;
        transition:all 250ms ease;
        }

        .checkbox:checked ~ .circle {
        transform:translateX(100%);
        transition: all 250ms ease;
        outline-color: #623CEA;
        }

        /*SUPPRIMER ELEMENT*/
        .IconeSupprimer {
            position: absolute;
            right: 10px; /* Ajustez la valeur en fonction de l'écart par rapport à la droite */
            top: 50%; /* Place l'icône au milieu de la hauteur du parent */
            transform: translateY(-50%); /* Corrige la position verticale pour centrer l'icône */
        }

        /*POPUP CODE CSS*/

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Assurez-vous que la popup est en avant-plan */
        }

        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .popup button {
            margin: 5px;
        }

        .parentFormdelete{
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
        }




    </style>
</head>
<body>

<h1>Minicucina</h1>
<h1>Bienvenue <?php echo $_SESSION['user_nom']; ?></h1>

<ul id="accordion" class="accordion">
      
    <li class="close">
        <div class="link"><i class="fa fa-paint-brush"></i>Administrateurs<i class="fa fa-chevron-down">▼</i></div>
        <ul class="submenu">
        <?php
        // Connexion à la base de données SQLite avec PDO
        $db = new PDO('sqlite:db/database.db');

        // Requête SQL pour sélectionner toutes les entrées et leurs détails
        $query = "SELECT * FROM administrateurs";

        // Exécution de la requête
        $stmt = $db->query($query);

        // Afficher ajouter
        echo "<li><a href='#' id='cliclPuisAjouter' class='AjouterElement'>Ajouter utilisateur</a></li>";
      


        // Code HTML du formulaire ajouter
        echo '<div class="AfficherDetails" id="Ajouter" style="display: block;">
            <form method="post" action="ajouterUser.php">
                <div class="custom-wrapper">
                    <div class="custom-heading">
                        <h2>Créér nouveau</h2>
                        <p>Mode ajout</p>
                        
                    </div>

                        ';
                    
                    echo '
                    <div class="custom-input-group">
                        <input type="text" id="custom-pseudo" name="pseudo" class="custom-input-field" placeholder="Pseudo">
                    </div>
                    <div class="custom-input-group">
                        <input type="password" id="custom-mot_de_passe" name="mot_de_passe" class="custom-input-field" placeholder="Mot de passe">
                    </div>
          
                    ';
                                
                    $SuperUser = 'SuperUser';
                    

                
                    echo "
                        <div class='custom-input-group custom-row'>
                            <div class='custom-row'>
                                <label for='{$SuperUser}' class='container'>
                              
                                    <input class='checkbox' id='{$SuperUser}' name='{$SuperUser}' type='checkbox' />
                                    <div class='background'></div>
                                    <div class='circle'></div>
                                </label>
                                {$SuperUser}
                            </div>
                        </div>
                    ";
            
                
                    echo '

                    <div class="custom-input-group">
                    <button type="submit">Ajouter <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
    
                    </div>

                    ';

                    // Suite du formulaire
                    echo '
                            </div>
                            
                        </form>
                    </div>';



        //Afficher dynamiquement les utilisateurs

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><a href='#' class='ParentAfficherDetails' data-id='{$row['id']}'>{$row['nom']}</a> <p data-id='{$row['id']}' class='IconeSupprimer' >🗑️</p></li>";
                // POPUP SUPPRIMER USER
                echo "<div id='popup' class='popup' data-id='{$row['id']}' style='display: none;'>
                    <div class='popup-content'>
                        <p>Voulez-vous sûr de vouloir supprimer {$row['nom']} ?</p>
                        <div class='parentFormdelete'>
                            <form id='suppression-form' action='supprimerUser.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' id='oui' name='id-{$row['id']}'>Oui</button>
                            </form>
                            <button type='button' id='non'>Non</button>
                        </div>
                    </div>
                </div>";

                //DEBUT DU FORM EDIT

                echo "<div class='AfficherDetails' data-id='{$row['id']}' style='display: block;'>";
                echo "<form method='post' action='editerUser.php'>"; // Début du formulaire

     
                echo '
                <div class="custom-wrapper">
                    <div class="custom-heading">
                        <h2>Utilisateur ' . htmlspecialchars($row['nom']) . '</h2>
                        <p>Mode édition</p>
                    </div>
                ';
                
                echo "
                <div class='custom-input-group'>
                    <input type='text' id='custom-titre_1' name='pseudo' class='custom-input-field' placeholder='Pseudo' value='{$row['nom']}'>
                </div>
                ";
                

       

                echo '
                <div class="custom-input-group">
                    <input type="password" id="custom-mot_de_passe" name="mot_de_passe" class="custom-input-field" placeholder="Mot de passe">
                </div>
                <div class="custom-input-group">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                </div>
                ';


                $checkedUser = $row['groupe_id'] ? 'checked' : '';
                
                
                echo "
                
                <div class='custom-input-group custom-row'>
                    <div class='custom-row'>
                        <label for='id-{$row['id']}' class='container'>
                            <input class='checkbox' id='id-{$row['id']}' name='id-{$row['id']}' type='checkbox' {$checkedUser} />
                            <div class='background'></div>
                            <div class='circle'></div>
                        </label>
                        {$SuperUser}
                    </div>
                </div>
            ";
            
                echo '

                    <div class="custom-input-group">
                    <button>Modifier <i class="fa-solid fa-arrow-right"></i></button>
                    </div>

                    </div>



                    ';


                echo "</form>";
                
                
                
                echo "</div>";
                
            }

            // Le reste de votre page PHP (affichage du formulaire, etc.) se trouve ici
                
            }           // Fin du formulaire

            ?>

        </ul>
    </li>
   
    <!--
    <li class="close">
        <div class="link"><i class="fa fa-paint-brush"></i>Entrées<i class="fa fa-chevron-down">▼</i></div>
        <ul class="submenu">
        <?php
        // Connexion à la base de données SQLite avec PDO
        $db = new PDO('sqlite:db/database.db');

        // Requête SQL pour sélectionner toutes les entrées et leurs détails
        $query = "SELECT * FROM entree";

        // Exécution de la requête
        $stmt = $db->query($query);

        // Afficher ajouter
        echo "<li><a href='#' id='cliclPuisAjouter' class='AjouterElement'>Ajouter</a></li>";
      


        // Code HTML du formulaire ajouter
        echo '<div class="AfficherDetails" id="Ajouter" style="display: block;">
            <form method="post" action="ajouter.php">
                <div class="custom-wrapper">
                    <div class="custom-heading">
                        <h2>Créér nouveau</h2>
                        <p>Mode ajout</p>
                        
                    </div>

                    <div class="custom-input-group">
                        <input type="text" id="custom-id1" name="id" class="custom-input-id" placeholder="Image" value="1" style="display: none;">
                    </div>

                    <div class="custom-input-group">
                        <input type="text" id="custom-image_1" name="image" class="custom-input-field" placeholder="Image">
                    </div>

                    <div class="custom-input-group">
                        <input type="text" id="custom-titre_1" name="titre" class="custom-input-field" placeholder="Titre">
                    </div>

                    <div class="custom-input-group">
                        <input type="text" id="custom-description_1" name="description" class="custom-input-field" placeholder="Description">
                    </div>';
                    // Liste des jours de la semaine

                                
                    $joursSemaine = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi');

                    foreach ($joursSemaine as $jour) {
                        $checkboxID = "input-editer-{$jour}";
                        $checkboxClasse = "input-ajouter-{$jour}";

                        

                        echo "
                            <div class='custom-input-group custom-row'>
                                <div class='custom-row'>
                                    <label for='{$checkboxID}' class='container'>
                                        <input class='checkbox' id='{$checkboxID}' name='{$checkboxClasse}' type='checkbox' />
                                        <div class='background'></div>
                                        <div class='circle'></div>
                                    </label>
                                    {$jour}
                                </div>
                            </div>
                        ";
                    }
                



                    // Suite du formulaire
                    echo '
                                <div class="custom-input-group">
                                    <input type="text" id="custom-prix_1" name="prix" class="custom-input-field" placeholder="Prix">
                                </div>
                                <div class="custom-input-group">
                                    <button>Ajouter <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>';



        //Afficher dynamiquement

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><a href='#' class='ParentAfficherDetails' data-id='{$row['id']}'>{$row['nom']}</a> <p data-id='{$row['id']}' class='IconeSupprimer' >🗑️</p></li>";
                // POPUP
                echo "<div id='popup' class='popup' data-id='{$row['id']}' style='display: none;'>
                    <div class='popup-content'>
                        <p>Voulez-vous sûr de vouloir supprimer {$row['nom']} ?</p>
                        <div class='parentFormdelete'>
                            <form id='suppression-form' action='supprimer.php' method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' id='oui' name='id-{$row['id']}'>Oui</button>
                            </form>
                            <button type='button' id='non'>Non</button>
                        </div>
                    </div>
                </div>";



                echo "<div class='AfficherDetails' data-id='{$row['id']}' style='display: block;'>";
                echo "<form method='post' action='editer.php'>"; // Début du formulaire

     
                echo '
                <div class="custom-wrapper">
                    <div class="custom-heading">
                        <h2>' . htmlspecialchars($row['nom']) . '</h2>
                        <p>Mode édition</p>
                    </div>
                ';
            
            echo "<div class='custom-input-group'>";
            echo "<input type='hidden'id='custom-id{$row['id']}' name='id' class='custom-input-id' placeholder='Image' value='{$row['id']}'>";
            echo "</div>";

            echo "<div class='custom-input-group'>";
            echo "<input type='text' id='custom-image_{$row['id']}' name='image' class='custom-input-field' placeholder='Image' value='{$row['image']}'>";
            echo "</div>";
            
            echo "<div class='custom-input-group'>";
            echo "<input type='text' id='custom-titre_{$row['id']}' name='titre' class='custom-input-field' placeholder='Titre' value='{$row['nom']}'>";
            echo "</div>";
            
            echo "<div class='custom-input-group'>";
            echo "<input type='text' id='custom-description_{$row['id']}' name='description' class='custom-input-field' placeholder='Description' value='{$row['description']}'>";
            echo "</div>";
            
        

           
           $joursSemaine = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi');
       
           foreach ($joursSemaine as $jour) {
               $checkboxID = "input-editer-{$row['id']}-{$jour}";
               $checkboxClasse = "input-editer-{$jour}";
       
               $checked = $row[$jour] ? 'checked' : '';
       
               echo "
                   <div class='custom-input-group custom-row'>
                       <div class='custom-row'>
                           <label for='{$checkboxID}' class='container'>
                               <input class='checkbox' id='{$checkboxID}' name='{$checkboxClasse}' type='checkbox' {$checked} />
                               <div class='background'></div>
                               <div class='circle'></div>
                           </label>
                           {$jour}
                       </div>
                   </div>
               ";
           }
           
           
            




                

            echo "<div class='custom-input-group'>";
            echo "<input type='text' id='custom-prix_{$row['id']}' name='prix' class='custom-input-field' placeholder='Prix' value='{$row['prix']}'>";
            echo "</div>";

            echo '

                <div class="custom-input-group">
                <button>Modifier <i class="fa-solid fa-arrow-right"></i></button>
                </div>

                </div>



                ';


            echo "</form>";
            
            
            
            echo "</div>";
            
        }

        // Le reste de votre page PHP (affichage du formulaire, etc.) se trouve ici
            
        }           // Fin du formulaire

        ?>

        </ul>
    </li>-->
    <li class="close">
        <div class="link"><i class="fa fa-code"></i>Plats<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <li><a href="#">Javascript</a></li>
            <li><a href="#">jQuery</a></li>
            <li><a href="#">Frameworks javascript</a></li>
        </ul>
    </li>
    <li class="close">
        <div class="link"><i class="fa fa-mobile"></i>Desserts<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <li><a href="#">Tablets</a></li>
            <li><a href="#">Mobile</a></li>
            <li><a href="#">Media</a></li>
            <li><a href="#">More</a></li>
        </ul>
    </li>
    <li class="close"><div class="link"><i class="fa fa-globe"></i>Boissons<i class="fa fa-chevron-down"></i></div>
        <ul class="submenu">
            <li><a href="#">Google</a></li>
            <li><a href="#">Bing</a></li>
            <li><a href="#">Yahoo</a></li>
            <li><a href="#">Other</a></li>
        </ul>
    </li>
</ul>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //MENU DEROULEMENT DE BASE
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
            $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            }
        }   

        var accordion = new Accordion($('#accordion'), false);
    });

    //AFFICHER ENFANTS DU PARENTS AYANT LE MEME DATA ID
    $(document).ready(function() {
    // Sélectionnez tous les éléments ParentAfficherDetails
    var parents = $('.ParentAfficherDetails');

    // Cacher tous les éléments AfficherDetails par défaut
    $('.AfficherDetails').hide();

    // Lorsque vous cliquez sur un élément parent
    parents.on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var details = $('.AfficherDetails[data-id=' + id + ']');

        // Affichez les détails de l'élément parent actuel
        details.show();

        // Masquez tous les autres détails
        $('.AfficherDetails').not(details).hide();
    });

    // Lorsque vous cliquez n'importe où sur la page, masquez les détails
  
});

</script>
<script>
// BTN AJOUTER QUI AFFICHE UN NOUVEAU FORMULAIRE 
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez l'élément "Ajouter" par son ID
    var ajoutElement = document.getElementById("Ajouter");
    var cliclPuisAjouter = document.getElementById("cliclPuisAjouter");

    // Ajoutez un gestionnaire d'événement pour le clic sur "Ajouter"
    cliclPuisAjouter.addEventListener("click", function (event) {
        // Empêchez le comportement par défaut du lien
        event.preventDefault();

        // Basculez la visibilité de l'élément "Ajouter"
        if (ajoutElement.style.display === "block") {
            ajoutElement.style.display = "none";
        } else {
            ajoutElement.style.display = "block";
        }

    });
});
</script>

<script>
 // Attendez que le document soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Récupérez toutes les icônes de suppression
    const iconesSupprimer = document.querySelectorAll('.IconeSupprimer');

    // Pour chaque icône de suppression
    iconesSupprimer.forEach(iconeSupprimer => {
        // Lorsque l'icône de suppression est cliquée
        iconeSupprimer.addEventListener('click', () => {
            // Récupérez le data-id correspondant
            const dataId = iconeSupprimer.getAttribute('data-id');
            // Récupérez la popup associée
            const popup = document.querySelector(`.popup[data-id='${dataId}']`);
            // Affichez la popup
            popup.style.display = 'block';
        });
    });

    // Pour chaque popup
    const popups = document.querySelectorAll('.popup');

    // Pour chaque popup
    popups.forEach(popup => {
        // Lorsque le bouton "Non" est cliqué
        const boutonNon = popup.querySelector('#non');
        boutonNon.addEventListener('click', () => {
            // Masquez la popup
            popup.style.display = 'none';
        });

        // Lorsque le bouton "Oui" est cliqué
        const boutonOui = popup.querySelector('#oui');
        boutonOui.addEventListener('click', () => {
            // Masquez la popup
            popup.style.display = 'none';
            // Ajoutez le code pour supprimer l'élément ici
        });
    });
});

</script>







</body>
</html>
