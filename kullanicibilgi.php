<?php
$id = $_SESSION['user_id'];
$users = $db->prepare("SELECT * FROM user WHERE id = $id");
$users->execute();
$user = $users->fetch();
if (isset($_POST['exit'])) {
    session_destroy();
    header('Location:index.php');
}
?>

<div style="border-radius:3%">
    
        <div class="row" style="background-color: purple;color:white;padding:2%;margin-left:0.5%;margin-top:2%;margin-bottom:-100px">
            <div class="col-sm-2">
                <img src="<?php echo $user['photourl']; ?>" alt="" style="margin-left:10%;border-radius:100%
                ;width:90px;height:90px">
            </div>
            <div class="col-sm-10">
            <div class="col-sm-12"><b>Ad: </b><?php echo $user['firstname']; ?></div>
           
            <div class="col-sm-12"><b>Soyad: </b><?php echo $user['lastname']; ?> </div>
            <div class="col-sm-12"><b>Mail: </b><?php echo $user['mail']; ?> </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
           <a href="sikayetekle.php" class="btn btn-success">
               Şikayet Ekle</a>

       </div>
       <div class="col-sm-2">
           <a href="sikayetlerim.php" class="btn btn-success">
               Şikayetlerim</a>
       </div>
       <div class="col-sm-2">
           <form action="" method="post">
               <button type="submit" name="exit" class="btn btn-danger" style="margin-left:12%">Çıkış Yap</button>
           </form>
       </div>
            </div>
       
       
       
    </div>