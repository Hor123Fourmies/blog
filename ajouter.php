
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

<div>
<fieldset>
    <legend>Ajouter un article :</legend>
    <form action="" method="post">
        <div>
            <label for="theme">Thème :</label>
            <select name="theme">
                <option value=""></option>
                <option value="cityTrip">City-Trip</option>
                <option value="weekend">Week-end au vert</option>
                <option value="Europe">Europe</option>
                <option value="DestLoin">Destinations lointaines</option>
            </select>
        </div>
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre">
        </div>
        <div>
            <label for="contenu">Contenu :</label>
            <textarea id="contenu" name="contenu" rows="20" cols="10"></textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="text" name="date">
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="text" name="image">
        </div>

        <button type="submit" name="button">Ajouter un article</button>

    </form>

</fieldset>


<?php

if (isset($_POST['theme'])){
    $theme = $_POST['theme'];
}
if (isset($_POST['titre'])){
    $titre = utf8_decode($_POST['titre']);
}
if (isset($_POST['contenu'])){
    $contenu = utf8_decode($_POST['contenu']);
}
if (isset($_POST['date'])){
    $date = $_POST['date'];
}
if (isset($_POST['image'])){
    $image = $_POST['image'];
}

$sql = "INSERT INTO articles VALUES (NULL, '$theme', '$titre', '$contenu', '$date', '$image')";
if ($conn->query($sql)) {
    echo "L'article <span style='font-weight: bold'>$titre</span> a bien été ajouté.";
} else {
    echo $conn->error;
}

?>
