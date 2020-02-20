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
// $sqlComment = "SELECT c.id, pseudo, comment, DATE_FORMAT(c.date, '%d-%m-%Y') as date FROM commentaires as c LEFT JOIN articles as a ON (c.id_article = a.id) ORDER BY c.id DESC";

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


