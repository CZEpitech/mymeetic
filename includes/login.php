<div class="d-flex justify-content-center">
    <div class="row login">
        <h1 class="d-flex justify-content-center title">Se connecter <i class="padding-l-10 fa-solid fa-lock"></i></h1>
        <div class="d-flex justify-content-center no-padding">

            <form action="controllers/controller.login.php" method="post">
                <div class="col">
                    <input type="email" name="email" value="" placeholder="Ton email" required>
                </div>
                <div class="col">
                    <input type="password" name="mot_de_passe" value="" placeholder="Ton mot de passe" required>

                </div>
                <div class="col">
                    <button type="submit" class="ufc_button width100">Se connecter</button>

                </div>
            </form>

        </div>
        <button id="cancel_index" class="ufc_button width100">Annuler</button>
    </div>

</div>
</div>
<?php include_once('../footer.php'); ?>