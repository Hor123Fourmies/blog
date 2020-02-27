
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
    echo $_POST['pseudo'];
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

<div>
    <fieldset>
        <legend>Ajouter un commentaire :</legend>
        <form action="" method="post">
            <div>
                <label for="id_article">Article n° :</label>
                <input type="number" name="id_article">
            </div>
            <div>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" value="<?php echo $pseudo?>">
            </div>
            <div>
                <label for="comment">Commentaire :</label>
                <textarea type="text" name="comment" rows="5" cols="5"></textarea>
            </div>
            <div>
                <label for="date">Date :</label>
                <input type="text" name="date">
            </div>

            <button type="submit" name="button">Ajouter un commentaire</button>

        </form>

    </fieldset>


    <?php

    if (isset($_POST['id_article'])){
        $id_article = $_POST['id_article'];
    }
    if (isset($_POST['pseudo'])){
        $pseudo = utf8_decode($_POST['pseudo']);
    }
    if (isset($_POST['comment'])){
        $comment = utf8_decode($_POST['comment']);
    }
    if (isset($_POST['date'])){
        $date = $_POST['date'];
    }


    $sql = "INSERT INTO commentaires VALUES (NULL, '$id_article', '$pseudo', '$comment', '$date')";
    if ($conn->query($sql)) {
        echo "<br>";
        echo "<span style='color: #651a1a; padding: 15px; font-weight: bold'>Votre commentaire a bien été ajouté.</span>";
    }
    else {
        echo $conn->error;
    }

    ?>
