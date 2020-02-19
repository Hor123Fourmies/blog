<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<?php
session_start();
echo "Déconnexion en cours...";
session_destroy();

header('Refresh:2;url=accueil.html');