<?php 
session_start();
include_once('db.php');
$db->delete_account($_SESSION["id"]);
$_SESSION = array();
session_destroy();
header("Location: index");
