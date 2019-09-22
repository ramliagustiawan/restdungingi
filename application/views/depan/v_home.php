<!-- <title><?= $judul; ?></title> -->
<script language="JavaScript">
    var txt = "Dungingi | Web Resmi Pemerintah Kecamatan ";
    var kecepatan = 450;
    var segarkan = null;

    function bergerak() {
        document.title = txt;
        txt = txt.substring(1, txt.length) + txt.charAt(0);
        segarkan = setTimeout("bergerak()", kecepatan);
    }
    bergerak();
</script>

<!-- jQuery Plugin -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>



<!-- Preloader -->
<script type="text/javascript">
    $(window).load(function() {
        $("#loading").fadeOut("slow");

    });
</script>

<div class="box" id="loading">
    <div class="b b1" id="loading"></div>
    <div class="b b2" id="loading"></div>
    <div class="b b3" id="loading"></div>
    <div class="b b4" id="loading"></div>
</div>


<section>


    <div class="slider_img layout_two js-flickity" data-flickity-options='{ "autoPlay": 5500 }'>
        <div id="carousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <?php
                $no = 1;
                $all = $this->db->get('tbl_slider')->num_rows(); //jumlah data pada database
                for ($no; $no <= $all; $no++) {
                    ?>
                    <li data-target="#carousel" data-slide-to="<?php echo $no ?>" class="<?php if ($no == 0) {
                                                                                                echo 'active';
                                                                                            } else {
                                                                                                echo 'notactive';
                                                                                            } ?>"></li>
                <?php
            }
            ?>
            </ol>

            <!-- slider wrapper -->
            <div class="carousel-inner" role="listbox">

                <?php foreach ($slider->result() as $sl) : ?>

                    <?php if ($sl->active) { ?>
                        <div class="carousel-item active">
                            <img class="d-block img-responsive" src="<?php echo base_url() . 'assets/images/' . $sl->slider_gambar; ?>">
                            <div class="carousel-caption d-md-block ">
                                <div class="slider_title">
                                    <h1></h1>
                                    <!-- <h4><br> <br> <?= $sl->slider_judul; ?>.</h4> -->
                                    <div class="slider-btn">

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div class="carousel-item ">
                            <img class="d-block img-responsive" src="<?php echo base_url() . 'assets/images/' . $sl->slider_gambar; ?>">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                    <h1></h1>
                                    <h4><br> <br> </h4>
                                    <div class="slider-btn">

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                <?php endforeach; ?>
            </div>

            <!-- control -->
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


</section>

<!--============================= ABOUT =============================-->
<section class="clearfix about about-style2">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img src="<?php echo base_url() . 'theme/images/camat.jpg' ?>" class="img-fluid about-img" alt="Camat Dungingi">
            </div>


            <div class="col-md-8">
                <h2>Selamat Datang | Matoduwolo | Welcome</h2>
                <p>Assalammualaikum Wr. Wb.

                    Dengan senang hati dan tangan terbuka kami menyampaikan salam yang hangat bagi Anda untuk mengenal Kecamatan Dungingi Kota Gorontalo di Provinsi Gorontalo.<br>

                    Situs ini diharapkan akan memberikan informasi publik serta dapat mempercepat pelayanan publik dikecamatan Dungingi.<br>

                    Demikian, Wabillahi Taufik Walhidayah, Wassalammualaikum Wr. Wb. </p>

            </div>



        </div>
    </div>
</section>



<!--============================= layanan =============================-->
<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align:center">Layanan | Service</h2>
            </div>
        </div>
        <div class="row">

            <?php foreach ($service->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                    <div class="courses_box mb-2">
                        <div class="courses-img-wrap">
                            <a href="<?php echo site_url($row->service_metod); ?>">
                                <img height="100px" style="display: block; margin: auto;" src="<?php echo base_url() . 'assets/images/' . $row->service_gambar; ?>" class="img-fluid" alt="courses-img">
                        </div>

                        <!-- // end .course-img-wrap -->
                        <a href="<?php echo site_url($row->service_metod); ?>" class="courses-box-content">
                            <h6 style="text-align:center;"><?php echo $row->service_judul; ?></h6>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
</section>


<!--//END layanan -->

<!--============================= EVENTS =============================-->

<section class="event">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align:center">Pengumuman | Agenda</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">

                <div class="event-img2">
                    <?php foreach ($pengumuman->result() as $row) : ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo base_url() . 'theme/images/announcement-icon.png' ?>" class="img-fluid">
                            </div><!-- // end .col-sm-3 -->

                            <div class="col-sm-9">
                                <h3><a href="<?php echo site_url('pengumuman'); ?>"><?php echo $row->pengumuman_judul; ?></a></h3>
                                <span><?php echo $row->tanggal; ?></span>
                                <p><?php echo limit_words($row->pengumuman_deskripsi, 10) . '...'; ?></p>

                            </div><!-- // end .col-sm-7 -->
                        </div><!-- // end .row -->
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($agenda->result() as $row) : ?>
                            <div class="event_date">
                                <div class="event-date-wrap">
                                    <p><?php echo date("d", strtotime($row->agenda_tanggal)); ?></p>
                                    <span><?php echo date("M. y", strtotime($row->agenda_tanggal)); ?></span>
                                </div>
                            </div>
                            <div class="date-description">
                                <h3><a href="<?php echo site_url('agenda'); ?>"><?php echo $row->agenda_nama; ?></a></h3>
                                <p><?php echo limit_words($row->agenda_deskripsi, 10) . '...'; ?></p>
                                <hr class="event_line">
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--//END EVENTS -->


<!--//END ABOUT -->
<!--============================= artikel =============================-->
<section class="berita">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align:center">Berita | News</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($berita->result() as $row) : ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="berita_box mb-4">
                        <div class="berita-img-wrap">
                            <img src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="courses-img">
                        </div>
                        <!-- // end .course-img-wrap -->
                        <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>" class="berita-box-content">
                            <h3 style="text-align:center;"><?php echo $row->tulisan_judul; ?></h3>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo site_url('artikel'); ?>" class="btn btn-default btn-courses">View More</a>
            </div>
        </div>
    </div>
</section>
<!--//END artikel -->

<!--============================= statistik =============================-->
<section class="event">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <h2 style="text-align:center">Statistik</h2>
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-globe"></i></span>
                    <?php
                    $bataswaktu = time() - 300;
                    $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_id > '$bataswaktu'");
                    $jml = $query->num_rows();

                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Hits :</span>
                        <span class="info-box-number"><?php $count_my_page = ("hitcounter.txt");
                                                        $hits = file($count_my_page);
                                                        $hits[0]++;
                                                        $fp = fopen($count_my_page, "w");
                                                        fputs($fp, "$hits[0]");
                                                        fclose($fp);
                                                        echo $hits[0]; ?></span>



                        <div class="progress">
                            <div class="progress-bar  bg-success" style="width: 100%"></div>
                        </div>

                    </div>
                    <!--  -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <?php
                    $kunjungan       =  $this->model_utama->kunjungan();
                    $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung Online :</span>
                        <span class="info-box-number"><?= $pengunjungonline; ?></span>

                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>

                    </div>
                    <!-- /.info-box-content -->
                </div>



                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>
                    <?php
                    // $kunjungan       =  $this->model_utama->kunjungan();
                    $totalPengunjung  = $this->model_utama->totalPengunjung()->row_array();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Total pengunjung :</span>
                        <span class="info-box-number"><?= $totalPengunjung['total']; ?></span>

                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>

                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!--  -->
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                    <?php
                    $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
                    $jml = $query->num_rows();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung Bulan Lalu :</span>
                        <span class="info-box-number"><?php echo number_format($jml); ?></span>

                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 100%"></div>
                        </div>

                    </div>
                    <!-- /.info-box-content -->
                </div>

                <!--  -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                    <?php
                    $query = $this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                    $jml = $query->num_rows();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung Bulan Ini :</span>
                        <span class="info-box-number"><?php echo number_format($jml); ?></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- batas kolom 1 statistik pengunjung -->

            <!-- mulai kolom 2 link -->



            <div class="col-md-4">


                <h2 style="text-align:center">Link | Tautan :</h2>
                <br>
                <div>
                    <a href="https://www.kemendagri.go.id/" target="blank">
                        <img src="<?php echo base_url() . 'theme/images/kemendagri.png' ?>" width="50px;" class="img-fluid" alt="">
                        &nbsp;
                        <a href="https://www.kemendagri.go.id/" target="blank" style="color :green;">Kementrian Dalam negeri</a>
                    </a>

                </div>
                <br>
                <div>
                    <a href="https://www.gorontaloprov.go.id/" target="blank">
                        <img src="<?php echo base_url() . 'theme/images/provgtlo.png' ?>" width="50px;" class="img-fluid" alt="">
                        &nbsp;
                        <a href="https://www.gorontaloprov.go.id/" target="blank" style="color :green;">Pemerintah Provinsi Gorontalo</a>
                    </a>

                </div>
                <br>
                <div>
                    <a href="https://www.gorontalokota.go.id/page/profil-kota-gorontalo/" target="blank">
                        <img src="<?php echo base_url() . 'theme/images/kota.png' ?>" width="50px;" class="img-fluid" alt="">
                        &nbsp;
                        <a href="https://www.gorontalokota.go.id/page/profil-kota-gorontalo/" target="blank" style="color :green;">Pemerintah Kota Gorontalo</a>
                    </a>

                </div>
                <br>
                <div>
                    <a href="https://gorontalokota.bps.go.id/" target="blank">
                        <img src="<?php echo base_url() . 'theme/images/bps.png' ?>" width="50px;" class="img-fluid" alt="">
                        &nbsp;
                        <a href="https://gorontalokota.bps.go.id/" target="blank" style="color :green;">Badan Pusat Statistik</a>
                    </a>

                </div>



            </div>


            <!-- polling -->

            <div class="col-md-4">


                <h2 style="text-align:center">Polling :</h2>

                <!-- chart -->
                <canvas id="myChart" width="400" height="400"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var data_jumlah = [];

                    $.post("<?= base_url('home/getData') ?>",
                        function(data) {
                            var obj = JSON.parse(data);
                            $.each(obj, function(test, item) {
                                data_jumlah.push(item.total1)
                                data_jumlah.push(item.total2)
                                data_jumlah.push(item.total3)
                                data_jumlah.push(item.total4)
                            });

                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Sangat Baik', 'Baik', 'cukup', 'kurang'],
                                    datasets: [{
                                        label: '# Polling Website',
                                        data: data_jumlah,

                                        backgroundColor: [

                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 99, 132, 0.2)'
                                        ],
                                        borderColor: [

                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 99, 132, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });

                        });
                </script>


                <button type="submit" class="btn btn-success ml-4" data-toggle="modal" data-target="#myModal">Vote</button>

                <!--Modal Add Pengguna-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                                <h4 class="modal-title" id="myModalLabel">Polling </h4>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url() . 'home/simpan_poll' ?>" method="post" enctype="multipart/form-data">

                                <div class="modal-body">

                                    <div class="form-group">
                                        <h6 style="font-family: arial; font-size: 15px;" class="m-12">Menurut Anda Bagaimana Tampilan dan Penyajian Data di Situs web ini ? </h6>

                                        <fieldset class="form-group mt-2">

                                            <h6 style="font-size:11px; font-type: bold; ">Mohon di cek pada kolom dibawah </h6>

                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0"></legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="xpoll1" value="1" id="gridRadios1" value="option1">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Sangat Baik
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="xpoll2" value="1" id="gridRadios2" value="option2">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Baik
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="xpoll3" value="1" id="gridRadios2" value="option2">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Cukup
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="xpoll4" value="1" id="gridRadios2" value="option2">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Kurang
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>
                                        </fieldset>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-deanger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Vote</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>

                <!-- batas link -->


            </div>

        </div>

    </div>
</section>


<!--============================= batas pbb =============================-->



<!--=============================batas=============================-->





</div>
</div>
</section>
<!--//END EVENTS -->