<!--Counter Inbox-->
<?php
error_reporting(0);
$query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2 = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dungingi | Data Penduduk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/faviconkota.png' ?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>" />

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!--Header-->
    <?php
    $this->load->view('admin/v_header');
    ?>

    <!-- sidebar -->

    <?php
    $this->load->view('admin/v_sideadmin');
    ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Penduduk
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Agenda</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Penduduk</a>



                  <!-- import excel -->
                  <div method="post" id="import_form" enctype="multipart/form-data">
                    <p> <label>Import File Excel</label>
                      <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>

                    <input type="submit" name="import" value="Import" class="btn btn-info" /></p>
                  </div>

                  <div class="table-responsive" id="customer_data">

                  </div>
                  <!-- akhir import excel -->


                </div>

                <h6>Total Data - '.<?php echo $data->num_rows() ?>.'</h6>

                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th style="width:70px;">NIK</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Umur</th>
                        <th>Pekerjaan</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $id = $i['id'];
                        $nik = $i['nik'];
                        $nama = $i['nama'];
                        $jk = $i['jk'];
                        $ttl = $i['tempat_lahir'];
                        $tanggal = $i['tanggal'];
                        $umur = $i['umur'];
                        $gdr = $i['gdr'];
                        $agama = $i['agama'];
                        $stts = $i['stts'];
                        $shdk = $i['shdk'];
                        $shdrt = $i['shdrt'];
                        $pendidikan = $i['pddk_akhir'];
                        $pekerjaan = $i['pekerjaan'];
                        $ibu = $i['nama_ibu'];
                        $ayah = $i['nama_ayah'];
                        $nokk = $i['no_kk'];
                        $namakk = $i['nama_kk'];
                        $alamat = $i['alamat'];
                        $prov = $i['provinsi'];
                        $nokota = $i['no_kota'];
                        $kota = $i['nama_kota'];
                        $kec = $i['nama_kec'];
                        $nokel = $i['no_kel'];
                        $namakel = $i['nama_kel'];
                        $rw = $i['rw'];
                        $rt = $i['rt'];

                        ?>
                        <tr>
                          <td><?php echo $nik; ?></td>
                          <td><?php echo $nama; ?></td>
                          <td><?php echo $jk; ?></td>
                          <td><?php echo $ttl; ?></td>
                          <td><?php echo $tanggal; ?></td>
                          <td><?php echo $pekerjaan; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>ERTE</b>
      </div>
      <strong>© <?php echo date('Y'); ?><a href="#"> Dungingi</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!--Modal Add Pengguna-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Add Penduduk</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/penduduk/simpan_penduduk' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">



            <div class="form-group">
              <label for="inputnik" class="col-sm-4 control-label">NIK</label>
              <div class="col-sm-7">

                <input type="text" name="xnik" class="form-control" id="inputnik" placeholder="NIK" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNama" class="col-sm-4 control-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" name="xnama" class="form-control" id="inputnama" placeholder="Nama" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputjk" class="col-sm-4 control-label">JK</label>
              <div class="col-sm-7">
                <input type="text" name="xjk" class="form-control" id="inputjk" placeholder="Jenis Kelamin" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputttl" class="col-sm-4 control-label">Tempat Lahir</label>
              <div class="col-sm-7">
                <input type="text" name="xttl" class="form-control" id="inputttl" placeholder="Tempat Lahir" required>
              </div>
            </div>


            <div class="form-group">
              <label for="inputtgl" class="col-sm-4 control-label">Tanggal</label>
              <div class="col-sm-7">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="xtanggal" class="form-control pull-right" id="datepicker" required>
                </div>
              </div>
              <!-- /.input group -->
            </div>


            <div class="form-group">
              <label for="inputUmur" class="col-sm-4 control-label">Umur</label>
              <div class="col-sm-7">
                <input type="text" name="xumur" class="form-control" id="inputumur" placeholder="Umur" required>
              </div>
            </div>

            <!-- /.form group -->
            <div class="form-group">
              <label for="inputGdr" class="col-sm-4 control-label">GDR</label>
              <div class="col-sm-7">
                <input type="text" name="xgdr" class="form-control" id="inputGdr" placeholder="Golongan Darah" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAgama" class="col-sm-4 control-label">Agama</label>
              <div class="col-sm-7">
                <input type="text" name="xagama" class="form-control" id="inputAgama" placeholder="Agama" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputStts" class="col-sm-4 control-label">Status</label>
              <div class="col-sm-7">
                <input type="text" name="xstts" class="form-control" id="inputStts" placeholder="Status" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputShdk" class="col-sm-4 control-label">SHDK</label>
              <div class="col-sm-7">
                <input type="text" name="xshdk" class="form-control" id="inputShdk" placeholder="Status Hubungan Dalam Keluarga" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputShdrt" class="col-sm-4 control-label">SHDRT</label>
              <div class="col-sm-7">
                <input type="text" name="xshdrt" class="form-control" id="inputShdrt" placeholder="SHDRT" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputpddk" class="col-sm-4 control-label">Pendidikan</label>
              <div class="col-sm-7">
                <input type="text" name="xpddk" class="form-control" id="inputpddk" placeholder="Pendidikan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPekerjaan" class="col-sm-4 control-label">Pekerjaan</label>
              <div class="col-sm-7">
                <input type="text" name="xpekerjaan" class="form-control" id="inputPekerjaan" placeholder="Pekerjaan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputIbu" class="col-sm-4 control-label">Ibu</label>
              <div class="col-sm-7">
                <input type="text" name="xibu" class="form-control" id="inputIbu" placeholder="Nama Ibu" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputayah" class="col-sm-4 control-label">Ayah</label>
              <div class="col-sm-7">
                <input type="text" name="xayah" class="form-control" id="inputayah" placeholder="Nama Ayah" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNokk" class="col-sm-4 control-label">No_KK</label>
              <div class="col-sm-7">
                <input type="text" name="xnokk" class="form-control" id="inputNokk" placeholder="Nomor Kartu Keluarga" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputKk" class="col-sm-4 control-label">Kepala Keluarga</label>
              <div class="col-sm-7">
                <input type="text" name="xkk" class="form-control" id="inputKk" placeholder="Nama Kepala Keluarga" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAlamat" class="col-sm-4 control-label">Alamat</label>
              <div class="col-sm-7">
                <input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="Alamat" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputProvinsi" class="col-sm-4 control-label">Provinsi</label>
              <div class="col-sm-7">
                <input type="text" name="xprovinsi" class="form-control" id="inputProvinsi" placeholder="Provinsi" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNokota" class="col-sm-4 control-label">No_Kota</label>
              <div class="col-sm-7">
                <input type="text" name="xnokota" class="form-control" id="inputNokota" placeholder="Nomor Kota" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputKota" class="col-sm-4 control-label">Kota</label>
              <div class="col-sm-7">
                <input type="text" name="xkota" class="form-control" id="inputKota" placeholder="Kota" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputKecamatan" class="col-sm-4 control-label">Kecamatan</label>
              <div class="col-sm-7">
                <input type="text" name="xkecamatan" class="form-control" id="inputKecamatan" placeholder="Kecamatan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNokel" class="col-sm-4 control-label">No_Kelurahan</label>
              <div class="col-sm-7">
                <input type="text" name="xnokel" class="form-control" id="inputNokel" placeholder="Nomor Kelurahan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputKel" class="col-sm-4 control-label">Kelurahan</label>
              <div class="col-sm-7">
                <input type="text" name="xkelurahan" class="form-control" id="inputKel" placeholder="Nama Kelurahan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputRw" class="col-sm-4 control-label">RW</label>
              <div class="col-sm-7">
                <input type="text" name="xrw" class="form-control" id="inputRw" placeholder="Rukun Warga" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputRt" class="col-sm-4 control-label">RT</label>
              <div class="col-sm-7">
                <input type="text" name="xrt" class="form-control" id="inputRt" placeholder="Rukun Tetangga" required>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php foreach ($data->result_array() as $i) :
    $id = $i['id'];
    $nik = $i['nik'];
    $nama = $i['nama'];
    $jk = $i['jk'];
    $ttl = $i['tempat_lahir'];
    $tanggal = $i['tanggal'];
    $umur = $i['umur'];
    $gdr = $i['gdr'];
    $agama = $i['agama'];
    $stts = $i['stts'];
    $shdk = $i['shdk'];
    $shdrt = $i['shdrt'];
    $pendidikan = $i['pddk_akhir'];
    $pekerjaan = $i['pekerjaan'];
    $ibu = $i['nama_ibu'];
    $ayah = $i['nama_ayah'];
    $nokk = $i['no_kk'];
    $namakk = $i['nama_kk'];
    $alamat = $i['alamat'];
    $prov = $i['provinsi'];
    $nokota = $i['no_kota'];
    $kota = $i['nama_kota'];
    $kec = $i['nama_kec'];
    $nokel = $i['no_kel'];
    $namakel = $i['nama_kel'];
    $rw = $i['rw'];
    $rt = $i['rt'];

    ?>


    <!--Modal Edit Pengguna-->
    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Penduduk</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/penduduk/update_penduduk' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">


              <div class="form-group">
                <label for="inputnik" class="col-sm-4 control-label">NIK</label>
                <div class="col-sm-7">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>">
                  <input type="text" name="xnik" class="form-control" value="<?php echo $nik; ?>" id="inputnik" placeholder="NIK" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputNama" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" name="xnama" class="form-control" value="<?php echo $nama; ?>" id="inputnama" placeholder="Nama" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputjk" class="col-sm-4 control-label">JK</label>
                <div class="col-sm-7">
                  <input type="text" name="xjk" class="form-control" value="<?php echo $jk; ?>" id="inputjk" placeholder="Jenis Kelamin" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputttl" class="col-sm-4 control-label">Tempat Lahir</label>
                <div class="col-sm-7">
                  <input type="text" name="xttl" class="form-control" value="<?php echo $ttl; ?>" id="inputttl" placeholder="Tempat Lahir" required>
                </div>
              </div>


              <div class="form-group">
                <label for="inputtgl" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-7">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="xtanggal" class="form-control pull-right datepicker" value="<?php echo $tanggal; ?>" required>
                  </div>
                </div>
                <!-- /.input group -->
              </div>


              <div class="form-group">
                <label for="inputUmur" class="col-sm-4 control-label">Umur</label>
                <div class="col-sm-7">
                  <input type="text" name="xumur" class="form-control" value="<?php echo $umur; ?>" id="inputumur" placeholder="Umur" required>
                </div>
              </div>

              <!-- /.form group -->
              <div class="form-group">
                <label for="inputGdr" class="col-sm-4 control-label">GDR</label>
                <div class="col-sm-7">
                  <input type="text" name="xgdr" class="form-control" value="<?php echo $gdr; ?>" id="inputGdr" placeholder="Golongan Darah" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAgama" class="col-sm-4 control-label">Agama</label>
                <div class="col-sm-7">
                  <input type="text" name="xagama" class="form-control" value="<?php echo $agama; ?>" id="inputAgama" placeholder="Agama" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputStts" class="col-sm-4 control-label">Status</label>
                <div class="col-sm-7">
                  <input type="text" name="xstts" class="form-control" value="<?php echo $stts; ?>" id="inputStts" placeholder="Status" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputShdk" class="col-sm-4 control-label">SHDK</label>
                <div class="col-sm-7">
                  <input type="text" name="xshdk" class="form-control" value="<?php echo $shdk; ?>" id="inputShdk" placeholder="Status Hubungan Dalam Keluarga" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputShdrt" class="col-sm-4 control-label">SHDRT</label>
                <div class="col-sm-7">
                  <input type="text" name="xshdrt" class="form-control" value="<?php echo $shdrt; ?>" id="inputShdrt" placeholder="SHDRT" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputpddk" class="col-sm-4 control-label">Pendidikan</label>
                <div class="col-sm-7">
                  <input type="text" name="xpddk" class="form-control" value="<?php echo $pendidikan; ?>" id="inputpddk" placeholder="Pendidikan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPekerjaan" class="col-sm-4 control-label">Pekerjaan</label>
                <div class="col-sm-7">
                  <input type="text" name="xpekerjaan" class="form-control" value="<?php echo $pekerjaan; ?>" id="inputPekerjaan" placeholder="Pekerjaan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputIbu" class="col-sm-4 control-label">Ibu</label>
                <div class="col-sm-7">
                  <input type="text" name="xibu" class="form-control" value="<?php echo $ibu; ?>" id="inputIbu" placeholder="Nama Ibu" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputayah" class="col-sm-4 control-label">Ayah</label>
                <div class="col-sm-7">
                  <input type="text" name="xayah" class="form-control" value="<?php echo $ayah; ?>" id="inputayah" placeholder="Nama Ayah" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputNokk" class="col-sm-4 control-label">No_KK</label>
                <div class="col-sm-7">
                  <input type="text" name="xnokk" class="form-control" value="<?php echo $nokk; ?>" id="inputNokk" placeholder="Nomor Kartu Keluarga" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputKk" class="col-sm-4 control-label">Kepala Keluarga</label>
                <div class="col-sm-7">
                  <input type="text" name="xkk" class="form-control" value="<?php echo $namakk; ?>" id="inputKk" placeholder="Nama Kepala Keluarga" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAlamat" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="xalamat" rows="2" placeholder="Alamat ..."><?php echo $alamat; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputProvinsi" class="col-sm-4 control-label">Provinsi</label>
                <div class="col-sm-7">
                  <input type="text" name="xprovinsi" class="form-control" value="<?php echo $prov; ?>" id="inputProvinsi" placeholder="Provinsi" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputNokota" class="col-sm-4 control-label">No_Kota</label>
                <div class="col-sm-7">
                  <input type="text" name="xnokota" class="form-control" value="<?php echo $nokota; ?>" id="inputNokota" placeholder="Nomor Kota" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputKota" class="col-sm-4 control-label">Kota</label>
                <div class="col-sm-7">
                  <input type="text" name="xkota" class="form-control" value="<?php echo $kota; ?>" id="inputKota" placeholder="Kota" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputKecamatan" class="col-sm-4 control-label">Kecamatan</label>
                <div class="col-sm-7">
                  <input type="text" name="xkecamatan" class="form-control" value="<?php echo $kec; ?>" id="inputKecamatan" placeholder="Kecamatan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputNokel" class="col-sm-4 control-label">No_Kelurahan</label>
                <div class="col-sm-7">
                  <input type="text" name="xnokel" class="form-control" value="<?php echo $nokel; ?>" id="inputNokel" placeholder="Nomor Kelurahan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputKel" class="col-sm-4 control-label">Kelurahan</label>
                <div class="col-sm-7">
                  <input type="text" name="xkelurahan" class="form-control" value="<?php echo $namakel; ?>" id="inputKel" placeholder="Nama Kelurahan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputRw" class="col-sm-4 control-label">RW</label>
                <div class="col-sm-7">
                  <input type="text" name="xrw" class="form-control" value="<?php echo $rw; ?>" id="inputRw" placeholder="Rukun Warga" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputRt" class="col-sm-4 control-label">RT</label>
                <div class="col-sm-7">
                  <input type="text" name="xrt" class="form-control" value="<?php echo $rt; ?>" id="inputRt" placeholder="Rukun Tetangga" required>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>




  <?php endforeach; ?>

  <?php foreach ($data->result_array() as $i) :

    $id = $i['id'];
    $nik = $i['nik'];
    $nama = $i['nama'];
    $jk = $i['jk'];
    $ttl = $i['tempat_lahir'];
    $tanggal = $i['tanggal'];
    $umur = $i['umur'];
    $gdr = $i['gdr'];
    $agama = $i['agama'];
    $stts = $i['stts'];
    $shdk = $i['shdk'];
    $shdrt = $i['shdrt'];
    $pendidikan = $i['pddk_akhir'];
    $pekerjaan = $i['pekerjaan'];
    $ibu = $i['nama_ibu'];
    $ayah = $i['nama_ayah'];
    $nokk = $i['no_kk'];
    $namakk = $i['nama_kk'];
    $alamat = $i['alamat'];
    $prov = $i['provinsi'];
    $nokota = $i['no_kota'];
    $kota = $i['nama_kota'];
    $kec = $i['nama_kec'];
    $nokel = $i['no_kel'];
    $namakel = $i['nama_kel'];
    $rw = $i['rw'];
    $rt = $i['rt'];


    ?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data Penduduk</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/penduduk/hapus_penduduk' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id; ?>" />
              <p>Apakah Anda yakin mau menghapus Data <b><?php echo $nama; ?></b> ?</p>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>




  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>


  <!-- <script src="<?php echo base_url(); ?>theme/js/jquery.min.js"></script> -->
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('#datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker3').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker4').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $(".timepicker").timepicker({
        showInputs: true
      });

    });
  </script>
  <?php if ($this->session->flashdata('msg') == 'error') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Error',
        text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
        showHideTransition: 'slide',
        icon: 'error',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FF4859'
      });
    </script>

  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Data Penduduk Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Info',
        text: "Data Penduduk berhasil di update",
        showHideTransition: 'slide',
        icon: 'info',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#00C9E6'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Data Penduduk Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php else : ?>

  <?php endif; ?>

  <!-- script import excel -->
  <script>
    $(document).ready(function() {
      load_data();

      function load_data() {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/penduduk/fetch",
          method: "POST",
          success: function(data) {
            $('#customer_data').html(data);
          }
        })
      }


      $('#import_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "<?php echo base_url(); ?>admin/penduduk/import",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
            $('#file').val('');
            load_data();
            alert(data);
          }
        })
      });

    });
  </script>


</body>

</html>