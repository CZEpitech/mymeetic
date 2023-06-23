<?php include_once('header.php'); ?>
<?php include_once('nav.php'); ?>
<div class="d-flex justify-content-center" id="main">
  <div class="d-flex row login justify-content-center">
    <form action="controllers/controller.profil_pic.php" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
      <input type="submit" value="Changer de photo de profil" name="submit">
    </form>
    <a class="d-flex justify-content-center title" href="my_account"><button id="back_to_profil" class="ufc_button">Retourner au profil</button></a>
  </div>
</div>
<?php include_once('footer.php'); ?>