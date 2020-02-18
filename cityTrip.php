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
    $sql = "SELECT id, theme, titre, contenu, DATE_FORMAT(date, '%d-%m-%Y') as date FROM articles order by id desc";
    $result = mysqli_query($conn, $sql);
    $conn->query($sql);
    echo $conn->error;

    while ($row = mysqli_fetch_array($result)) {
        echo "Article n°". $row['id'] . " "."<br>";?>
        <span style="font-size: 18px"><?php echo utf8_encode($row['titre'])?></span>
        <span style="font-size: 18px"><?php echo utf8_encode($row['contenu'])?></span>
        <?php echo " rédigé le ".$row['date']."." .'<br><br>';

    }
}