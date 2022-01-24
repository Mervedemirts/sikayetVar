<?php include('header.php');
$sql = "SELECT * FROM report";
if (isset($_GET['companyid'])) {
  $sql = "SELECT * FROM report where active = 1 AND companyid = " . $_GET['companyid'];
}
if (isset($_GET['userid'])) {
  $sql = "SELECT * FROM report where active = 1 AND userid = " . $_GET['userid'];
}
$sirketler = $db->prepare("SELECT * FROM company");
$sirketler->execute();
?>
<nav class="navbar navbar-expand-sm" style="background-color:purple;color:white;margin-top:10px">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <form action="tumsikayetler.php" method="get">
        <div class="form-group">
          <div class="row" style="margin-top:6%">
            <div class="col-sm-8">
              <select class="selectpicker" placeholder="Şirket Seçiniz" name="companyid">
                <option value="" selected disabled>Şirket Seçiniz</option>
                <?php foreach ($sirketler as $sirket) { ?>
                  <option value="<?php echo $sirket['id']; ?>"><?php echo $sirket['companyname']; ?></option>
            </div>

          <?php } ?>
          </select>
          </div>
          <div class="col-sm-4">
            <button type="submit" style="font-size:10px;margin-left:16%" class="btn btn-outline-light">Ara</button>
          </div>
      </form>
      </div>
    </li>

  </ul>

</nav>
<div class="col-sm-12 text-center" style="color:purple;margin-top:10px">
  <h2>ŞİKAYETLER</h2>
  <hr style="background-color:purple">
</div>
<div class="col-sm-12">
  <div class="row">
    <?php
    $sikayetler = $db->prepare($sql);
    $sikayetler->execute();
    foreach ($sikayetler as $sikayet) {
      $kullanıcı = $db->prepare("SELECT * FROM user WHERE id=" . $sikayet['userid']);
      $kullanıcı->execute();
      $rowKullanıcı = $kullanıcı->fetch();
      $sirket = $db->prepare("SELECT * FROM company WHERE id=" . $sikayet['companyid']);
      $sirket->execute();
      $rowSirket = $sirket->fetch();

    ?>
      <div class="col-sm-12">
        <div class="card" style="width:100%;margin-bottom:1.6%;border:1px dotted purple">
          <div class="card-body">
            <h5 class="card-title"><span style="font-size:13px;color:gray">Kullanıcı</span><br><?php echo $rowKullanıcı["firstname"] . " " . $rowKullanıcı["lastname"] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><span style="font-size:13px;color:gray;margin-right:3px">Şirket</span><?php echo $rowSirket['companyname']; ?></h6>
            <p class="card-text" style="font-size:16px;"><span style="font-size:13px;color:gray;margin-right:3px">Şikayet</span><?php echo substr($sikayet['issue'], 0, 100) . "..."; ?></p>
            <div class="text-center"><a href="sikayetdetay.php?id=<?php echo $sikayet['id']; ?>" style="background-color:purple;color:white;" class="btn"><span style="font-size:13px">Devamını Gör</span></a></div>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
</div>
<hr style="background-color:purple">
<?php include('footer.php'); ?>