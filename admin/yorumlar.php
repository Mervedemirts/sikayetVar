<?php include("header.php");


if (isset($_GET['silid'])) {
  $id = $_GET['silid'];
  $sil = $db->prepare("DELETE FROM comment WHERE id = {$id}");
  $sil->execute();
  header('Location:yorumlar.php?silme=ok');
}
?>
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col-lg-6 col-7">
          <h6>Yorumlar</h6>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <?php if (isset($_GET['silme'])) {
      ?>

        <div class="alert alert-danger alert-dismissible" style="margin:2%">

          <strong>Silindi</strong>
        </div>
      <?php
      } ?>
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Yorum</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Şikayet İD</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sil</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlString = "SELECT * FROM comment";
            $message = $db->prepare($sqlString);
            $message->execute();
            foreach ($message as $messages) {
            ?>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm"><?php echo $messages["id"]; ?></h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs font-weight-bold"><?php echo $messages["comment"]; ?> </span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs font-weight-bold"><?php echo $messages["reportid"]; ?> </span>
                </td>



                <td class="align-middle text-center text-sm">
                  <a href="yorumlar.php?silid=<?php echo $messages["id"]; ?>" style="background-color:darkred;border-radius:30%;color:white;padding:8px">
                    Sil
                  </a>
      </div>
      </td>
      </tr><?php  } ?>
    </tbody>
    </table>
    </div>
  </div>
</div>
</div>
</main>
<?php include("footer.php"); ?>