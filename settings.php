<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="d-flex justify-content-center" id="main">
    <div class="d-flex row login justify-content-center">
        <h1 class="d-flex justify-content-center title">Modifier mes filtres</h1>
        <div class="d-flex justify-content-center no-padding">
            <form action="controllers/controller.match.php" method="post">
                <label for="genre">Genre</label>
                <select name="genre">
                    <option value="%%">Libre</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
                <label for="poids">Poids</label>
                <select name="poids">
                    <option value="%%">Poids Libre</option>
                    <option value="flyweight">Poids Mouches</option>
                    <option value="bantamweight">Poids Coqs</option>
                    <option value="featherweight">Poids Plumes</option>
                    <option value="lightweight">Poids Légers</option>
                    <option value="welterweight">Poids Mi-Moyens</option>
                    <option value="middleweight">Poids Moyens</option>
                    <option value="lightheavyweight">Poids Mi-Lourds</option>
                    <option value="heavyweight">Poids Lourds</option>
                </select>
                <button type="submit" class="ufc_button width100">Mettre à jour mes préférences</button>
            </form>
        </div>
        <a href="my_account"><button id="cancel_index" class="ufc_button width100">Annuler</button></a>
    </div>
</div>
</div>
<?php include_once('footer.php'); ?>