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


$insertUser= "INSERT INTO users VALUES (NULL, pseudo, password)";
$requete = $conn->query($insertUser);

if ($requete){
    echo "bravo, vous êtes connecté";
}
else{
    echo "erreur";
}
/*
$row = $requete->fetch_assoc();

if ($row['pseudo'] === $pseudo && ($row['password']) === $password) {
    echo 'bravo v !';
    session_start();
    $session['pseudo'] = $_POST['pseudo'];
    $session['password'] = $_POST['password'];
    header('location: ajoutComment2.php');
    //header('location: read.php');
} else {
    echo "Erreur";
}
*/