
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
<span style="font-weight: bold">Pour retourner à la page d'accueil et déconnecter votre session, veuillez cliquer sur le bouton ci-dessous : </span>
<form action="stopSession.php" method="post">
    <button type="submit">Se déconnecter</button>
</form>


<fieldset>
    <legend>Modifier un article :</legend>
    <?php
    $conn->select_db($dbname);

    $idA = isset($row['id']);

    $recup = "SELECT id, theme, titre, contenu FROM articles ORDER BY id DESC";
    $result = mysqli_query($conn, $recup);
    $conn->query($recup);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        $idA = isset($row['id']);
        ?>

        <div id="">
            <?php

            echo"<button type=\"submit\" name=\"button\"><a href = 'modifier.php?id=$idA'>Modifier</a></button>";
            echo "<br>";?>
            <span><?php echo "Article n° : " . $row['id'] . "<br>" ?></span>
            <span><?php echo utf8_encode($row['titre']) . "<br>" ?></span>
        </div>
        <?php
    }
    ?>
</fieldset>
