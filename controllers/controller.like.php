<?php 
session_start();
include_once('../db.php');
$db->like_query($_SESSION['id'], $_POST['id']);
