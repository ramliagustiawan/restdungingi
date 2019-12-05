<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/faviconkota.png' ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/flickity.css' ?>">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/simple-line-icons.css' ?>">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick-theme.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/owl.carousel.min.css' ?>">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/owl.carousel.min.css' ?>">

    <!-- Magnific Popup CSS untuk galery -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/magnific-popup.css' ?>">
    <!-- Image Hover CSS untuk galery-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/normalize.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'theme/css/set2.css' ?>" />

    <!-- Masonry Gallery untuk galeri -->
    <link href="<?php echo base_url() . 'theme/css/animated-masonry-gallery.css' ?>" rel="stylesheet" type="text/css" />

    <!-- Main CSS -->
    <link href="<?php echo base_url() . 'theme/css/style.css' ?>" rel="stylesheet">

    <!-- mycss -->
    <link href="<?php echo base_url() . 'theme/css/mystyle.css' ?>" rel="stylesheet">


    <!-- css back to top -->
    <style>
        #tombolScrollTop {
            cursor: pointer;
            position: fixed;
            left: 86%;
            bottom: 40px;
            border: ;
            background-color: white;
            color: ;
            border-radius: 100%;
            height: 50px;
            width: 50px;
            font-size: 12px;
            display: none;
        }
    </style>


    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: white;

        }

        .box {
            width: 200px;
            height: 200px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
        }

        .box .b {

            border-radius: 50%;
            border-left: 4px solid;
            border-right: 4px solid;
            border-top: 4px solid transparent !important;
            border-bottom: 4px solid transparent !important;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ro 2s infinite;
        }

        .box .b1 {
            border-color: red;
            width: 180px;
            height: 180px;

        }

        .box .b2 {
            border-color: blue;
            width: 100px;
            height: 100px;
            animation-delay: 0.2s;
        }

        .box .b3 {
            border-color: yellow;
            width: 80px;
            height: 80px;
            animation-delay: 0.4s;
        }

        .box .b4 {
            border-color: greenyellow;
            width: 60px;
            height: 60px;
            animation-delay: 0.6s;
        }

        @keyframes ro {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            50% {
                transform: translate(-50%, -50%) rotate(-180deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

        }
    </style>

</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <!--============================= style dropdown otomatis =============================-->
    <style>
        .btn-group:hover>.dropdown-menu {
            display: block;
        }
    </style>

    <!--============================= HEADER =============================-->
    <div class="header-topbar">
        <div class="container atas">
            <div class="row">
                <div class="col-xs-6 col-sm-8 col-md-9">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <span class="icon-phone"></span>(0435)8526697
                        </div>
                        <div class="header-top_list">
                            <span class="icon-envelope-open"></span>dungingioffice@gamil.com
                        </div>
                        <div class="header-top_list">
                            <span class="icon-location-pin"></span>Kecamatan Dungingi, Kota Gorontalo.
                        </div>
                    </div>
                    <div class="header-top_login2">
                        <a href="<?php echo site_url('contact'); ?>">ePATEN</a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="header-top_login mr-sm-3">
                        <a class="btn btn-success" href="https://www.dungingi.com" target="blank">ePATEN | Ajukan Kebutuhan Anda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-toggle="affix">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="<?php echo site_url(''); ?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="35px;" src="<?php echo base_url() . 'theme/images/kota.png' ?>"> | Dungingi</a>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <div class="btn-group ">

                                    <a class="btn btn-outline-success" aria-haspopup="true" aria-expanded="false" href="<?php echo site_url(''); ?>">Home</a>

                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Profil
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('about'); ?>">Sejarah</a>
                                        <a class="dropdown-item" href="<?php echo site_url('visi'); ?>">Visi & Misi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('sotk'); ?>">Struktur Organisasi</a>
                                        <a class="dropdown-item" href="<?php echo site_url('peta'); ?>">Peta dan Batas Wilayah</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('camat'); ?>">Daftar Camat</a>
                                        <a class="dropdown-item" href="<?php echo site_url('potensi'); ?>">Potensi Wilayah</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('administrator'); ?>">Login</a>

                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Info
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('blog'); ?>">Berita</a>
                                        <a class="dropdown-item" href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a>
                                        <a class="dropdown-item" href="<?php echo site_url('agenda'); ?>">Agenda</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('pbb'); ?>">PBB</a>
                                        <a class="dropdown-item" href="<?php echo site_url('lpm'); ?>">Organisasi Kemasyarakatan</a>
                                        <a class="dropdown-item" href="<?php echo site_url('nopen'); ?>">Nomor Penting</a>


                                    </div>
                                </div>


                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Data
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="<?php echo site_url('aparat'); ?>">Aparatur Kecamatan</a> <a class="dropdown-item" href="<?php echo site_url('aparatkel'); ?>">Aparatur Kelurahan</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('penduduk'); ?>">Kependudukan</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('pem'); ?>">Pemerintahan</a>
                                        <a class="dropdown-item" href="<?php echo site_url('trantib'); ?>">Trantibum</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('kesra'); ?>">Pemberdayaan & Kesra</a>
                                        <a class="dropdown-item" href="<?php echo site_url('ekbang'); ?>">Ekonomi Pembangunan</a>




                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Layanan
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="<?php echo site_url('ijin'); ?>">Perijinan</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('nonijin'); ?>">Non Perijinan</a>



                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Galeri
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="<?php echo site_url('galeri'); ?>">Lensa</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('umkm'); ?>">UMKM</a>


                                    </div>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle btn-outline-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kelurahan
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo site_url('huangobotu'); ?>">Huangobotu</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('libuo'); ?>">Libuo</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('tuladenggi'); ?>">Tuladenggi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('tomin'); ?>">Tomulabutao </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('tomsel'); ?>">Tomulabutao Selatan</a>


                                    </div>
                                </div>

                                <div class="btn-group">
                                    <a class="btn btn-outline-success" aria-haspopup="true" aria-expanded="false" href="<?php echo site_url('download'); ?>">Download</a>
                                    <!-- </div>
                                <div class="btn-group">
                                <a  class="btn btn-outline-success" aria-haspopup="true" aria-expanded="false" href="<?php echo site_url('contact'); ?>" >Kontak</a> -->
                                </div>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- <div data-toggle="affix">
        <div class="container nav-menu2">
            <div class="row">
                <input class="search btn-outline-success" type="text" placeholder="Cari..." required>	
                <input class="button btn-outline-success" type="button" value="Cari">
            </div>
        </div>
    </div> -->






    <!--//END HEADER -->