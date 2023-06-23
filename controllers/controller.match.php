<?php 
session_start();
include_once('../db.php');
$db->match_query($_POST['genre'], $_POST['poids']);
