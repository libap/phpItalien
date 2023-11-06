// Afficher nouvelle image  dans mode ajout 
function previewImage(input) {
    console.log("Changement de fichier détecté");

    // Récupérez le data-image de l'élément input
    var dataImage = input.getAttribute("data-image");

    // Sélectionnez l'élément image avec le même data-image
    var preview = document.querySelector('[data-image-afficher="' + dataImage + '"]');
    console.log("Élément sélectionné : ", preview);
    if (input.files && input.files[0]) {
        console.log("Fichier sélectionné :", input.files[0].name);
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "";
    }
}

// Afficher nouvelle image  dans mode édition 
function previewImageEdit(input) {
    console.log("Changement de fichier détecté (Édition)");

    // Récupérez le data-image de l'élément input
    var dataImage = input.getAttribute("data-image");

    // Sélectionnez l'élément image avec le même data-image-editer
    var preview = document.querySelector('[data-image-editer="' + dataImage + '"]');

    console.log("Élément sélectionné pour l'édition : ", preview);

    if (input.files && input.files[0]) {
        console.log("Fichier sélectionné pour l'édition :", input.files[0].name);
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = ""; // Remplacez "placeholder.jpg" par le chemin de l'image par défaut.
    }
}






$(function () {
    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', { el: this.el, multiple: this.multiple }, this.dropdown)
    }

    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }

    var accordion = new Accordion($('#accordion'), false);
});

//GERER LES POPUPS SUPPRESSION
document.addEventListener('DOMContentLoaded', function () {
    const iconePoubelles = document.querySelectorAll('.iconePoubelle');
    const popups = document.querySelectorAll('.popup');

    // Ajoutez un gestionnaire d'événements au clic sur les icônes de la corbeille
    iconePoubelles.forEach(iconePoubelle => {
        iconePoubelle.addEventListener('click', function () {
            const dataId = iconePoubelle.getAttribute('data-id');
            const popup = document.querySelector(`.popup[data-id="${dataId}"]`);

            // Affichez la popup correspondante
            popup.style.display = 'block';
        });
    });

    // Sélectionnez tous les boutons "Non" dans les popups
    const boutonsNon = document.querySelectorAll('.popup .popup-button-non');

    // Parcourez chaque bouton "Non" et ajoutez un gestionnaire d'événements au clic
    boutonsNon.forEach(boutonNon => {
        boutonNon.addEventListener('click', function () {
            // Récupérez le data-id du bouton "Non"
            const dataId = boutonNon.getAttribute('data-id');

            // Sélectionnez la popup correspondante
            const popup = document.querySelector('.popup[data-id="' + dataId + '"]');

            // Masquez la popup
            if (popup) {
                popup.style.display = 'none';
            }
        });
    });
});


