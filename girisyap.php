<?php
$kontrol;
$kontrol2;
if (isset($_POST['login'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $users = $db->prepare("SELECT * FROM user WHERE mail = '" . $mail . "' AND password = '" . $password . "'");
    $users->execute();
    $count = $users->rowCount();
    $user = $users->fetch();
    if ($count > 0) {
        $_SESSION['user_id'] = $user['id'];
        $kontrol = true;
        header('Location:index.php');
    } else {
        $kontrol = false;
    }
}
if (isset($_POST['register'])) {
    $ad = $_POST['firstName'];
    $soyad = $_POST['lastName'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $users = $db->prepare("insert into user(firstname,lastname,mail,password) values('{$ad}','{$soyad}','{$mail}','{$password}')");
    if ($users->execute()) {
        $kontrol2 = true;
    } else {
        $kontrol2 = false;
    }
}

?>

<div style="background-color:white;padding:30px;border-radius:3%">
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="post">
                <h3>Giriş Yap</h3>
                Mail: <input type="text" class="form-control" name="mail"><br>
                Şifre: <input type="password" class="form-control" name="password"><br>
                <button class="btn " name="login" style="background-color:purple" type="submit"><span style="color:white"> Giriş Yap</span></button>
            </form>
            <?php if (@$kontrol) {
                echo '
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Giriş Başarılı!</strong> 
      </div>
    ';
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Giriş Başarısız!</strong> 
    </div>';
            } ?>
        </div>
        <div class="col-sm-6">
            <form action="" method="POST">
                <h3>Kayıt Ol</h3>
                Ad : <input type="text" class="form-control" name="firstName"><br>
                Soyad : <input type="text" class="form-control" name="lastName"><br>
                Mail : <input type="text" class="form-control" name="mail"><br>
                Şifre : <input type="password" class="form-control" name="password"><br>
                <button class="btn " name="register" style="background-color:purple" type="submit"><span style="color:white"> Kayıt Ol</span></button>

            </form>
            <?php if (@$kontrol2) {
                echo '
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Kayıt Başarılı Giriş Yapınız!</strong> 
      </div>
    ';
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Kayıt Başarısız!</strong> 
    </div>';
            } ?>
        </div>
    </div>
</div>