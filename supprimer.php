
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

$recup = "SELECT id, theme, titre FROM articles ORDER BY id DESC";
//$sql = "SELECT a.id, titre, contenu, DATE_FORMAT(a.date, '%d-%m-%Y') as date, image, c.comment FROM articles as a LEFT JOIN commentaires as c ON (a.id = c.id_article) ORDER BY a.id DESC";
$result2 = mysqli_query($conn, $recup);
$conn->query($recup);
echo $conn->error;

while ($row = $result2->fetch_assoc()) {
    $idA = $row['id'];
}


// Supprimer un article


    $supprime = "DELETE FROM `articles` WHERE id=$idA";
    $result = $conn->query($supprime);
    echo $conn->error;


    echo "<br>";
    if ($conn->query($supprime)) {
        print "L'article n°<span style='font-weight: bold'>$idA</span> a bien été supprimé.";
    } else {
        print $conn->error;
    }

header ('Refresh:2;url=admin.php');
