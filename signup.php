<div class="d-flex justify-content-center">
    <div class="row login">
        <h1 class="d-flex justify-content-center title">S'inscrire <i class="padding-l-10 fa-solid fa-user-plus"></i></h1>
        <div class="d-flex justify-content-center no-padding">
            <form action="controllers/controller.signup.php" method="post">
                <input type="text" name="nom" value="" placeholder="Ton nom" required>
                <input type="text" name="prenom" value="" placeholder="Ton prenom" required>
                <select class="ufc_button width100" name="genre">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
                <input type="email" name="email" value="" placeholder="Ton email" required>
                <input type="date" name="date_de_naissance" value="" required>
                <input type="text" name="pays" value="" placeholder="Ton pays" required>
                <input type="text" name="adresse" value="" placeholder="Ton adresse" required>
                <input type="text" name="zipcode" value="" placeholder="Ton zipcode" required>
                <input type="text" name="ville" value="" placeholder="Ta ville" required>
                <input type="password" name="mot_de_passe" value="" placeholder="Ton mot de passe" required>
                <button type="submit" class="ufc_button width100">M'inscrire</button>
                <button type="reset" class="ufc_button width100">Recommencer</button>
            </form>
        </div>
        <button id="cancel_index" class="ufc_button width100">Annuler</button>
    </div>
</div>
</div>
<?php include_once('footer.php'); ?>