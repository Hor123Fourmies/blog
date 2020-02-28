
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

if(isset($_POST['pseudo'])){
    $session['pseudo'] = $_POST['pseudo'];
}
if(isset($_POST['password'])){
    $session['password'] = $_POST['password'];
}

$idA_post = $_POST['id'];
//$idA_get = $_GET['id'];
//echo $idA_post;


if(isset($_POST['id'])){
    $idC_post = $_POST['id'];
}
if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
}

// echo $idC_post;
// echo $comment;


$update = "UPDATE commentaires SET comment='$comment' WHERE id=$idC_post";

$conn->query($update);
echo $conn->error;

echo "<br><br>";


if ($conn->query($update)) {
    print "Le commentaire <span style='font-weight: bold'>$idA_post</span> a bien été mis à jour.";
    echo "<br><br>";
    echo "Redirection vers la page administrateur.";
}
else {
    print $conn->error;
}

header('Refresh:2;url=admin.php');
