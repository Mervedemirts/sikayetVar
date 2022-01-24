<?php include("header.php");
include("navbar.php");
?>
<div class="tm-main-content">
  <!-- hoşgeldiniz  -->
  <?php
  if (isset($_SESSION['user_id'])) {
  ?>
    <div id="kullaniciBilgi" class="tm-content-box tm-content-box-home">
      <?php include("kullanicibilgi.php"); ?>
    </div>

  <?php
  } else {
  ?>
    <div id="login" class="tm-content-box tm-content-box-home">
      <?php include("girisyap.php"); ?>
    </div>
  <?php } ?>
  <div class="tm-content-box tm-content-box-home">
    <?php include("hosgeldiniz.php"); ?>
  </div>

  <div id="gallery" class="tm-content-box">
    <?php include("sikayetler.php"); ?>
  </div>
  <?php
  include("footer.php");
  ?>