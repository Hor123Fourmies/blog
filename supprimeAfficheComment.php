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


echo "Bonjour Lola !";
echo "<br>";
echo "Vous êtes bien connectée à la page Administrateur.";
echo "<br><br>";

?>
<fieldset>
    <legend>Supprimer un commentaire :</legend>
    <?php
    $conn->select_db($dbname);



    $recup = "SELECT id, id_article, comment, pseudo FROM commentaires ORDER BY id_article DESC, id DESC";
    $result5 = mysqli_query($conn, $recup);
    $conn->query($recup);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result5)) {
        $id_article = ($row['id']);
        ?>

<div id="">
    <?php

    echo"<button type=\"submit\" name=\"button\"><a href = 'supprimerComment.php?id=$id_article'>Supprimer</a></button>";
    echo "<br>";?>
    <span><?php echo "Article n° : " . $row['id_article'] . "<br>" ?></span>
    <span><?php echo "Commentaire n° : " . $row['id'] . "<br>" ?></span>
    <span><?php echo utf8_encode($row['comment']) . "<br>" ?></span>
    <span><?php echo utf8_encode($row['pseudo']) . "<br>" ?></span>
</div>
<?php
}
?>
</fieldset>
