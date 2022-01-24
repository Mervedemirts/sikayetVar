<div class="tm-body">
    <div class="tm-sidebar" style="height:400px">
        <nav class="tm-main-nav" style="background-color:purple;">
            <ul class="tm-main-nav-ul">
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>



                <?php
                } else {
                ?>
                    <li class="tm-nav-item">
                        <a href="#login" style="background-color:purple;" class="tm-nav-item-link tm-button">
                            <img src="img/person.png" style="width:37px" alt="">Giriş Yap</a>
                    </li>
                <?php } ?>
                <li class="tm-nav-item"><a href="#welcome" style="background-color:purple;" class="tm-nav-item-link tm-button">
                        <i class="fa fa-home" style="margin-right:10px;"></i>Hoşgeldiniz</a>
                </li>
                <li class="tm-nav-item"><a href="#gallery" style="background-color:purple;" class="tm-nav-item-link tm-button">
                        <img src="img/campaing.png" alt=""> Şikayetler</a>
                </li>
                <li class="tm-nav-item"><a href="#contact" style="background-color:purple;" class="tm-nav-item-link tm-button">
                        <i class="fa fa-envelope-o tm-nav-fa" style="margin-right:7px"></i>Bize Ulaşın</a>
                </li>
                
            </ul>
            
        </nav>
        
    </div>