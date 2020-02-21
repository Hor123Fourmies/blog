<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<header>
    <nav class="navText">
        <ul>
            <li class="navText"><a href="accueil.html">Accueil</a></li>
            <li>|</li>
            <li class="navText"><a href="cityTrip.php">City-trip</a></li>
            <li>|</li>
            <li class="navText"><a href="weekEnd.php">Week-end au vert</a></li>
            <li>|</li>
            <li class="navText"><a href="europe.php">Europe</a></li>
            <li>|</li>
            <li class="navText"><a href="destLointaine.php">Destinations lointaines</a></li>
            <li>|</li>
            <li class="navText" id="navAdmin"><a href="logIn.php">Admin</a></li>
        </ul>
    </nav>
</header>


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
    echo "Identifiants incorrects";
    echo "<br>";
    echo "Retour à la page d'accueil...";
    header('Refresh:2;url=accueil.html');
}
