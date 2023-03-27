document.addEventListener("DOMContentLoaded", function () {

    // form

    var today = new Date();
    var dd = today.getDate(); //récuperer le jour
    var mm = today.getMonth() + 1; //récupérer le mois, +1 car janvier = 0
    var yyyy = today.getFullYear(); //récupérer l'année

    if (dd < 10) {
        dd = '0' + dd;
    } //si la valeur du jour est inférieure à 10, ajouter un 0 devant le chiffre

    if (mm < 10) {
        mm = '0' + mm;
    } //de même pour les mois

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);


    //generation du message d'erreur lorsqu'une donnée est incorrecte
    let v = $("#booking-form").validate({
        errorElement: "span",
        errorClass: "error",
        errorPlacement: function (error, element) {
            error.insertBefore(element);
        }
    });

    $.extend($.validator.messages, {
        required: "Veuillez remplir ce champ.",
        email: "Veuillez entrer une adresse mail valide.",
        date: "Veuillez entrer une date valide.",
        number: "Veuillez entrer un nombre égal ou supérieur à 1.",
        range: jQuery.validator.format("Veuillez entrer une valeur située entre {0} et {1}."),
        max: jQuery.validator.format("Veuillez entrer une valeur inférieure ou égale à {0}."),
        min: jQuery.validator.format("Veuillez entrer une valeur supérieure ou égale à {0}.")
    });

    //au clic du bouton d'acces a l'etape 2...
    $(".next-btn1").click(function () {
        if (v.form()) {
            $(".tab-pane").hide();
            // $("#step1").hide();
            $("#step2").fadeIn(1000);
            $("#breadcrumbBillets").addClass('active-breadcrumb');
            document.querySelector('.recap .recap-date').innerHTML = 'Le <b>' + new Date(document.querySelector('.datepicker').value).toLocaleDateString() + '</b> à <b>' + document.querySelector("input[name='horaire']:checked").value + '</b>';
        }
        e.preventDefault();
    });

    //au clic du bouton d'acces a l'etape 3...
    $(".next-btn2").click(function () {
        if (v.form()) {
            if ($('#amount').val() !== '0') {
                $(".tab-pane").hide();
                // $("#step2").hide();
                $("#step3").fadeIn(1000);
                $("#breadcrumbBillets").addClass('active-breadcrumb');
                $("#breadcrumbConfirmation").addClass('active-breadcrumb');
                document.querySelector('.recap article').innerHTML = '<div class="tarif calcule"><h5>Plein tarif</h5><div class="prix"><h5>Gratuit</h5><h5>' + 'x' + document.querySelector('#amount').value + '</h5></div></div><hr><div class="tarif total"><h3>Total</h3><h4>Gratuit</h4></div>';
            }
        }
    });

    //au clic du bouton d'acces a l'etape 3 par le fil d'ariane...
    $("#breadcrumbConfirmation").click(function () {
        if (v.form()) {
            if ($('#amount').val() !== '0') {
                $(".tab-pane").hide();
                // $("#step2").hide();
                $("#step3").fadeIn(1000);
                $("#breadcrumbBillets").addClass('active-breadcrumb');
                $("#breadcrumbConfirmation").addClass('active-breadcrumb');
                document.querySelector('.recap article').innerHTML = '<div class="tarif calcule"><h5>Plein tarif</h5><div class="prix"><h5>Gratuit</h5><h5>' + 'x' + document.querySelector('#amount').value + '</h5></div></div><hr><div class="tarif total"><h3>Total</h3><h4>Gratuit</h4></div>';
            }
        }
    });

    //au clic du bouton de retour a l'etape 1 (fil d'ariane), cacher la tab, faire apparaitre l'etape 1
    $("#breadcrumbDate").click(function () {
        $(".tab-pane").hide();
        $("#step1").fadeIn(1000);
        $("#breadcrumbBillets").removeClass('active-breadcrumb');
        $("#breadcrumbConfirmation").removeClass('active-breadcrumb');
        $("#step2").hide();
        $("#step3").hide();
        $("#step2").css('display', 'none');
        $("#step3").css('display', 'none');
    });

    //au clic du bouton de retour a l'etape 2 (fil d'ariane), cacher la tab, faire apparaitre l'etape 2
    $("#breadcrumbBillets").click(function () {
        if ($("#step3").is(':visible')) {
            $(".tab-pane").hide();
            $("#step2").fadeIn(1000);
            $("#breadcrumbConfirmation").removeClass('active-breadcrumb');
            $("#breadcrumbBillets").addClass('active-breadcrumb');
            $("#step3").hide();
            $("#step3").css('display', 'none');
            $("#step1").css('display', 'none');
        } else {
            if (v.form()) {
                $(".tab-pane").hide();
                $("#step2").fadeIn(1000);
                $("#breadcrumbConfirmation").removeClass('active-breadcrumb');
                $("#breadcrumbBillets").addClass('active-breadcrumb');
                $("#step3").hide();
                $("#step3").css('display', 'none');
                $("#step1").css('display', 'none');
            }
        }
    });

    $('form').on('click', 'button:not([type="submit"])', function (e) {
        e.preventDefault();
    })
});
