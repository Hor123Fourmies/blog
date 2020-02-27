<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


//session_start();

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

$recup = "SELECT pseudo, password FROM users WHERE username = '$username' AND password = '$password'";
$requete = $conn->query($recup);

$row = $requete->fetch_assoc();

if ($row['pseudo'] === $pseudo && ($row['password']) === $password) {
    echo 'bravo !';
    session_start();
    $session['pseudo'] = $_POST['pseudo'];
    $session['password'] = $_POST['password'];
    header('location: ajoutComment2.php');
    //header('location: read.php');
} else {
    echo "Erreur";
}


