<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=divart;port:3306', 'root', '');
    return $db;
}

function getAllBookings()
{
    $db = dbConnect();
    $query = $db->query("SELECT * FROM reservations");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getOneBooking($id)
{
    $db = dbConnect();
    $query = $db->query("SELECT * from reservations WHERE id=$id");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addBooking($date, $horaire, $amount, $prenom, $nom, $mail)
{
    $db = dbConnect();
    $query = $db->prepare("INSERT INTO reservations (id, date, horaire, amount, prenom, nom, mail) VALUES (NULL, ?, ?, ?, ?, ?, ?)");

    if ($query->execute([$date, $horaire, $amount, $prenom, $nom, $mail])) {
        $response = array(
            'status' => 1,
            'status_message' => 'Réservation bien ajoutée.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de réservation.'
        );
    }

    // header('Content-Type: application/json');
    header('Location: ../merci.html');
    echo json_encode($response);
}

function sendBooking($date, $horaire, $amount, $prenom, $nom, $mail)
{
    $mailTo = "$mail";
    $subject = "Votre réservation a bien été confirmée!";
    $from = 'divart.contact@gmail.com';

    // type de contenu (HTML)

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // message HTML pour le client
    $htmlContent = '<html><head><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet"></head><body><div style="font-family:\'DM Sans\', sans-serif;width: 60%;display: flex; flex-direction: column; align-items: center; justify-content: center;"><img src="./assets/logo.svg" alt="logo divart"><h2>Merci pour votre réservation ' . $prenom .' ' . $nom . '!</h2><h3>Votre réservation a bien été prise en compte.</h3><hr><h4>Détails de la commande</h4><h5><b>Commande passée le : </b>date</h5><br><article><div style="display:flex;justify-content:space-between;margin-top:2rem;margin-left:auto;margin-right:auto;align-items:center;margin-bottom:2rem"><h5>Plein tarif</h5><div style="display:flex;justify-content:space-between;align-items:center;gap:3rem"><h5>Gratuit</h5><h5>x' . $amount . '</h5></div></div><hr><h5>Le <b>' . date('M d, Y', strtotime($date)) . '</b> à <b>' . $horaire . '</b></h5><hr><p>Un problème ? Besoin d\'un renseignement ? Contactez-nous à l\'adresse <b>divart.contact@gmail.com</b>. Nous vous répondrons dans les plus brefs délais.</p><br><h4>Bonne visite!</h4></article></div></body></html>';

    mail($mailTo, $subject, $htmlContent, $headers);

    // ecriture du mail pour le gestionnaire, en html

    // $headersAdmin = "Content-type: text/html; charset=utf-8\n";
    // $subjectAdmin = "Nouvelle réservation!";
    // $mailToAdmin = "amelou518@gmail.com";
    // $messageAdmin = '<div style="font-family:noto sans, sans-serif">Nouvelle réservation!</div>';

    // mail($mailToAdmin, $subjectAdmin, $messageAdmin, $headersAdmin);
    // header("Location: thankyou.html");
}


function deleteBooking($id)
{
    $db = dbConnect();
    $query = $db->prepare("DELETE FROM reservations WHERE id=$id");
    if ($query->execute()) {
        $response = array(
            'status' => 1,
            'status_message' => 'Réservation supprimée avec succès.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de la suppression de réservation.'
        );
    }
    header('Content-Type: application:json');
    echo json_encode($response);
}


function inscriptionUser($pseudo, $mdp)
{
    $db = dbConnect();
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO admin (id, pseudo, mdp) VALUES (1, ?, ?)");
    if ($query->execute([$pseudo, $mdp_hash])) {
        $response = array(
            'status' => 1,
            'status_message' => 'Administrateur ajouté avec succès.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Echec de l\'ajout de l\'administrateur.'
        );
    }
    header('Location: localhost:3000');
    echo json_encode($response);
}

function connexionUser($pseudo, $mdp)
{
    $db = dbConnect();
    $query = $db->query("SELECT * from admin WHERE pseudo='$pseudo'");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if (password_verify($mdp, $result[0]['mdp'])) {
        $response = array(
            'status' => 1,
            'status_message' => 'Administrateur connecté.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Connexion de l\'administrateur échouée.'
        );
    }
    header('Location: localhost:3000');
    echo json_encode($response);
}
