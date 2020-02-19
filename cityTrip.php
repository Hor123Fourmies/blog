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

<h2>~ City-Trip ~</h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    echo $conn->connect_error;
} else {
    $conn->select_db($dbname);
    $sql = "SELECT id, theme, titre, contenu, DATE_FORMAT(date, '%d-%m-%Y') as date, image FROM articles order by id desc";
    $result = mysqli_query($conn, $sql);
    $conn->query($sql);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div id="divArticle">
            <div id="divTxtImageComm">
                <div id="divTexte">
                    <span id="spanId"><?php echo "Article n° : ".$row['id'] . "<br>" ?></span>
                    <span id="spanTitre"><?php echo utf8_encode($row['titre']) . "<br>" ?></span>
                    <p id="pContenu"><?php echo utf8_encode($row['contenu']) . "<br>" ?></p>
                    <span id="spanDate"><?php echo " -- Rédigé le " . $row['date'] . " -- " ?></span>
                </div>
                <div id="divPhotoComment">
                    <img src="images/<?php echo $row["image"]?>\">
                </div>
                <div id="divCommentaire">
                    <span id="spanCommentaire">Commentaires :</span>

                    <?php

                    foreach ($conn->query('SELECT COUNT(*) FROM commentaires') as $row) {
                        echo "<br>";
                        echo "<span id='nbComment'>" . "Il y a " . $row['COUNT(*)'] . " commentaires." . "</span>";
                        echo "<br>";
                    }

                    $limite = 4;
                    $nbPages = ceil($row['COUNT(*)'] / $limite);

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $this_page_first_result = ($page - 1) * $limite;


                    $conn->select_db($dbname);
                    $sqlComment = "SELECT id, pseudo, comment, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaires ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $limite;
                    // $sqlComment = "SELECT c.id, pseudo, comment, DATE_FORMAT(c.date, '%d-%m-%Y') as date FROM commentaires as c LEFT JOIN articles as a ON (c.id_article = a.id) ORDER BY c.id DESC LIMIT " . $this_page_first_result . ',' . $limite;
                    $resultComment = mysqli_query($conn, $sqlComment);
                    $conn->query($sqlComment);
                    echo $conn->error;

                    while ($row = mysqli_fetch_array($resultComment)) {
                        ?>
                        <span><?= $row['id']. ' ' ?></span>
                        <p><?= $row['comment'] . "<br>" ?></p>
                        <span style="font-size: 14px"><?php echo " rédigé par " . $row['pseudo'] . " le " . $row['date'] . '<br><br>' ?></span>
                        <?php

                    }

                    for ($page = 1; $page <= $nbPages; $page++) {

                        echo '<a href="cityTrip.php?page=' . $page . '">' . $page . '</a> ';
                    }

                    // $conn->close();

                    ?>



                </div>

            </div>

        </div>

        <?php echo "<br><br><br>";
    }
}
?>
</body>
