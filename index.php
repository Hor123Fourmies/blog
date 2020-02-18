<?php

$servername = "localhost";
$username = "id11175534_hor";
$password = "azerty";
$dbname = "blog";

foreach ($conn->query('SELECT COUNT(*) FROM articles') as $row) {

    echo "<span id='nbComment'>" . "Il y a " . $row['COUNT(*)']. " commentaires." . "</span>";
    echo "<br>";

}



$limite = 20;
$nbPages = ceil($row['COUNT(*)'] / $limite);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $limite;




$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    echo $conn->connect_error;
} else {
    $conn->select_db($dbname);
    $sql = "SELECT id, titre, contenu, DATE_FORMAT(date, '%d-%m-%Y') as date FROM articles";
    $result = mysqli_query($conn, $sql);
    $conn->query($sql);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        echo $row['id'] . ' ' ;
        ?><span style="font-size: 18px"><?php echo $row['titre']?></span>
        ?><span style="font-size: 18px"><?php echo $row['contenu']?></span>
        <?php echo " rédigé le ".$row['date']."." .'<br>';

    }

    for ($page = 1; $page <= $nbPages; $page++) {
        echo '<a href="comment.php?page=' . $page . '">' . $page . '</a> ';
    }

    // $conn->close();
}