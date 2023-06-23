<?php 
session_start();
include_once('../db.php');
$db->dislike_query($_SESSION['id'], $_POST['id']);
