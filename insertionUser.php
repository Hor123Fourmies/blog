<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<header>
    <nav class="navText">
        <ul>
            <li class="navText"><a href="accueil.html">Accueil</a></li>
            <li>|</li>
            <li class="navText"><a href="cityTrip.php" class="enCours">City-Trip</a></li>
            <li>|</li>
            <li class="navText"><a href="weekEnd.php">Week-end au vert</a></li>
            <li>|</li>
            <li class="navText"><a href="europe.php">Europe</a></li>
            <li>|</li>
            <li class="navText"><a href="destLointaine.php">Destinations lointaines</a></li>
            <li>|</li>
            <li class="navText" id="navAdmin"><a href="logIn.php">Admin</a></li>
            <li>|</li>
            <li class = "navText"><a href='identificationUser.php'>Créer un compte<a/></li>
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


//session_start();

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];


$insertUser= "INSERT INTO users VALUES (NULL, '$pseudo', '$password')";

if ($conn->query($insertUser) === TRUE) {
    echo "Merci <span style='color: #651a1a'>$pseudo</span>, votre nom est bien enregistré.";
}
else{
    echo "Erreur : " . $insertUser . "<br>" . $conn->error;
}

/*
$row = $requete->fetch_assoc();

if ($row['pseudo'] === $pseudo && ($row['password']) === $password) {

    session_start();
    $session['pseudo'] = $_POST['pseudo'];
    $session['password'] = $_POST['password'];
    // header('location: ajoutComment2.php');

} else {
    echo "Erreur";
}
*/