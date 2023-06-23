<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="d-flex justify-content-center" id="main">
    <div class="d-flex row login justify-content-center">
        <h1 class="d-flex justify-content-center title">It's time to fight</h1>
        <div class="match_card">

            <div class="match_card">
                <?php include_once('match.php'); ?>
                <div class="match_name"></div>
                <img class="card_img" src="" alt="">
                <div class="matching_tools">
                    <div class="match"><i class="fa-solid fa-thumbs-up"></i></div>
                    <div class="unmatch"><i class="fa-solid fa-thumbs-down"></i></div>
                </div>
            </div>
        </div>

        <a class="d-flex justify-content-center title" href="my_account"><button id="back_to_profil" class="ufc_button">Retourner au profil</button></a>
    </div>
</div>
<?php include_once('footer.php'); ?>