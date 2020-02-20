<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<header>
    <nav class="navText">
        <a href="cityTrip.php">City-trip</a>
    </nav>
    <nav>|</nav>
    <nav class="navText"><a href="weekEnd.php">Week-end au vert</a></nav>
    <nav>|</nav>
    <nav class="navText"><a href="europe.php">Europe</a></nav>
    <nav>|</nav>
    <nav class="navText"><a href="destLointaine.php">Destinations lointaines</a></nav>
    <nav>|</nav>
    <nav class="navText" id="navAdmin"><a href="logIn.php">Admin</a></nav>
</header>

<?php

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

<?php
echo "Votre blog disposera d'un espace administrateur permettant d'écrire / modifier / supprimer les articles, 
de modérer ( éditer ou supprimer ) les commentaires.";
?>

</body>
