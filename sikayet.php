<?php
$sikayetler = $db->prepare("SELECT * FROM report WHERE active = 1 AND id = " . $_GET['id']);
$sikayetler->execute();
$sikayet = $sikayetler->fetch();

$sirketler = $db->prepare("SELECT * FROM company WHERE id = " . $sikayet['companyid']);
$sirketler->execute();
$sirket = $sirketler->fetch();

$kullanicilar = $db->prepare("SELECT * FROM user WHERE id = " . $sikayet['userid']);
$kullanicilar->execute();
$kullanici = $kullanicilar->fetch();

?>
<hr>
<div class="col-sm-12 bg-light">
    <div class="row" style="margin-top:2%">
        <div class="col-sm-12" style="color:gray">Kullanıcı</div>
        <div class="col-sm-1"><img src="https://i.tmgrup.com.tr/gq/original/17-06/22/user_male_circle_filled1600.png" style="width:20px;height:20px" alt=""></div>
        <div class="col-sm-3" style="margin-left:-5%"><b><?php echo $kullanici['firstname'] . " " . $kullanici['lastname']; ?></b></div>
    </div>
    <div class="col-sm-3"></div>
    <hr>
    <div class="row">
        <div class="col-sm-6" style="color:gray">Şikayet</div>
    </div>
    <div class="col-sm-12"><?php echo $sikayet['issue']; ?></div>
    <hr>

    <div class="row">
        <div class="col-sm-2" style="color:gray;font-size:12px">Şirket :</div>

        <div class="col-sm-4" style="font-size:12px;margin-left:-12%"><?php echo $sirket['companyname'] ?></div>
    </div>
    <hr>
</div>