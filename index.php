<?php

foreach ($conn->query('SELECT COUNT(*) FROM commentaires') as $row) {

    echo "<span id='nbComment'>" . "Il y a " . $row['COUNT(*)'] . " commentaires." . "</span>";
    echo "<br>";
}

$limite = 10;
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
}
else {
    $conn->select_db($dbname);
    $sql = "SELECT id, pseudo, comment, DATE_FORMAT(date, '%d-%m-%Y') as date FROM commentaires";
    $result = mysqli_query($conn, $sql);
    $conn->query($sql);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        ?>
        <span><?= $row['id'] . ' ' ?></span>
        <p><?= $row['comment'] . "<br>" ?></p>
        <span><?php echo " rédigé par " . $row['pseudo'] . " le " . $row['date'] . '<br><br>' ?></span>
        <?php

    }

    for ($page = 1; $page <= $nbPages; $page++) {
        echo '<a href="cityTrip.php?page=' . $page . '">' . $page . '</a> ';
    }

    // $conn->close();
}
?>