
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

<?php

$idA_post = isset($_POST['id']);
$idA_get = $_GET['id'];
echo "<br>";
echo "Vous allez modifier l'article n° $idA_get.";
echo "<br>";


$recup = "SELECT id, theme, titre, contenu FROM articles WHERE id=$idA_get";
$result3 = mysqli_query($conn, $recup);
$conn->query($recup);
echo $conn->error;

while ($row = $result3->fetch_assoc()) {
$idA = $row['id'];

?>

<form action="" method="post">
    <div>
        <div>
            <input type="hidden" name="id" value="<?php echo $idA_get; ?>">
        </div>
        <label for="theme">Thème :</label>
        <select name="theme">
            <option value="cityTrip"<?php if (utf8_encode($row['theme']) === 'cityTrip') {
                echo "selected = 'selected'";
            } ?>>City-Trip
            </option>
            <option value="weekEnd"<?php if (utf8_encode($row['theme']) === 'weekEnd') {
                echo "selected = 'selected'";
            } ?>>Week-End au vert
            </option>
            <option value="europe"<?php if (utf8_encode($row['theme']) === 'Europe') {
                echo "selected = 'selected'";
            } ?>>Europe
            </option>
            <option value="destLoin"<?php if (utf8_encode($row['theme']) === 'DestLoin') {
                echo "selected = 'selected'";
            } ?>>Destinations lointaines
            </option>
        </select>
    </div>
    <div>
        <label for="theme">Titre :</label>
        <input type="text" name=titre value="<?php echo utf8_encode($row['titre']) ?>">
    </div>
    <div>
        <label for="contenu">Contenu :</label>
        <textarea rows="20" cols="10"><?php echo utf8_encode($row['contenu']) ?></textarea>
    </div>

    <button type="submit" name="button">Mettre à jour</button>

</form>
<?php
}
/*
$theme = $row['theme'];
$titre = $row['titre'];
$contenu = $row['contenu'];

$update = "UPDATE articles SET theme = '$theme', titre = '$titre', contenu = '$contenu' WHERE id=$idA";

$conn->query($update);
echo $conn->error;

echo "<br><br>";


if ($conn->query($update)) {
    print "L'article n° <span style='font-weight: bold'>$idA</span> a bien été mis à jour.";
} else {
    print $conn->error;
}
*/