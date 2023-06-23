<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="d-flex justify-content-center">
    <div class="row login">
        <h1 class="d-flex justify-content-center title">Modifier mes infos</h1>
        <div class="d-flex justify-content-center no-padding">
            <form action="controllers/controller.update.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Ton email" required>
                <input type="text" name="pays" value="<?= $pays ?>" placeholder="Ton pays" required>
                <input type="text" name="adresse" value="<?= $adresse ?>" placeholder="Ton adresse" required>
                <input type="text" name="zipcode" value="<?= $zipcode ?>" placeholder="Ton zipcode" required>
                <input type="text" name="ville" value="<?= $ville ?>" placeholder="Ta ville" required>
                <button type="submit" class="ufc_button width100">Modifier mes infos</button>
                <button type="reset" class="ufc_button width100">Recommencer</button>
            </form>
        </div>
        <a href="my_account"><button id="cancel_index" class="ufc_button width100">Annuler</button></a>
        <a class="delete_account" href="delete_account">Supprimer mon compte</a>
    </div>
</div>
</div>
<?php include_once('footer.php'); ?>