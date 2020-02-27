
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

<form action="admin.php" method="post">
    <button type="submit">Retour à la page Admin</button>
</form>

<?php
$idC_post = isset($_POST['id']);
$idC_get = $_GET['id'];

echo "<br>";
echo "Vous allez modifier le commentaire n° $idC_get.";
echo "<br>";




$recup = "SELECT id, comment FROM commentaires WHERE id=$idC_get";
$result6 = mysqli_query($conn, $recup);
$conn->query($recup);
echo $conn->error;

while ($row = $result6->fetch_assoc()) {
$idC = $row['id'];

?>

<form action="updateComment.php" method="post">
    <div>

        <div>
            <input type="hidden" name="id" value="<?php echo $idC_get; ?>">
        </div>

        <label for="numero">Commentaire n° :</label>
        <input type="text" name="numéro" value="<?php echo $idC_get ?>">
    </div>
    <div>
        <label for="comment">Commentaire :</label>
        <textarea name="comment" rows="20" cols="10" ><?php echo utf8_encode($row['comment']) ?></textarea>
    </div>

    <?php
    echo "<button type=\"submit\" name=\"button\">Mettre à jour</button>";
    ?>
</form>
<?php
}







