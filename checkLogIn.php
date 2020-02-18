<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

$recup = "SELECT pseudo, password FROM admin WHERE pseudo = '$pseudo' AND password='$password'";
$requete = $conn->query($recup);

$row = $requete->fetch_assoc();
//echo $row['username'];
if ($row['pseudo'] == $pseudo AND $row['password'] == $password) {
    echo 'bravo !';
    session_start();
    $session['pseudo'] = $_POST['pseudo'];
    $session['password'] = $_POST['password'];
    header('location: admin.php');
} else {
    echo "Erreur";
}
