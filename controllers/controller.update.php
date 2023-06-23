<?php 
include_once('../db.php');
$db->update_user($_POST["email"], $_POST["pays"], $_POST["ville"], $_POST["adresse"], $_POST["zipcode"], $_POST["id"]);
