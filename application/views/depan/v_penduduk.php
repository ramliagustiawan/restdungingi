<title><?= $judul; ?></title>

<!-- filter table jquery -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->

<section class="contact" style="margin-bottom:50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="contact-title">
          <h2>Laporan Penduduk</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="" id="FormLaporan">
          <!-- selector bulan /tahun -->
          <select name="" id="bulan" class="form-control">

            <option value="0">Pilih Laporan Berdasarkan Bulan</option>

            <?php foreach ($bulan as $row) : ?>
              <option value="<?php echo $row->id  ?>"><?php echo $row->name ?> <?php echo date('Y'); ?></option>
            <?php endforeach ?>
          </select>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-success">Show Data</button>
      </div>
      </form>
    </div>



    <div class="row">
      <div class="col-md-12">
        <br>
        <div id="result">

        </div>
      </div>


      <!-- filter table jquery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script>
        $(document).ready(function() {
          $("#FormLaporan").submit(function(e) {
            e.preventDefault();
            var id = $("#bulan").val();
            // console.log(id);

            var url = "<?= site_url('Penduduk/filter/') ?>" + id;
            $('#result').load(url);

          })

        });
      </script>

      <br>


    </div>

  </div>
  </div>
  </div>
  </div>
</section>

<!--//END  ABOUT IMAGE -->