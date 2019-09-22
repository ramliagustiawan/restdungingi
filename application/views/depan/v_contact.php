<title><?= $judul; ?></title>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Sampaikan Pengaduan / Keluhan Anda</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 contact-option">
                            <div class="contact-option_rsp">
                                <h3>Tinggalkan Pesan</h3>
                                <form action="<?php echo site_url('contact/kirim_pesan'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Anda" name="xnama" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Alamat" name="xemail" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nomor HP" name="xphone">
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <textarea placeholder="Pengaduan / Permasalahan / keluhan Anda" class="form-control" name="xmessage" required rows="5"></textarea>
                                    </div>
                                    <!-- // end .form-group -->
                                    <button type="submit" class="btn btn-default btn-submit">SUBMIT</button>
                                    <div><?php echo $this->session->flashdata('msg'); ?></div>
                                    <!-- // end #js-contact-result -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-address">
                                <h3>Lokasi</h3>
                                <div class="contact-details">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <h6>Alamat</h6>
                                    <p> Kantor Kecamatan Dungingi
                                        <br> Jalan Apel II Kelurahan Huangobotu
                                        <br> Kota Gorontalo</p>
                                </div>
                                <br>
                                <div class="contact-details">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <h6>Email</h6>
                                    <p>dungingioffice@gmail.com
                                        <br> portal dungingi@facebook.com
                                    </p>
                                </div>
                                <br>
                                <div class="contact-details">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h6>Phone</h6>
                                    <p>(0435)8526697</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="contact-center">OR</p>
            </div>
        </div>
    </div>
</section>
<!--//END  ABOUT IMAGE -->