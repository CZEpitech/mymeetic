<?php 
include_once('../db.php');
$db->add_user_to_db($_POST["nom"], $_POST["prenom"], $_POST["genre"], $_POST["email"], $_POST["date_de_naissance"], $_POST["pays"], $_POST["ville"], $_POST["adresse"], $_POST["zipcode"], $_POST["mot_de_passe"]);
