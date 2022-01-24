<?php include("header.php");

if (isset($_GET['silid'])) {
    $id = $_GET['silid'];
    $sil = $db->prepare("DELETE FROM report WHERE  id = {$id}");
    $sil->execute();
    header('Location:onaylama.php?silme=ok');
}
if (isset($_GET['onaylaid'])) {
    $id = $_GET['onaylaid'];
    $onayla = $db->prepare("UPDATE report set active = 1 WHERE  id = {$id}");
    $onayla->execute();
    header('Location:onaylama.php?durum=ok');
}

?>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Şikayetler</h6>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['durum'])) {
        ?>

            <div class="alert alert-success alert-dismissible" style="margin:2%">

                <strong>Şikayet Onaylandı</strong>
            </div>
        <?php
        } ?>
        <?php if (isset($_GET['silme'])) {
        ?>

            <div class="alert alert-danger alert-dismissible" style="margin:2%">

                <strong>Silindi</strong>
            </div>
        <?php
        } ?>
        <div class="card-body px-0 pb-2">

            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kullanıcı İd</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Şirket Id</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Şikayet</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Onayla</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlString = "SELECT * FROM report where active = 0";
                        $sikayetler = $db->prepare($sqlString);
                        $sikayetler->execute();
                        foreach ($sikayetler as $sikayet) {
                        ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $sikayet["id"]; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $sikayet["userid"]; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $sikayet["companyid"]; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $sikayet["issue"]; ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <a href="onaylama.php?onaylaid=<?php echo $sikayet["id"]; ?>" style="background-color:green;border-radius:5%;color:white;padding:8px">
                                        Onayla
                                    </a>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <a href="onaylama.php?silid=<?php echo $sikayet["id"]; ?>" style="background-color:darkred;border-radius:30%;color:white;padding:8px">
                                        Sil
                                    </a>
                                </td>


                            </tr> <?php } ?>
                    </tbody>
                </table>