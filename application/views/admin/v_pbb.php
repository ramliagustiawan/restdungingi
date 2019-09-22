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
  <title>Dungingi | Pbb</title>
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
          Pajak Bumi Dan Bangunan
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">PBB</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add PBB</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:12px;">
                    <thead>

                      <tr>
                        <th>Kode Kelurahan</th>
                        <th>Kelurahan</th>
                        <th>Rencana Penerimaan</th>
                        <th>Realisasi Pokok</th>
                        <th>Realisasi Denda</th>
                        <th>Total Realisasi</th>
                        <th>Persentasi</th>
                        <th>Tanggal</th>
                        <th>Ranking</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :


                        $no++;
                        $kode = $i['pbb_id'];
                        $pbbkode = $i['pbb_kode'];
                        $kelurahan = $i['pbb_kelurahan'];
                        $target = $i['pbb_target'];
                        $realisasi = $i['pbb_realisasi'];
                        $denda = $i['pbb_denda'];
                        $total = $i['pbb_total'];
                        $persen = $i['pbb_persen'];
                        $tanggal = $i['tanggal'];
                        $rank = $i['pbb_rank'];
                        //  $kategori_id=$i['pbb_kategori_id'];
                        //  $kategori_nama=$i['pbb_kategori_nama'];

                        ?>
                        <tr>
                          <td><?php echo $pbbkode; ?></td>
                          <td><?php echo $kelurahan; ?></td>
                          <td><?php echo $target; ?></td>
                          <td><?php echo $realisasi; ?></td>
                          <td><?php echo $denda; ?></td>
                          <td><?php echo $total; ?></td>
                          <td><?php echo $persen; ?></td>
                          <td><?php echo $tanggal; ?></td>
                          <td><?php echo $rank; ?></td>
                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $kode; ?>"><span class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $kode; ?>"><span class="fa fa-trash"></span></a>
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
          <h4 class="modal-title" id="myModalLabel">Add PBB</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/pbb/simpan_pbb' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="inputkelurahan" class="col-sm-4 control-label">Kelurahan</label>
              <div class="col-sm-7">
                <select class="form-control" id="exampleFormControlSelect1" name="xkelurahan">
                  <option>Huangobotu</option>
                  <option>Libuo</option>
                  <option>Tuladenggi</option>
                  <option>Tomulabutao</option>
                  <option>Tomulabutao Selatan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Kode Kelurahan</label>
              <div class="col-sm-7">
                <input type="text" name="xkode" class="form-control" id="inputUserName" placeholder="Kode kelurahan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Target Realisasi</label>
              <div class="col-sm-7">
                <input type="text" name="xtarget" class="form-control" id="inputUserName" placeholder="target" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Realisasi</label>
              <div class="col-sm-7">
                <input type="text" name="xrealisasi" class="form-control" id="inputUserName" placeholder="realisasi" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Denda</label>
              <div class="col-sm-7">
                <input type="text" name="xdenda" class="form-control" id="inputUserName" placeholder="Denda" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Total Realisasi</label>
              <div class="col-sm-7">
                <input type="text" name="xtotal" class="form-control" id="inputUserName" placeholder="total" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Persentasi</label>
              <div class="col-sm-7">
                <input type="text" name="xpersen" class="form-control" id="inputUserName" placeholder="Persentasi" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Tanggal</label>
              <div class="col-sm-7">
                <input type="date" name="xtanggal" class="form-control" id="inputUserName" placeholder="Tanggal" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Ranking</label>
              <div class="col-sm-7">
                <input type="text" name="xrank" class="form-control" id="inputUserName" placeholder="Ranking" required>
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

  <!--Modal Edit Pengguna-->

  <?php foreach ($data->result_array() as $i) :

    $kode = $i['pbb_id'];
    $pbbkode = $i['pbb_kode'];
    $kelurahan = $i['pbb_kelurahan'];
    $target = $i['pbb_target'];
    $realisasi = $i['pbb_realisasi'];
    $denda = $i['pbb_denda'];
    $total = $i['pbb_total'];
    $persen = $i['pbb_persen'];
    $tanggal = $i['pbb_tanggal'];
    $rank = $i['pbb_rank'];
    ?>

    <div class="modal fade" id="ModalEdit<?php echo $kode; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit PBB</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/pbb/update_pbb' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputkelurahan" class="col-sm-4 control-label">Kelurahan</label>
                <div class="col-sm-7">
                  <input type="hidden" name="kode" value="<?php echo $kode; ?>">
                  <select class="form-control" id="exampleFormControlSelect1" name="xkelurahan">
                    <option>Huangobotu</option>
                    <option>Libuo</option>
                    <option>Tuladenggi</option>
                    <option>Tomulabutao</option>
                    <option>Tomulabutao Selatan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Kode Kelurahan</label>
                <div class="col-sm-7">
                  <input type="text" name="xkode" class="form-control" value="<?php echo $pbbkode; ?>" id="inputUserName" placeholder="Kode kelurahan" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Target Realisasi</label>
                <div class="col-sm-7">
                  <input type="text" name="xtarget" class="form-control" value="<?php echo $target; ?>" id="inputUserName" placeholder="target" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Realisasi</label>
                <div class="col-sm-7">
                  <input type="text" name="xrealisasi" class="form-control" value="<?php echo $realisasi; ?>" id="inputUserName" placeholder="realisasi" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Denda</label>
                <div class="col-sm-7">
                  <input type="text" name="xdenda" class="form-control" value="<?php echo $denda; ?>" id="inputUserName" placeholder="Denda" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Total Realisasi</label>
                <div class="col-sm-7">
                  <input type="text" name="xtotal" class="form-control" value="<?php echo $total; ?>" id="inputUserName" placeholder="total" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Persentasi</label>
                <div class="col-sm-7">
                  <input type="text" name="xpersen" class="form-control" value="<?php echo $persen; ?>" id="inputUserName" placeholder="Persentasi" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-7">
                  <input type="date" name="xtanggal" class="form-control" value="<?php echo $tanggal; ?>" id="inputUserName" placeholder="Tanggal" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Ranking</label>
                <div class="col-sm-7">
                  <input type="text" name="xrank" class="form-control" value="<?php echo $rank; ?>" id="inputUserName" placeholder="Ranking" required>
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


  <!--Modal Hapus Pengguna-->

  <?php foreach ($data->result_array() as $i) :
    $id = $i['pbb_id'];
    $pbbkode = $i['pbb_kode'];
    $kelurahan = $i['pbb_kelurahan'];
    $target = $i['pbb_target'];
    $realisasi = $i['pbb_realisasi'];
    $denda = $i['pbb_denda'];
    $total = $i['pbb_total'];
    $persen = $i['pbb_persen'];
    $tanggal = $i['pbb_tanggal'];
    $rank = $i['pbb_rank'];
    ?>

    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus PBB</h4>
          </div>

          <form class="form-horizontal" action="<?php echo base_url() . 'kepalaseksi/pbb/hapus_pbb' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <input type="hidden" name="kode" value="<?php echo $id; ?>" />
              <p>Apakah Anda yakin mau menghapus file <b><?php echo $kelurahan; ?></b> ?</p>
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
        text: "Data PBB Berhasil disimpan ke database.",
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
        text: "Data PBB berhasil di update",
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
        text: "Data PBB Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php else : ?>

  <?php endif; ?>
</body>

</html>