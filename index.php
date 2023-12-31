

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Cucina - Snack Italien</title>
  <meta name="title" content="Minicucina - Restaurant Italien">

  <link rel="stylesheet" type="text/css" href="frontendAssets/css/styles.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">

</head>

<body id="top">

  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">Minicucina</p>
  </div>





  <!-- 
    - #TOP BAR
  -->


  <div class="topbar">
    <div class="container">

      <address class="topbar-item">
        <div class="icon">
          <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">
          78 Rue Saint-Pierre de Vaise, 69009 Lyon
        </span>
      </address>


      <div class="separator"></div>

      <div class="topbar-item item-2">
        <div class="icon">
          <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
        </div>

        <span class="span">Ouvert du lundi au vendredi de 11h à 15h</span>
      </div>
 
      <div class="separator"></div>
    </div>
  </div>




  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="frontendAssets/images/logo_minicucina.png" width="160" height="50" alt="Logo Mini Cuccina">
      </a>

      <nav class="navbar" data-navbar>

        <button class="close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>


        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link hover-underline active">
              <div class="separator"></div>

              <span class="span">Accueil</span>
            </a>
          </li>

          <li class="navbar-item">
            <a href="#menu" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Menu</span>
            </a>
          </li>
         
          <li class="navbar-item">
            <a href="#about" class="navbar-link hover-underline">
              <div class="separator"></div>

              <span class="span">Contact</span>
            </a>
          </li>
        </ul>

        <div class="text-center">
          <div class="separator"></div>

          <p class="menu-text text-center">
            
            Ouvert du lundi au vendredi de <span class="span">11h</span> à <span class="span">15h.</span>
          </p>
          <p class="headline-1 navbar-title">Nous trouver</p>

        
        
          <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=4.785601781672313,45.76134376179301,4.819601781672313,45.78134376179301&amp;layer=mapnik&amp;marker=45.77134376179301,4.802601781672313" width="100%" height="300" frameborder="0" scrolling="no"></iframe>

          <a class="adresse" href="https://www.google.fr/maps/place/78+Rue+Saint-Pierre+de+Vaise,+69009+Lyon/@45.7711567,4.8000698,17z/data=!3m1!4b1!4m6!3m5!1s0x47f4eb71401fadd1:0xe372cb05abf0622!8m2!3d45.7711567!4d4.8026447!16s%2Fg%2F11c1jh8vf9?entry=ttu" class="topbar-item link">
            <div class="icon">
              <ion-icon name="location-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
            </div>
            <span class="span ">78 rue Saint Pierre de Vaise</span>
    
          </a>

       
        </div>
   

      </nav>

      
      <a id="reserverMenu" href="tel:0631513927" class="btn btn-primary">
        <div class="icon">
          <ion-icon name="call-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
        </div>
        <span class="text text-1">Reserver</span>

        <span class="text text-2" aria-hidden="true">+33 6 31 51 39 27</span>
      </a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero text-center" aria-label="home" id="home">

        <ul class="hero-slider" data-hero-slider>

          <li class="slider-item active" data-hero-slider-item>

            <div class="slider-bg">
              <img src="frontendAssets/images/hero-slider-1.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

            <p class="label-2 section-subtitle slider-reveal">Cuisine Italienne</p>

            <h1 class="display-1 hero-title slider-reveal">
              La saveur d'une <br> cuisine italienne !
        
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venez découvrir la restauration italienne !
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Voir le menu</span>

              <span class="text text-2" aria-hidden="true">Voir le menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="frontendAssets/images/hero-slider-2.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

           
            <p class="label-2 section-subtitle slider-reveal">Cuisine Italienne</p>

            <h1 class="display-1 hero-title slider-reveal">
              La rapidité d'un snack !<br> 
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venez découvrir la restauration italienne !
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Voir le menu</span>

              <span class="text text-2" aria-hidden="true">Voir le menu</span>
            </a>

          </li>

          <li class="slider-item" data-hero-slider-item>

            <div class="slider-bg">
              <img src="frontendAssets/images/hero-slider-3.jpg" width="1880" height="950" alt="" class="img-cover">
            </div>

           
            <p class="label-2 section-subtitle slider-reveal">Cuisine Italienne</p>

            <h1 class="display-1 hero-title slider-reveal">
              Plats sains et gourmands.<br>Prix abordables !
             
            </h1>

            <p class="body-2 hero-text slider-reveal">
              Venez découvrir la restauration italienne ! 
            </p>

            <a href="#menu" class="btn btn-primary slider-reveal">
              <span class="text text-1">Voir le menu</span>

              <span class="text text-2" aria-hidden="true">Voir le menu</span>
            </a>

          </li>

        </ul>

        <button class="slider-btn prev" aria-label="slide to previous" data-prev-btn>
          <ion-icon name="chevron-back"></ion-icon>
        </button>

        <button class="slider-btn next" aria-label="slide to next" data-next-btn>
          <ion-icon name="chevron-forward"></ion-icon>
        </button>

        <a href="#about" class="hero-btn has-after">
          <img src="frontendAssets/images/hero-icon.png" width="48" height="48" alt="booking icon">

          <span class="label-2 text-center span">Réserver une table</span>
        </a>

      </section>


      <!-- 
        - #ABOUT
      -->

      <section class="section about text-center" aria-labelledby="about-label" id="about">
        <div class="container">

          <div class="about-content">

            <p class="label-2 section-subtitle" id="about-label">Notre histoire</p>

            <h2 class="headline-1 section-title">Mini Cucina</h2>

            <p class="section-text">
              Sur place / A emporter <br>
              Horaires d'ouverture : <br>
              Le midi de 11h30 à 14h30, du lundi au vendredi. <br>
              Nos produits étant cuisinés maison chaque jour, merci de nous appeler pour confirmer notre ouverture le soir. <br>
              <br>
              Pour les groupes, réservations possibles en dehors des horaires habituels, contactez-nous ! <br>
              N'hésitez à réserver vos plats à l'avance par téléphone (SMS ou appel) pour gagner du temps!
            </p>
          
            <a class="adresse" href="https://www.google.fr/maps/place/78+Rue+Saint-Pierre+de+Vaise,+69009+Lyon/@45.7711567,4.8000698,17z/data=!3m1!4b1!4m6!3m5!1s0x47f4eb71401fadd1:0xe372cb05abf0622!8m2!3d45.7711567!4d4.8026447!16s%2Fg%2F11c1jh8vf9?entry=ttu" class="topbar-item link">
              <div class="icon">
                <ion-icon name="location-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
              </div>
              <span class="span ">78 rue Saint Pierre de Vaise</span>
            </a>
            

            <a id="reserverMenu" href="tel:0631513927" class="btn btn-primary">
              <div class="icon">
                <ion-icon name="call-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
              </div>
              <span class="text text-1">Reserver</span>
      
              <span class="text text-2" aria-hidden="true">+33 6 31 51 39 27</span>
            </a>
            

          </div>

          <figure class="about-banner">

            <img src="frontendAssets/images/about-banner.jpg"  width="570" height="570" loading="lazy" alt="about banner"
              class="w-100" data-parallax-item data-parallax-speed="1">

            <div class="abs-img abs-img-1 has-before" data-parallax-item data-parallax-speed="1.75">
              <img src="frontendAssets/images/about-abs-image.jpg"   width="285" height="285" loading="lazy" alt=""
                class="w-100">
            </div>

            <div class="abs-img abs-img-2 has-before">
              <img  src="frontendAssets/images/badge-2.png" width="133" height="134" loading="lazy" alt="">
            </div>

          </figure>

          <img  src="frontendAssets/images/shape-3.png" width="197" height="194" loading="lazy" alt="" class="shape">

        </div>
      </section>


      <!-- 
        - #MENU
      -->

            <section class="section menu" aria-label="menu-label" id="menu">
        <div class="container">
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



            // Fermez la connexion à la base de données
            $db = null;

            // Créez une liste clé-valeur avec les données
            $listeCleValeur = [
                'entrees' => $entreesData,
                'plats' => $platsData,
                'desserts' => $dessertsData
            ];
            $joursSemaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];
          

            echo '<h1 class="section-subtitle text-center" id="alacarte">À LA CARTE</h1>';
            foreach ($joursSemaine as $jour){
              $jourMajuscule = mb_convert_case($jour, MB_CASE_UPPER, 'UTF-8');
              echo'  <h2 class="headline-1 section-title text-center">'.$jourMajuscule.'</h2>';
              foreach ($listeCleValeur as $cle => $valeur){
                echo '<p class="section-subtitle text-center label-2">'.$cle.'</p>';
                echo '<ul class="grid-list">';
                foreach ($valeur as $repas){
                  if ($repas[$jour] == 1){
                      echo '<li>
                      <div class="menu-card hover:card">
                    
                        <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                          <img src="frontendAssets/images/'. $cle . '/'. $repas['nom_fichier'] . '" width="100px" height="100px" loading="lazy" alt="Entrée italienne" class="img-cover-carte">
                        </figure>
                    
                        <div>
                    
                          <div class="title-wrapper">
                            <h3 class="title-3">
                              <a href="#" class="card-title">'.$repas['nom'].'</a>
                            </h3>
                    
                            <span class="badge label-1"></span>
                    
                            <span class="span title-2">'.$repas['prix'].' €</span>
                          </div>
                    
                          <p class="card-text label-1">
                          '.$repas['description'].'
                          </p>
                    
                        </div>
                    
                      </div>
                    </li>';
                    }

                  }
                echo '</ul>';
              }
              
            }
      
          
          ?>









          <h2 class="headline-1 section-title text-center">LUNDI</h2>
        

              <p class="section-subtitle text-center label-2">ENTREE</p>
              <ul class="grid-list">
               
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree2.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade jambon tomate</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Œuf, jambon, tomateq, croûtons, menthe
                      </p>
                
                    </div>
                
                  </div>
                </li>

              </ul>

              <p class="section-subtitle text-center label-2">PLATS</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats1.jpeg" width="100" height="100" loading="lazy" alt="Spaghetti Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Spaghetti Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Sauce bolognaise, spaghetti italiens
                      </p>
                    </div>
                  </div>
                </li>
    
              </ul>

              <p class="section-subtitle text-center label-2">DESSERTS</p>
                  

              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts1.jpeg" width="100" height="100" loading="lazy" alt="Tartelette" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tartelette</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tartelette garnie de fruits rouges frais
                      </p>
                    </div>
                  </div>
                </li>

              </ul>
          

  
          <h2 class="headline-1 section-title text-center">MARDI</h2>
        

              <p class="section-subtitle text-center label-2">ENTREE</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
    
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree1.jpeg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                    </figure>
    
                    <div>
    
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Vrap boeuf tomate</a>
                        </h3>
    
                        <span class="badge label-1"></span>
    
                        <span class="span title-2">3,50 €  </span>
                      </div>
    
                      <p class="card-text label-1">
                        Tomates, viande de boeuf, pain italien
                      </p>
    
                    </div>
    
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree2.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade jambon tomate</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Œuf, jambon, tomateq, croûtons, menthe
                      </p>
                
                    </div>
                
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree3.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade végétarienne</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Tomates, radis, salade, croûtons 
                      </p>
                
                    </div>
                
                  </div>
                </li>
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">PLATS</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats1.jpeg" width="100" height="100" loading="lazy" alt="Spaghetti Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Spaghetti Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Sauce bolognaise, spaghetti italiens
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats2.jpeg" width="100" height="100" loading="lazy" alt="Lasagne Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Lasagne Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Couches de pâtes, sauce bolognaise, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats3.jpeg" width="100" height="100" loading="lazy" alt="Cannelloni à la Parmesan" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Cannelloni à la Parmesan</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">7,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Cannelloni farcis, sauce parmesan, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats4.jpeg" width="100" height="100" loading="lazy" alt="Pizza Mozzarella" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Pizza Mozzarella</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">10,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mozzarella, sauce tomate, pâte à pizza italienne
                      </p>
                    </div>
                  </div>
                </li>
                
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">DESSERTS</p>
                  

              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts1.jpeg" width="100" height="100" loading="lazy" alt="Tartelette" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tartelette</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tartelette garnie de fruits rouges frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts2.jpeg" width="100" height="100" loading="lazy" alt="Salade de Fruits" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade de Fruits</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mélange de fruits frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts3.jpeg"width="100" height="100" loading="lazy" alt="Tiramisu au Café" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tiramisu au Café</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tiramisu à la saveur riche du café
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts4.jpeg" width="100" height="100" loading="lazy" alt="Panna Cotta à la Fraise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Panna Cotta à la Fraise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Panna Cotta garnie de coulis de fraise
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
          

  
          <h2 class="headline-1 section-title text-center">MERCREDI</h2>
        

              <p class="section-subtitle text-center label-2">ENTREE</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
    
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree1.jpeg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                    </figure>
    
                    <div>
    
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Vrap boeuf tomate</a>
                        </h3>
    
                        <span class="badge label-1"></span>
    
                        <span class="span title-2">3,50 €  </span>
                      </div>
    
                      <p class="card-text label-1">
                        Tomates, viande de boeuf, pain italien
                      </p>
    
                    </div>
    
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree2.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade jambon tomate</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Œuf, jambon, tomateq, croûtons, menthe
                      </p>
                
                    </div>
                
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree3.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade végétarienne</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Tomates, radis, salade, croûtons 
                      </p>
                
                    </div>
                
                  </div>
                </li>
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">PLATS</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats1.jpeg" width="100" height="100" loading="lazy" alt="Spaghetti Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Spaghetti Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Sauce bolognaise, spaghetti italiens
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats2.jpeg" width="100" height="100" loading="lazy" alt="Lasagne Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Lasagne Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Couches de pâtes, sauce bolognaise, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats3.jpeg" width="100" height="100" loading="lazy" alt="Cannelloni à la Parmesan" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Cannelloni à la Parmesan</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">7,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Cannelloni farcis, sauce parmesan, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats4.jpeg" width="100" height="100" loading="lazy" alt="Pizza Mozzarella" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Pizza Mozzarella</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">10,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mozzarella, sauce tomate, pâte à pizza italienne
                      </p>
                    </div>
                  </div>
                </li>
                
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">DESSERTS</p>
                  

              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts1.jpeg" width="100" height="100" loading="lazy" alt="Tartelette" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tartelette</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tartelette garnie de fruits rouges frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts2.jpeg" width="100" height="100" loading="lazy" alt="Salade de Fruits" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade de Fruits</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mélange de fruits frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts3.jpeg"width="100" height="100" loading="lazy" alt="Tiramisu au Café" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tiramisu au Café</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tiramisu à la saveur riche du café
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts4.jpeg" width="100" height="100" loading="lazy" alt="Panna Cotta à la Fraise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Panna Cotta à la Fraise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Panna Cotta garnie de coulis de fraise
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
          

  
          <h2 class="headline-1 section-title text-center">JEUDI</h2>
        

              <p class="section-subtitle text-center label-2">ENTREE</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
    
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree1.jpeg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                    </figure>
    
                    <div>
    
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Vrap boeuf tomate</a>
                        </h3>
    
                        <span class="badge label-1"></span>
    
                        <span class="span title-2">3,50 €  </span>
                      </div>
    
                      <p class="card-text label-1">
                        Tomates, viande de boeuf, pain italien
                      </p>
    
                    </div>
    
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree2.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade jambon tomate</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Œuf, jambon, tomateq, croûtons, menthe
                      </p>
                
                    </div>
                
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree3.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade végétarienne</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Tomates, radis, salade, croûtons 
                      </p>
                
                    </div>
                
                  </div>
                </li>
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">PLATS</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats1.jpeg" width="100" height="100" loading="lazy" alt="Spaghetti Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Spaghetti Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Sauce bolognaise, spaghetti italiens
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats2.jpeg" width="100" height="100" loading="lazy" alt="Lasagne Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Lasagne Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Couches de pâtes, sauce bolognaise, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats3.jpeg" width="100" height="100" loading="lazy" alt="Cannelloni à la Parmesan" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Cannelloni à la Parmesan</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">7,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Cannelloni farcis, sauce parmesan, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats4.jpeg" width="100" height="100" loading="lazy" alt="Pizza Mozzarella" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Pizza Mozzarella</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">10,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mozzarella, sauce tomate, pâte à pizza italienne
                      </p>
                    </div>
                  </div>
                </li>
                
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">DESSERTS</p>
                  

              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts1.jpeg" width="100" height="100" loading="lazy" alt="Tartelette" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tartelette</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tartelette garnie de fruits rouges frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts2.jpeg" width="100" height="100" loading="lazy" alt="Salade de Fruits" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade de Fruits</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mélange de fruits frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts3.jpeg"width="100" height="100" loading="lazy" alt="Tiramisu au Café" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tiramisu au Café</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tiramisu à la saveur riche du café
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts4.jpeg" width="100" height="100" loading="lazy" alt="Panna Cotta à la Fraise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Panna Cotta à la Fraise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Panna Cotta garnie de coulis de fraise
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
          

  
          <h2 class="headline-1 section-title text-center">VENDREDI</h2>
        

              <p class="section-subtitle text-center label-2">ENTREE</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
    
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree1.jpeg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                    </figure>
    
                    <div>
    
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Vrap boeuf tomate</a>
                        </h3>
    
                        <span class="badge label-1"></span>
    
                        <span class="span title-2">3,50 €  </span>
                      </div>
    
                      <p class="card-text label-1">
                        Tomates, viande de boeuf, pain italien
                      </p>
    
                    </div>
    
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree2.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade jambon tomate</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Œuf, jambon, tomateq, croûtons, menthe
                      </p>
                
                    </div>
                
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/entrees/entree3.jpeg" width="100" height="100" loading="lazy" alt="Entrée italienne" class="img-cover">
                    </figure>
                
                    <div>
                
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade végétarienne</a>
                        </h3>
                
                        <span class="badge label-1"></span>
                
                        <span class="span title-2">3,50 €</span>
                      </div>
                
                      <p class="card-text label-1">
                        Tomates, radis, salade, croûtons 
                      </p>
                
                    </div>
                
                  </div>
                </li>
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">PLATS</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats1.jpeg" width="100" height="100" loading="lazy" alt="Spaghetti Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Spaghetti Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Sauce bolognaise, spaghetti italiens
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats2.jpeg" width="100" height="100" loading="lazy" alt="Lasagne Bolognaise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Lasagne Bolognaise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">6,50 €</span>
                      </div>
                      <p class="card-text label-1">
                        Couches de pâtes, sauce bolognaise, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats3.jpeg" width="100" height="100" loading="lazy" alt="Cannelloni à la Parmesan" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Cannelloni à la Parmesan</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">7,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Cannelloni farcis, sauce parmesan, fromage
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/plats/plats4.jpeg" width="100" height="100" loading="lazy" alt="Pizza Mozzarella" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Pizza Mozzarella</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">10,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mozzarella, sauce tomate, pâte à pizza italienne
                      </p>
                    </div>
                  </div>
                </li>
                
                
 
           
              </ul>

              <p class="section-subtitle text-center label-2">DESSERTS</p>
                  

              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts1.jpeg" width="100" height="100" loading="lazy" alt="Tartelette" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tartelette</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tartelette garnie de fruits rouges frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts2.jpeg" width="100" height="100" loading="lazy" alt="Salade de Fruits" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Salade de Fruits</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">2,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Mélange de fruits frais
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts3.jpeg"width="100" height="100" loading="lazy" alt="Tiramisu au Café" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Tiramisu au Café</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Tiramisu à la saveur riche du café
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="menu-card hover:card">
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/desserts/desserts4.jpeg" width="100" height="100" loading="lazy" alt="Panna Cotta à la Fraise" class="img-cover">
                    </figure>
                    <div>
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Panna Cotta à la Fraise</a>
                        </h3>
                        <span class="badge label-1"></span>
                        <span class="span title-2">3,00 €</span>
                      </div>
                      <p class="card-text label-1">
                        Panna Cotta garnie de coulis de fraise
                      </p>
                    </div>
                  </div>
                </li>
              </ul>


              <h2 class="headline-1 section-title text-center">BOISSONS</h2>
        

              <p class="section-subtitle text-center label-2">Alcool</p>
              <ul class="grid-list">
                <li>
                  <div class="menu-card hover:card">
    
                    <figure class="card-banner img-holder" style="--width: 100; --height: 100;">
                      <img src="frontendAssets/images/boissons/pinte-de-biere.jpg" width="100" height="100" loading="lazy" alt="Greek Salad" class="img-cover">
                    </figure>
    
                    <div>
    
                      <div class="title-wrapper">
                        <h3 class="title-3">
                          <a href="#" class="card-title">Bière blonde</a>
                        </h3>
    
                        <span class="badge label-1"></span>
    
                        <span class="span title-2">4,50 €  </span>
                      </div>
    
                      <p class="card-text label-1">
                       Pinte 500 ml de Guinness
                      </p>
    
                    </div>
    
                  </div>
                </li>
                <li>
          
 
           
              </ul>




       
       

        
          <img src="frontendAssets/images/shape-5.png"  width="921" height="1036" loading="lazy" alt="shape"
            class="shape shape-2 move-anim">
          <img src="frontendAssets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
            class="shape shape-3 move-anim">

        </div>
        <a id="reserverMenu" href="tel:0631513927" class="btn btn-primary">
          <div class="icon">
            <ion-icon name="call-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
          </div>
          <span class="text text-1">Reserver</span>

          <span class="text text-2" aria-hidden="true">+33 6 31 51 39 27</span>
        </a>

      
      </section>

    </article>
    

  <!-- 
    - #FOOTER
  -->

  <footer class="footer section has-bg-image text-center"
  style="background-color: black">
  <div class="container enfantfooter">

    <div class="footer-top grid-list">

    

      <ul class="footer-list">
          <a href="mailto:contact@mini-cucina.com" class="topbar-item link">
            <div class="icon">
              <ion-icon name="mail-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
            </div>
    
            <span class="span">contact@mini-cucina.com</span>
          </a>
          <a href="tel:0631513927" class="topbar-item link">
            <div class="icon">
              <ion-icon name="call-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
            </div>
    
            <span class="span">+33 6 31 51 39 27</span>
          </a>
        
          <a href="https://www.google.fr/maps/place/78+Rue+Saint-Pierre+de+Vaise,+69009+Lyon/@45.7711567,4.8000698,17z/data=!3m1!4b1!4m6!3m5!1s0x47f4eb71401fadd1:0xe372cb05abf0622!8m2!3d45.7711567!4d4.8026447!16s%2Fg%2F11c1jh8vf9?entry=ttu" class="topbar-item link">
            <div class="icon">
              <ion-icon name="location-outline" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
            </div>
            <span class="span">78 rue Saint Pierre de Vaise</span>
          </a>
    
          <a href="https://www.facebook.com/Mini-Cucina-734394433315059/photos/?ref=page_internal" class="topbar-item link">
            <div class="icon">
              <ion-icon name="logo-facebook" aria-hidden="true" role="img" class="md hydrated"></ion-icon>
            </div>
            <span class="span">Facebook</span>
          </a>
      </ul>
      <ul class="footer-list">

        <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=4.785601781672313,45.76134376179301,4.819601781672313,45.78134376179301&amp;layer=mapnik&amp;marker=45.77134376179301,4.802601781672313" width="100%" height="300" frameborder="0" scrolling="no"></iframe>
        
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p class="copyright">
      &copy; 2022 Grilli. All Rights Reserved | Crafted by <a href="https://github.com/codewithsadee"
        target="_blank" class="link">codewithsadee</a>
    </p>
  </div>
</footer>

  </main>




  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>
  <!-- 
    - custom js link
  -->

  <script src="frontendAssets/js/script.js"></script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
