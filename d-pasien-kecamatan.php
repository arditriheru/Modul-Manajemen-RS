<?php include "../session-start.php";?>
<?php 
	include '../koneksi.php';
	$awal = $_POST['awal'];
	$akhir = $_POST['akhir'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - Manajemen</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
  </head>
  <body>
  <nav>
    <div id="wrapper">
      <?php include "menu.php"; ?>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Rekap <small>Demografi Kecamatan</small></h1></small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>  
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
        	<form method="post" action="kecamatan-export" role="form">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input class="form-control" type="hidden" name="awal" value="<?php echo $awal?>">
                    </div>
                  <div class="form-group">
                      <input class="form-control" type="hidden" name="akhir" value="<?php echo $akhir?>">
                  </div>
                  <button type="submit" class="btn btn-success">EXPORT</button><br><br>
                  </div>
              </form>
        </div>
  <div class="row">
          <div class="col-lg-12">
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li><a href="#1" data-toggle="tab">Yogyakarta</a></li>
                <li><a href="#2" data-toggle="tab">Sleman</a></li>
                <li><a href="#3" data-toggle="tab">Bantul</a></li>
                <li><a href="#4" data-toggle="tab">Kulon Progo</a></li>
                <li><a href="#5" data-toggle="tab">Gunung Kidul</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade" id="1">
	          <div class="row">
	          <div class="col-lg-12">
	          <div class="table-responsive">
	            <table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
		 			$no = 1;
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
						COUNT(*) AS hasil
						FROM mr_pasien, mr_kecamatan_bps
						WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
						AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
						AND mr_pasien.id_kabupaten = 3471
						GROUP BY mr_pasien.id_kecamatan
						ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_kecamatan']; ?></td>
                    <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
          </div>
          <!--<div class="col-lg-6">
      <?php include '../koneksi.php'; ?>
  <div class="col-lg-12">
    <div style="width: 100%;margin: 0px auto;">
      <canvas id="myChart3"></canvas>
    </div>
  <script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: 
        ["Danurejan",
         "Gedongtengen",
         "Gondokusuman",
         "Jetis",
         "Kotagede",
         "Kraton",
         "Mantrijeron",
         "Mergangsan",
         "Ngampilan",
         "Pakualaman",
         "Tegalrejo",
         "Umbulharjo",
         "Wirobrajan",
         "Gondomanan"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_yogyakarta = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347170");
          echo mysqli_num_rows($jumlah_yogyakarta);
          ?>, 
          <?php 
          $jumlah_sleman = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471120");
          echo mysqli_num_rows($jumlah_sleman);
          ?>,
          <?php 
          $jumlah_bantul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347160");
          echo mysqli_num_rows($jumlah_bantul);
          ?>,
          <?php 
          $jumlah_kulonprogo = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471130");
          echo mysqli_num_rows($jumlah_kulonprogo);
          ?>,
          <?php 
          $jumlah_gunungkidul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347150");
          echo mysqli_num_rows($jumlah_gunungkidul);
          ?>,
          <?php 
          $jumlah_yogyakarta = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347120");
          echo mysqli_num_rows($jumlah_yogyakarta);
          ?>, 
          <?php 
          $jumlah_sleman = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347110");
          echo mysqli_num_rows($jumlah_sleman);
          ?>,
          <?php 
          $jumlah_bantul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347130");
          echo mysqli_num_rows($jumlah_bantul);
          ?>,
          <?php 
          $jumlah_kulonprogo = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471100");
          echo mysqli_num_rows($jumlah_kulonprogo);
          ?>,
          <?php 
          $jumlah_gunungkidul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347180");
          echo mysqli_num_rows($jumlah_gunungkidul);
          ?>,
          <?php 
          $jumlah_sleman = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471140");
          echo mysqli_num_rows($jumlah_sleman);
          ?>,
          <?php 
          $jumlah_bantul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471110");
          echo mysqli_num_rows($jumlah_bantul);
          ?>,
          <?php 
          $jumlah_kulonprogo = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=347190");
          echo mysqli_num_rows($jumlah_kulonprogo);
          ?>,
          <?php 
          $jumlah_gunungkidul = mysqli_query($koneksi,"select * from mr_pasien where id_kecamatan=3471");
          echo mysqli_num_rows($jumlah_gunungkidul);
          ?>
          ],
          backgroundColor: [
          '#ec9b3b',
          '#e5d429',
          '#64b2cd',
          '#505bda',
          '#e8647c',
          '#ce2e6c',
          '#ac8daf',
          '#ffaac3',
          '#1089ff',
          '#4a6fa5',
          '#166088',
          '#940a37',
          '#f0134d',
          '#a34a28'
          ],
          borderColor: [
          '#ec9b3b',
          '#e5d429',
          '#64b2cd',
          '#505bda',
          '#e8647c',
          '#ce2e6c',
          '#ac8daf',
          '#ffaac3',
          '#1089ff',
          '#4a6fa5',
          '#166088',
          '#940a37',
          '#f0134d',
          '#a34a28'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  </div>
  </div>-->
        </div><!-- /.row -->
        </div>
          <div class="tab-pane fade" id="2">
	          <div class="row">
	          <div class="col-lg-12">
	          <div class="table-responsive">
	            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $awal = $_POST['awal'];
		 			$akhir = $_POST['akhir'];
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
						COUNT(*) AS hasil
						FROM mr_pasien, mr_kecamatan_bps
						WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
						AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
						AND mr_pasien.id_kabupaten = 344
						GROUP BY mr_pasien.id_kecamatan
						ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_kecamatan']; ?></td>
                    <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
        </div>
                <div class="tab-pane fade" id="3">
                  <div class="row">
	          <div class="col-lg-12">
	          <div class="table-responsive">
	            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $awal = $_POST['awal'];
		 			$akhir = $_POST['akhir'];
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
						COUNT(*) AS hasil
						FROM mr_pasien, mr_kecamatan_bps
						WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
						AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
						AND mr_pasien.id_kabupaten = 342
						GROUP BY mr_pasien.id_kecamatan
						ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_kecamatan']; ?></td>
                    <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
                </div>
                <div class="tab-pane fade" id="4">
                  <div class="row">
	          <div class="col-lg-12">
	          <div class="table-responsive">
	            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $awal = $_POST['awal'];
		 			$akhir = $_POST['akhir'];
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
						COUNT(*) AS hasil
						FROM mr_pasien, mr_kecamatan_bps
						WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
						AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
						AND mr_pasien.id_kabupaten = 341
						GROUP BY mr_pasien.id_kecamatan
						ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_kecamatan']; ?></td>
                    <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
                </div>
                <div class="tab-pane fade" id="5">
                  <div class="row">
	          <div class="col-lg-12">
	          <div class="table-responsive">
	            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>Nama Kecamatan</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $awal = $_POST['awal'];
		 			$akhir = $_POST['akhir'];
                    $data = mysqli_query($koneksi,"
                    	SELECT mr_kecamatan_bps.nama_kecamatan,
						COUNT(*) AS hasil
						FROM mr_pasien, mr_kecamatan_bps
						WHERE mr_pasien.id_kecamatan = mr_kecamatan_bps.kode_kecamatan
						AND mr_pasien.tanggal BETWEEN '$awal' AND '$akhir'
						AND mr_pasien.id_kabupaten = 343
						GROUP BY mr_pasien.id_kecamatan
						ORDER BY hasil DESC;");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['nama_kecamatan']; ?></td>
                    <td><center><?php echo $d['hasil']; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
          </div>
        </div><!-- /.row -->
                </div>
              </div>
            </div>

          </div>
          
        </div><!-- /.row -->
<br><br><?php include "../copyright.php";?>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script src="../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../js/tablesorter/tables.js"></script>
  </body>
</html>
