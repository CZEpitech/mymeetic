<?php 
include_once('db.php');
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$id = $_SESSION['id'];
$query = "SELECT * from users where id = \"$id\"";
$result = $db->pdo->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
$email = $_SESSION["email"] = $row["email"];
$prenom = $_SESSION["prenom"] = $row["prenom"];
$nom = $_SESSION["nom"] = $row["nom"];
$date_de_naissance = $_SESSION["date_de_naissance"] = $row["date_de_naissance"];
$adresse = $_SESSION["adresse"] = $row["adresse"];
$zipcode = $_SESSION["zipcode"] = $row["zipcode"];
$ville = $_SESSION["ville"] = $row["ville"];
$pays = $_SESSION["pays"] = $row["pays"];
$genre = $_SESSION["genre"] = $row["genre"];
$mot_de_passe = $_SESSION["mot_de_passe"] = $row["mot_de_passe"];
$picture = "users/$id.png";
}
