<?php 
include_once('../db.php');
$db->verify_users($_POST["mot_de_passe"], $_POST["email"]);
