<!DOCTYPE html>
<html>
<head>
    <title>Accordion Menu</title>
    <style>
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

.custom-input-field:hover{
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

.custom-custom-checkbox{
 width: 17px;
 height: 17px;
 border-radius: 5px;
 background-color: #eeeeee;
 display: flex;
 align-items: center;
 justify-content: center; 
 font-size: 10px;
 margin-right: 5px;
}

input[type=checkbox]:checked ~ .custom-custom-checkbox{
 background-color: #31285C;
}

input[type=checkbox]:checked ~ .custom-custom-checkbox::before {
font-family: "Font Awesome 5 Free";
  content: "\f00c";
  display: inline-block;
  font-weight: 900;
  color: #ffffff;
}

.AjouterElement{
    background-color: grey;
}



    </style>
</head>
<body>

<h1>Minicucina</h1>

<ul id="accordion" class="accordion">
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
        echo "<li><a href='#' class='AjouterElement'>Ajouter</a></li>";
    










        //Afficher dynamiquement

        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><a href='#' class='ParentAfficherDetails' data-id='{$row['id']}'>{$row['nom']}</a></li>";

                echo "<div class='AfficherDetails' data-id='{$row['id']}' style='display: block;'>";
                echo "<form method='post' action='receptionForm.php'>"; // Début du formulaire

     
         
                echo '
         

                <div class="custom-wrapper">

                <div class="custom-heading">
                <h2>Welcome!</h2>
                <p>Sign In to your account</p>
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
            
        

            // Liste des jours de la semaine
            $joursSemaine = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi');

            // Initialisez une variable pour stocker le code HTML des cases à cocher
            $customInputGroups = '';

            // Supposons que $row contient les données de la base de données
            foreach ($joursSemaine as $jour) {
                if ($row[$jour] == 1) {
                    // Si la valeur pour le jour est 1, cochez la case
                    $customInputGroups .= "
                        <div class='custom-input-group custom-row'>
                            <div class='custom-row'>
                                <input type='checkbox' id='custom-{$jour}' hidden checked>
                                <label for='custom-{$jour}' class='custom-custom-checkbox'></label>
                                <label for='custom-{$jour}'>{$jour}</label>
                            </div>
                        </div>
                    ";
                } else {
                    // Sinon, ne cochez pas la case
                    $customInputGroups .= "
                        <div class='custom-input-group custom-row'>
                            <div class='custom-row'>
                                <input type='checkbox' id='custom-{$jour}' hidden>
                                <label for='custom-{$jour}' class='custom-custom-checkbox'></label>
                                <label for='custom-{$jour}'>{$jour}</label>
                            </div>
                        </div>
                    ";
                }
            }

            // Ensuite, vous pouvez ajouter $customInputGroups à votre HTML
            echo $customInputGroups;


                

            echo "<div class='custom-input-group'>";
            echo "<input type='text' id='custom-prix_{$row['id']}' name='prix' class='custom-input-field' placeholder='Prix' value='{$row['prix']}'>";
            echo "</div>";

            echo '

                <div class="custom-input-group">
                <button>Modifier/Ajouter <i class="fa-solid fa-arrow-right"></i></button>
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
</body>
</html>
