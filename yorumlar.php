<?php
if (isset($_POST['yorumEkle'])) {
    $user = $_SESSION['user_id']; //sessiondan aldıgı veriyi kullanıcak
    $reportid = $_GET['id'];
    $yorumEkleme = $db->prepare("INSERT INTO comment (userid,reportid,comment) values($user,$reportid,'" . $_POST['yorum'] . "')");
    $yorumEkleme->execute();
}

$yorumlar = $db->prepare("SELECT * FROM comment where reportid =" . $_GET['id']);
$yorumlar->execute();
foreach ($yorumlar as $yorum) {
    $kullanicilar = $db->prepare("SELECT * FROM user WHERE id = " . $yorum['userid']);
    $kullanicilar->execute();
    $kullanici = $kullanicilar->fetch();
?>
    <div class="row"><span>
            <img src="img/arrow.png" width="75px" height="50px" alt=""></span>
        <div class="col-sm-11 bg-light" style="margin-left:10%;margin-top:-5%;z-index:1;">
            <div class="row" style="margin-top:2% ">
                <hr>
                <div class="col-sm-12" style="color:gray">Kullanıcı</div>
                <div class="col-sm-1"><img src="https://i.tmgrup.com.tr/gq/original/17-06/22/user_male_circle_filled1600.png" style="width:20px;height:20px" alt=""></div>
                <div class="col-sm-3" style="margin-left:-5%"><b><?php echo $kullanici['firstname'] . " " . $kullanici['lastname']; ?></b></div>
            </div>
            <hr>
            <div class="col-sm-3"></div>


            <div class="row">
                <div class="col-sm-6" style="color:gray">Yorum</div>
            </div>
            <div class="col-sm-12"><?php echo $yorum['comment']; ?></div>
            <hr><br>
        </div>
        <br>
    </div>

<?php  } ?>
<div class="col-sm-12">
    <div class="tm-flex" style="margin-bottom:10px">
        <div class="tm-contact-left-half tm-gray-bg">
            <div class="tm-contact-inner-pad">
                <h2 class="tm-section-title">Yorum Ekle</h2>
                <form action="#contact" method="post" class="contact-form">
                    <div class="form-group">
                        <textarea id="contact_message" name="yorum" class="form-control" rows="9" placeholder="Yorum" required></textarea>
                    </div>
                    <?php if (isset($_SESSION['user_id'])) {
                        echo ' <button type="submit" class="btn btn-primary pull-xs-right tm-button tm-button-normal" name="yorumEkle" style="background-color:purple" style="width:100%">Gönder</button>';
                    } else {
                        echo '<a href ="index.php"> Yorum Eklemek İçin Giriş Yapınız </a>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>

</div>