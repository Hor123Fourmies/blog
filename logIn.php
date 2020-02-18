<link rel="stylesheet" href="styles.css">

<body style="background: cadetblue">
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