<?php require('header.php'); ?>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: my_account");
}
?>
<?php require('nav.php'); ?>
<div id="main">
    <?php require('ask.php'); ?>
</div>