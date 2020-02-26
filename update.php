<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

session_start();

if(isset($_POST['pseudo'])){
    $session['pseudo'] = $_POST['pseudo'];
}
if(isset($_POST['password'])){
    $session['password'] = $_POST['password'];
}

//$idA_post = $_POST['id'];
$idA_get = $_GET['id'];
echo $idA_get;


/*
$recup = "SELECT id, theme, titre, contenu FROM articles WHERE id=$idA_get";
$result4 = mysqli_query($conn, $recup);
$conn->query($recup);
echo $conn->error;


while ($row = $result4->fetch_assoc()) {
$idA = $row['id'];

}


$update = "UPDATE articles SET contenu = 'ok' WHERE id=$idA_get";

$conn->query($update);
echo $conn->error;

echo "<br><br>";


if ($conn->query($update)) {
    print "L'article <span style='font-weight: bold'>$idA_get</span> a bien été mis à jour.";
}
else {
    print $conn->error;
}
*/