<link rel="stylesheet" href="styles.css">

<body class="bodyOnglet">

<header>
    <nav class="navText">
        <ul>
            <li class="navText"><a href="accueil.html">Accueil</a></li>
            <li>|</li>
            <li class="navText"><a href="cityTrip.php">City-Trip</a></li>
            <li>|</li>
            <li class="navText"><a href="weekEnd.php">Week-end au vert</a></li>
            <li>|</li>
            <li class="navText"><a href="europe.php" class="enCours">Europe</a></li>
            <li>|</li>
            <li class="navText"><a href="destLointaine.php">Destinations lointaines</a></li>
            <li>|</li>
            <li class="navText" id="navAdmin"><a href="logIn.php">Admin</a></li>
            <li>|</li>
            <li class = "navText"><a href='identificationUser.php'>Créer un compte<a/></li>
        </ul>
    </nav>
</header>

<h2>~ Europe ~</h2>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    echo $conn->connect_error;
}
else {
    $conn->select_db($dbname);
    $sql = "SELECT id, theme, titre, contenu, DATE_FORMAT(date, '%d-%m-%Y') as date, image FROM articles WHERE theme = 'europe' ORDER BY id DESC";
    //$sql = "SELECT a.id, titre, contenu, DATE_FORMAT(a.date, '%d-%m-%Y') as date, image, c.comment FROM articles as a LEFT JOIN commentaires as c ON (a.id = c.id_article) ORDER BY a.id DESC";
    $result = mysqli_query($conn, $sql);
    $conn->query($sql);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        $id_article = $row['id'];
        ?>

        <div id="divArticle">
            <div id="divImgTxt">
                <div id="divPhoto">
                    <img src="images/<?php echo $row["image"] ?>\">
                    <?php
                    echo "<button type=\"submit\" name='button'><a href='ajoutComment2.php?id=$id_article'>Ajouter un commentaire<a/></button>"
                    ?>
                </div>

                <div id="divTexte">
                    <span id="spanId"><?php echo "Article n° : " . $row['id'] . "<br>" ?></span>
                    <span id="spanTitre"><?php echo utf8_encode($row['titre']) . "<br>" ?></span>
                    <p id="pContenu"><?php echo utf8_encode($row['contenu']) . "<br>" ?></p>
                    <span id="spanDate"><?php echo " -- Rédigé le " . $row['date'] . " -- " ?></span>
                </div>
            </div>

            <div id="divCommentaire">

                <?php

                $total = $conn->query("SELECT COUNT(*) FROM `commentaires` where id_article = $id_article");
                $row = mysqli_fetch_assoc($total);
                $count = $row['COUNT(*)'];

                switch ($count){
                    case $count === 0:
                        echo "Il n'y a aucun commentaire.";
                        break;
                    case $count < 2:
                        echo "Il y a ".$count." commentaire :";
                        break;
                    case $count > 1:
                        echo "Il y a ".$count." commentaires :";
                        break;
                }


                $limite = 2;
                $nbPages = ceil($count / $limite);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $this_page_first_result = ($page - 1) * $limite;


                $conn->select_db($dbname);
                $sqlComment = "SELECT id, pseudo, comment, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaires where id_article = $id_article ORDER BY id DESC LIMIT $this_page_first_result,$limite";
                //echo $sqlComment;
                //$sqlComment = "SELECT c.id, pseudo, comment, DATE_FORMAT(c.date, '%d-%m-%Y') as date FROM commentaires as c LEFT JOIN articles as a ON (c.id_article = a.id) ORDER BY c.id DESC LIMIT " . $this_page_first_result . ',' . $limite;
                //$sqlComment = "SELECT c.id, id_article, pseudo, comment FROM commentaires as c RIGHT JOIN articles as a ON (c.id_article = a.id)";
                //$sqlComment = "SELECT c.id, c.pseudo, DATE_FORMAT(c.date, '%d-%m-%Y') as date, c.comment FROM articles as a RIGHT JOIN commentaires as c ON (a.id = c.id_article) ORDER BY c.id DESC";

                $resultComment = mysqli_query($conn, $sqlComment);
                $conn->query($sqlComment);
                echo $conn->error;

                while ($row = mysqli_fetch_array($resultComment)) {
                    ?>
                    <p id="pComment"><?= utf8_encode($row['comment']) ?></p>
                    <span class="spanCommentaire"><?= "Rédigé le " . $row['date'] . "<br>" ?></span>
                    <span class="spanCommentaire"><?= "Par " . $row['pseudo'] . "<br><br>" ?></span>
                    <?php
                }
                ?>
                <div id="paginationCommentaires">
                    <?php
                    for ($page = 1; $page <= $nbPages; $page++) {
                        echo '<a href="cityTrip.php?page=' . $page . '">' . $page . '</a> ';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <?php echo "<br><br><br>";
    }
}
?>
</body>
