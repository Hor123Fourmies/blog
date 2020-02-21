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


<p id="identifiants">
    <span style="font-weight: bold">Identifiants :</span>
    <span>pseudo : lola</span>
    <span>password : lola</span>
</p>

<fieldset>
    <legend><?php echo "Veuillez indiquer vos identifiants pour rejoindre l'espace administrateur :" ?></legend>
    <form action="checkLogIn.php" method="post">
        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="name" name="pseudo">
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="text" id="mdp" name="password">
        </div>

        <button type="submit">Se connecter</button>

    </form>
</fieldset>
</body>