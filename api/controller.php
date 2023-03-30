<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

require('./model.php');

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = getOneBooking($id);
        } else {
            $result = getAllBookings();
        }
        header('Content-Type: application/json');
        echo json_encode($result);
        break;

    case 'POST':
        $donnees = json_decode(file_get_contents('php://input'), true);
        $pseudo = $donnees['pseudo'];
        $mdp = $donnees['mdp'];
        connexionUser($pseudo, $mdp);

        if (isset($_POST['date'], $_POST['horaire'], $_POST['amount'], $_POST['prenom'], $_POST['nom'], $_POST['mail']))
        {
            addBooking($_POST['date'], $_POST['horaire'], $_POST['amount'], $_POST['prenom'], $_POST['nom'], $_POST['mail']);
            sendBooking($_POST['date'], $_POST['horaire'], $_POST['amount'], $_POST['prenom'], $_POST['nom'], $_POST['mail']);
        }
        break;

    case 'DELETE':
        $id = intval($_GET['id']);
        deleteBooking($id);
        break;
};

?>