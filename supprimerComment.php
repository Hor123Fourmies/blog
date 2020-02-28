
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

session_start();

if (isset($_POST['pseudo'])) {
    $session['pseudo'] = $_POST['pseudo'];
}
if (isset($_POST['password'])) {
    $session['password'] = $_POST['password'];
}

$id_article_get = $_GET['id'];
// echo $id_article_get;




$supprime = "DELETE FROM `commentaires` WHERE id=$id_article_get";
$result = $conn->query($supprime);
echo $conn->error;


echo "<br>";
if ($conn->query($supprime)) {
    print "Le commentaire n°<span style='font-weight: bold'>$id_article_get</span> a bien été supprimé.";
    echo "<br><br>";
    echo "Redirection vers la page Admin...";
} else {
    print $conn->error;
}

header ('Refresh:2;url=admin.php');