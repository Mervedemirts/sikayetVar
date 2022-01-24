<?php
include 'header.php';
$id = $_SESSION['user_id'];
$company = $db->prepare("SELECT * FROM company ");
$company->execute();
$ok = false;
if (isset($_POST['add'])) {
    $company = $_POST['company'];
    $issue = $_POST['issue'];
    $report = $db->prepare("insert into report(userid,companyid,issue,active) values({$id},{$company},'{$issue}',0)");
    $report->execute();
    $ok = true;
}
?><br>
<h2 style="color:purple;text-align:center">Şikayet Ekle</h2>
<?php if ($ok) {
?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Ekleme Başarılı!</strong>
    </div>
<?php
} ?>
<hr style="background-color: purple;">
<form action="" method="post">
    <div class="row text-center" style="color:white;background-color:purple;margin-top:5%;border-radius:3%;padding:10%;padding-top:1%;">
        <div class="col-sm-12" style></div><br>
        <div class="col-sm-12">
            Şirket:
            <select name="company" id="">
                <option value=""></option>
                <?php foreach ($company as $c) {
                ?>

                    <option value="<?php echo $c['id'] ?>"><?php echo $c['companyname'] ?></option>
                <?php


                } ?>

            </select><br>
        </div>
        <div class="col-sm-12">Şikayet:</div>
        <div class="col-sm-12">
            <textarea name="issue" style="width:100%;" id="" cols="100" rows="10"></textarea>
        </div><br>
        <div class="col-sm-12">
            <button type="submit" style="width: 100%;" name="add" class="btn btn-outline-light">Şikayeti Ekle</button>
        </div>
    </div>


</form>