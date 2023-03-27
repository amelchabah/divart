<?php

function dbConnect()
{
    // $db = new PDO('mysql:host=localhost;dbname=divart;port:3306', 'root', '');
    $db = new PDO('mysql:host=localhost;dbname=divart;port:3306', 'root', '');
    return $db;
}

function getAllBookings()
{
    $db=dbConnect();
    $query=$db->query("SELECT * FROM reservations ORDER BY date");
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

    header('Content-Type: application/json');
    echo json_encode($response);

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
