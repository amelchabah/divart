<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=divart;port:3306', 'root', '');
    return $db;
}

function getAllBookings()
{
    $db=dbConnect();
    $query=$db->query("SELECT * FROM reservations");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getOneBooking($id)
{
    $db=dbConnect();
    $query=$db->query("SELECT * from reservations WHERE id=$id");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addBooking($date, $horaire, $amount, $prenom, $nom, $mail)
{
    $db=dbConnect();
    $query=$db->prepare("INSERT INTO reservations (id, date, horaire, amount, prenom, nom, mail) VALUES (NULL, ?, ?, ?, ?, ?, ?)");

    if ($query->execute([$date, $horaire, $amount, $prenom, $nom, $mail])){
        $response = array(
            'status' => 1,
            'status_message' =>'Booking Added Successfully.'
        ); 
    }else{
        $response = array(
            'status' => 0,
            'status_message' =>'Booking Addition Failed.'
        );
    }

    // header('Content-Type: application/json');
    // header('Location: ../merci.html');
    header('Location: https://divart-museum.noamsebahoun.fr/merci.html');
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
    
    $message = '<img src="https://divart-museum.noamsebahoun.fr/assets/tableaux/monet_printemps.jpg" style="height:5rem;width:100%;object-fit:cover"><br><div><h1 style="color:black;font-style:italic;">Merci ' . $prenom .' !</h1><h2 style="color:black;font-style:italic">Votre réservation a bien été prise en compte.</h2><hr><h3 style="color:black">Détails de la commande</h3><article><h4 style="color:black;margin:0">Le <b>' . date('M d, Y', strtotime($date)) . '</b> à <b>' . $horaire . '</b></h4><h4 style="color:black;margin:0">Plein tarif - Gratuit<span>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</span>x'. $amount .'</h4></article><hr style="margin-top:1rem"><p style="color:black"><i>Un problème ? Besoin d\'un renseignement ? Contactez-nous à l\'adresse <b>divart.contact@gmail.com</b>. Nous vous répondrons dans les plus brefs délais.</i></p><h3 style="color:black;font-style:italic">Bonne visite!</h3><img src="http://divart.antona.butmmi.o2switch.site/wp-content/uploads/2023/02/logo-divart-edited.png" style="height:3rem">';


    mail($mailTo, $subject, $message, $headers);
}

function deleteBooking($id)
{
    $db=dbConnect();
    $query=$db->prepare("DELETE FROM reservations WHERE id=$id");
    if ($query->execute()){
        $response = array(
            'status' => 1,
            'status_message' => 'Booking Delete Successfully'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Booking Delete Failed'
        );
    }
    header('Content-Type: application:json');
    echo json_encode($response);
}

function connexionUser($pseudo, $mdp) {
    $db=dbConnect();
    $query=$db->query("SELECT * from admin");
    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    if (password_verify($mdp, $result[0]['mdp']) && $pseudo == $result[0]['pseudo']) {
            $response = array (
                'status' => 1,
                'status_message' => 'Connexion réussie'
            );
        } else {
            $response = array (
                'status' => 0,
                'status_message' => 'Connexion échouée'
            );
        }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>