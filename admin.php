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

$sqlAdmin = "SELECT pseudo FROM admin";
$result = mysqli_query($conn, $sqlAdmin);
$conn->query($sqlAdmin);
echo $conn->error;

while ($row = mysqli_fetch_array($result)) {
    $pseudo = $row['pseudo'];
}

echo "Bonjour $pseudo !";
echo "<br>";
echo "Vous êtes bien connectée à la page Administrateur.";
echo "<br><br>";

?>
<span style="font-weight: bold">Pour retourner à la page d'accueil et déconnecter votre session, veuillez cliquer sur le bouton ci-dessous : </span>
<form action="stopSession.php" method="post">
    <button type="submit">Se déconnecter</button>
</form>

<?php


echo "Votre blog disposera d'un espace administrateur permettant d'écrire / modifier / supprimer les articles, 
de modérer ( éditer ou supprimer ) les commentaires.";
?>


<div id="divAdmin">
    <div id="divAdmin1">
        <fieldset class="fieldsetAdmin">
            <legend>Ajouter un article :</legend>
            <button type="submit" name="button"><a href="ajouter.php">Lien pour pouvoir ajouter un article</a></button>
        </fieldset>

        <fieldset class="fieldsetAdmin">
            <legend>Supprimer un article :</legend>
            <button><a href="supprimeAffiche.php">Lien pour pouvoir supprimer un article</a></button>
        </fieldset>

        <fieldset class="fieldsetAdmin">
            <legend>Modifier un article :</legend>
            <button><a href="modifAffiche.php">Lien pour pouvoir modifier un article</a></button>
        </fieldset>
    </div>
    <div id="divAdmin2">
        <fieldset class="fieldsetAdmin">
            <legend>Ajouter un commentaire :</legend>
            <button type="submit" name="button"><a href="ajoutComment.php">Lien pour pouvoir ajouter un commentaire</a></button>
        </fieldset>

        <fieldset class="fieldsetAdmin">
            <legend>Supprimer un commentaire :</legend>
            <button type="submit" name="button"><a href="supprimeAfficheComment.php">Lien pour pouvoir supprimer un commentaire</a></button>
        </fieldset>

        <fieldset class="fieldsetAdmin">
            <legend>Modifier un commentaire :</legend>
            <button type="submit" name="button"><a href="">Lien pour pouvoir modifier un commentaire</a></button>
        </fieldset>
    </div>
</div>

</body>

<?php


$theme = isset($_POST['theme']);
$titre = utf8_decode(isset($_POST['titre']));
$contenu = utf8_decode(isset($_POST['contenu']));
$date = isset($_POST['date']);
$image = isset($_POST['image']);



$sql = "INSERT INTO articles VALUES (NULL, '$theme', '$titre', '$contenu', '$date', '$image')";
if ($conn->query($sql)){
    echo "L'article <span style='font-weight: bold'>utf8_encode($titre)</span> a bien été ajouté.";
}
else{
    echo $conn->error;
}

?>




