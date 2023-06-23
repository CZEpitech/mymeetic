<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="d-flex justify-content-center" id="main">
    <div class="d-flex row login justify-content-center">
        <h1 class="d-flex justify-content-center title">Pick an opponent</h1>
        <div class="match_card">
            <div class="match_card">
                <?php include_once('match_row.php'); ?>
                <a class="d-flex justify-content-center title" href="my_account"><button id="back_to_profil" class="ufc_button">Retourner au profil</button></a>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php'); ?>