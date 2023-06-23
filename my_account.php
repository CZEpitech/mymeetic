<?php include_once('header.php'); ?>
<?php
$picture = "users/$id.png";
?>

<?php include_once('nav.php'); ?>



<div class="d-flex justify-content-center" id="main">
    <div class="d-flex row login justify-content-center">
        <img class="profil_picture" src="<?php echo $picture ?>" alt="">
        <h1 class="d-flex justify-content-center title"><?php echo "$nom $prenom"; ?></h1>
        <a class="d-flex justify-content-center title" href="change_profil_pic"><button class="ufc_button">Change profil picture</button></a>
        <a class="d-flex justify-content-center title" href="logout"><button class="ufc_button">Logout</button></a>
        <a class="d-flex justify-content-center title" href="fight"><button class="ufc_button">Let's fight</button></a>
        <a class="d-flex justify-content-center title" href="combats"><button class="ufc_button">Mes combats</button></a>
        <a class="d-flex justify-content-center title" href="settings"><button class="ufc_button">Settings</button></a>
        <a class="d-flex justify-content-center title" href="edit_info"><button class="ufc_button">Edit profil</button></a>
    </div>
</div>
<?php include_once('footer.php'); ?>