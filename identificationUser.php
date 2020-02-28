<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<header>
    <nav class="navText">
        <ul>
            <li class="navText"><a href="accueil.html">Accueil</a></li>
            <li>|</li>
            <li class="navText"><a href="cityTrip.php" class="enCours">City-Trip</a></li>
            <li>|</li>
            <li class="navText"><a href="weekEnd.php">Week-end au vert</a></li>
            <li>|</li>
            <li class="navText"><a href="europe.php">Europe</a></li>
            <li>|</li>
            <li class="navText"><a href="destLointaine.php">Destinations lointaines</a></li>
            <li>|</li>
            <li class="navText" id="navAdmin"><a href="logIn.php">Admin</a></li>
            <li>|</li>
            <li class = "navText"><a href='identificationUser.php'>Créer un compte<a/></li>
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

?>

<form action="insertionUser.php" method="post">
    <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo">
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="text" name="password">
    </div>
    <div>
        <button type="submit" name="button">Créer un compte</button>
    </div>
</form>
</body>
</html>

<?php