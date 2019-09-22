<!--============================= FOOTER =============================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="foot-logo">
                    <a href="<?php echo site_url(); ?>">
                        <img src="<?php echo base_url() . 'theme/images/kota.png' ?>" width="60px;" class="img-fluid" alt="footer_logo">
                        <a href="<?php echo site_url(); ?>" class="brand-logo gbrbwh "></a>
                    </a>
                    <p style="font-size:15px">© <?php echo date('Y'); ?> <a href=""></a> | ERTE<br></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3 style="font-size:20px">Alamat</h3>
                    <p style="font-size:15px"><span></span> Jln. Apel II Kelurahan Huangobotu, Kecamatan Dungingi Kota Gorontalo</p>
                    <p style="font-size:15px"> Email : dungingioffice@gmail.com
                        <br> Phone : (0435)8526697</p>

                    <ul class="footer-social-icons">
                        <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                    </ul>

                </div>
            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3 style="font-size:20px"> Cek dan Bayar PBB</h3>

                    <br>
                    <a class="btn btn-success" href="http://yanjak.gorontalokota.go.id/app/public/pajak/pbb" target="blank"> PBB Online </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="address">
                    <h3 style="font-size:20px"> Sampaikan Keluhan/Aduan Anda</h3>

                    <br>
                    <a class="btn btn-success" href="<?php echo site_url('contact'); ?>"> Keluhan dan Aduan</a>

                </div>
            </div>


            <div class="col-md-12">
                <!-- back to top -->
                <script>
                    $(document).ready(function() {
                        $(window).scroll(function() {
                            if ($(window).scrollTop() > 100) {
                                $('#tombolScrollTop').fadeIn();
                            } else {
                                $('#tombolScrollTop').fadeOut();
                            }
                        });
                    });

                    function scrolltotop() {
                        $('html, body').animate({
                            scrollTop: 0
                        }, 500);
                    }
                </script>

                <!-- <i class="fa fa-home" aria-hidden="true"></i> -->
                <img src="<?php echo base_url() . 'theme/images/top1.png' ?>" width="60px;" class="img-fluid" alt="" type="button" value="" id="tombolScrollTop" onclick="scrolltotop()">


            </div>
        </div>

    </div>



    </div>
</footer>
<!--//END FOOTER -->
<!-- jQuery, Bootstrap JS. -->
<script src="<?php echo base_url() . 'theme/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tether.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/bootstrap.min.js' ?>"></script>
<!-- tambahan download -->
<script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>


<!-- Plugins -->
<script src="<?php echo base_url() . 'theme/js/slick.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/waypoints.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/counterup.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/owl.carousel.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/validate.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/tweetie.min.js' ?>"></script>

<!-- Subscribe -->
<script src="<?php echo base_url() . 'theme/js/subscribe.js' ?>"></script>
<!-- tambahan download -->
<script src="<?php echo base_url() . 'theme/js/contact.js' ?>"></script>

<!-- tambahan galery -->
<script src="<?php echo base_url() . 'theme/js/jquery-ui-1.10.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/jquery.isotope.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/animated-masonry-gallery.js' ?>"></script>
<!-- Magnific popup JS -->
<script src="<?php echo base_url() . 'theme/js/jquery.magnific-popup.js' ?>"></script>


<!-- Script JS -->

<script src="<?php echo base_url() . 'theme/js/script.js' ?>"></script>
<!-- tambahan download -->

<script src="<?php echo base_url() . 'theme/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/js/dataTables.bootstrap4.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#display').DataTable();
    });
</script>

<script src="<?php echo base_url() . 'theme/js/myscript.js' ?>"></script>

<!-- <script>
    var box = document.getElementById('loading');
    window.addEventListener('load', function() {
        loading.style.display = "none";
    });
</script> -->




</body>

</html>