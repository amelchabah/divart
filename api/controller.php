<?php

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
        addBooking(
            $date = $_POST['date'],
            $horaire = $_POST['horaire'],
            $amount = $_POST['amount'],
            $prenom = $_POST['prenom'],
            $nom = $_POST['nom'],
            $mail = $_POST['mail']
        );
        break;
    case 'DELETE':
        $id = intval($_GET['id']);
        deleteBooking($id);
        break;
};

?>