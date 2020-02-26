
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


if(isset($_POST['theme'])){
    $theme = $_POST['theme'];
}
if(isset($_POST['titre'])){
    $titre = $_POST['titre'];
}
if(isset($_POST['txtContenu'])){
    $txtContenu = utf8_decode($_POST['txtContenu']);
}


//echo $titre;
//echo $txtContenu;


$update = "UPDATE articles SET theme='$theme', titre='$titre', contenu = '$txtContenu' WHERE id=$idA_post";

$conn->query($update);
echo $conn->error;

echo "<br><br>";


if ($conn->query($update)) {
    print "L'article <span style='font-weight: bold'>$idA_post</span> a bien été mis à jour.";
    echo "<br><br>";
    echo "Redirection vers la page administrateur.";
}
else {
    print $conn->error;
}

header('Refresh:2;url=admin.php');