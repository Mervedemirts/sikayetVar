<?php
if (isset($_POST['mesajEkle'])) {
    $mesajEkleme = $db->prepare("INSERT INTO cominication (mail,title,message) values('" . $_POST['mail'] . "','" . $_POST['title'] . "','" . $_POST['message'] . "')");
    $mesajEkleme->execute();
}

?>
<section id="contact" class="tm-content-box">

    <div class="tm-flex">
        <div class="tm-contact-left-half tm-gray-bg">
            <div class="tm-contact-inner-pad">
                <h2 class="tm-section-title">Bize Ulaşın</h2>
                <form action="#contact" method="post" class="contact-form">

                    <div class="form-group">
                        <input type="email" id="contact_name" name="mail" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="contact_email" name="title" class="form-control" placeholder="Başlık" required />
                    </div>
                    <div class="form-group">
                        <textarea id="contact_message" name="message" class="form-control" rows="9" placeholder="Mesaj" required></textarea>
                    </div>

                    <button type="submit" name="mesajEkle" class="btn btn-primary pull-xs-right tm-button tm-button-normal" style="background-color:purple" style="width:100%">Gönder</button>

                </form>
            </div>
        </div>

    </div>

</section>

<footer class="tm-footer">
</footer>

</div>
</div>
</div>

<!-- load JS files -->

<script src="js/jquery-1.11.3.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
<script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
<script src="js/jquery.magnific-popup.min.js"></script> <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
<script src="js/jquery.singlePageNav.min.js"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->

<!-- Templatemo scripts -->
<script>
    /* Google map
------------------------------------------------*/
    var map = '';
    var center;

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(37.769725, -122.462154),
            scrollwheel: false
        };

        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

        google.maps.event.addDomListener(map, 'idle', function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, 'resize', function() {
            map.setCenter(center);
        });
    }

    function calculateCenter() {
        center = map.getCenter();
    }

    function loadGoogleMap() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
    }

    function setNavbar() {
        if ($(document).scrollTop() > 160) {
            $('.tm-sidebar').addClass('sticky');
        } else {
            $('.tm-sidebar').removeClass('sticky');
        }
    }

    $(document).ready(function() {

        // Single page nav
        $('.tm-main-nav').singlePageNav({
            'currentClass': "active",
            offset: 20
        });

        // Detect window scroll and change navbar
        setNavbar();

        $(window).scroll(function() {
            setNavbar();
        });

        // Magnific pop up
        $('.tm-gallery').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true
            }
            // other options
        });

        // Google Map
        loadGoogleMap();
    });
</script>

</body>

</html>