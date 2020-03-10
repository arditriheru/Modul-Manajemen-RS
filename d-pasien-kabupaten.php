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
            <h1>Rekap <small>Demografi Kabupaten</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Kabupaten</li>
            </ol>  
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
          <div class="table-responsive">
          	<form method="post" action="kabupaten-export" role="form">
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
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>Kode</th>
                    <th><center>Nama Kabupaten</th>
                    <th><center>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS a
                    	FROM mr_pasien
                    	WHERE id_kabupaten = 3471
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo "3471" ?></td>
                    <td><center><?php echo "Kota Yogyakarta" ?></td>
                    <td><center><?php echo $d['a']; ?></td>
                  </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS b
                    	FROM mr_pasien
                    	WHERE id_kabupaten = 344
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo "344" ?></td>
                    <td><center><?php echo "Sleman" ?></td>
                    <td><center><?php echo $d['b']; ?></td>
                  </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS c
                    	FROM mr_pasien
                    	WHERE id_kabupaten = 342
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo "342" ?></td>
                    <td><center><?php echo "Bantul" ?></td>
                    <td><center><?php echo $d['c']; ?></td>
                  </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS d
                    	FROM mr_pasien
                    	WHERE id_kabupaten = 341
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo "341" ?></td>
                    <td><center><?php echo "Kulon Progo" ?></td>
                    <td><center><?php echo $d['d']; ?></td>
                  </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS e
                    	FROM mr_pasien
                    	WHERE id_kabupaten = 343
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                  	<td><center><?php echo "343" ?></td>
                    <td><center><?php echo "Gunung Kidul" ?></td>
                    <td><center><?php echo $d['e']; ?></td>
                  </tr>
                  <?php } ?>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"
                    	SELECT COUNT(*) AS o
                    	FROM mr_pasien
                    	WHERE id_propinsi = 34
                    	AND  mr_pasien.tanggal BETWEEN '$awal' AND '$akhir';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><center><?php echo "*" ?></td>
                    <td><center><?php echo "TOTAL" ?></td>
                    <td><center><?php echo $d['o']; ?></td>
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
        labels: ["Yogyakarta", "Sleman", "Bantul", "Kulon Progo", "Gunung Kidul"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_yogyakarta = mysqli_query($koneksi,"select * from mr_pasien where id_kabupaten=3471");
          echo mysqli_num_rows($jumlah_yogyakarta);
          ?>, 
          <?php 
          $jumlah_sleman = mysqli_query($koneksi,"select * from mr_pasien where id_kabupaten=344");
          echo mysqli_num_rows($jumlah_sleman);
          ?>,
          <?php 
          $jumlah_bantul = mysqli_query($koneksi,"select * from mr_pasien where id_kabupaten=342");
          echo mysqli_num_rows($jumlah_bantul);
          ?>,
          <?php 
          $jumlah_kulonprogo = mysqli_query($koneksi,"select * from mr_pasien where id_kabupaten=341");
          echo mysqli_num_rows($jumlah_kulonprogo);
          ?>,
          <?php 
          $jumlah_gunungkidul = mysqli_query($koneksi,"select * from mr_pasien where id_kabupaten=343");
          echo mysqli_num_rows($jumlah_gunungkidul);
          ?>
          ],
          backgroundColor: [
          '#ec9b3b',
          '#e5d429',
          '#e8647c',
          '#505bda',
          '#64b2cd'
          ],
          borderColor: [
          '#ec9b3b',
          '#e5d429',
          '#e8647c',
          '#505bda',
          '#64b2cd'
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
<br><br>
<?php include "../copyright.php";?>
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
