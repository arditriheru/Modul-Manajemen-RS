<?php 
  include "../koneksi.php";
  $iol      = "2";
  $awal     = $_POST['awal'];
  $akhir    = $_POST['akhir'];
  $tt       = $_POST['tt'];
  $hari     = $_POST['hari']
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
            <h1>IMUT<small> Rawat Inap</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>  
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
<div class="row">
    <div class="col-lg-8">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                    <th><center>No</th>
                    <th><center>RM</th>
                    <th><center>Pelayanan</th>
                    <th><center>Tanggal Inap</th>
                    <th><center>Tanggal Pulang</th>
                    <th><center>Selisih</th>
                    </tr>
                </thead>
                <tbody>
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,
                     "SELECT *, mr_iol.nama,
                      TIMESTAMPDIFF(DAY,ksr_trn.tgl_inap,ksr_trn.tgl_pulang) AS selisih
                      FROM ksr_trn, mr_iol
                      WHERE ksr_trn.iol = mr_iol.id_mr_iol
                      AND ksr_trn.tgl_pulang BETWEEN '$awal'AND'$akhir'
                      AND ksr_trn.iol='$iol';");
                    while($d = mysqli_fetch_array($data)){

                      $selisih = $d['selisih']+1;
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></td>
                    <td><center><?php echo $d['id_catatan_medik']; ?></td>
                    <td><center><?php echo $d['nama']; ?></td>
                    <td><center><?php echo $d['tgl_inap']; ?> <?php echo $d['jam_inap']; ?></td>
                    <td><center><?php echo $d['tgl_pulang']; ?></td>
                    <td><center><?php echo $selisih; ?> Hari</td>
                  </tr>
                  <?php }  ?>
                  
                  <!---------- Batas ----------->
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                     "SELECT SUM(TIMESTAMPDIFF(DAY,tgl_inap,tgl_pulang)+1) AS total,
                      COUNT(*) AS jml_pasien
                      FROM ksr_trn
                      WHERE tgl_pulang BETWEEN '$awal'AND'$akhir'
                      AND iol='2';");
                    while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td colspan="5"><b><center>TOTAL</b></td>
                    <td><b><center><?php echo $d['total']; ?> Hari</b></td>
                  </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php
                $total    = $d['total'];
                $tt       = $tt;
                $hari     = $hari;
                $hasil    = $total / ($tt * $hari) *'100';
                $bor = number_format($hasil, 2);
              ?>
                <div class="col-lg-4">
                <h3><center><b>Periode :</b><br> <?php echo $awal?> - <?php echo $akhir?></h3>
                <table class="table table-hover tablesorter">
                  <tbody>
                    <tr>
                          <td>
                        
                          <center>
                          <h3><?php echo $total?><br>
                            &emsp;&emsp;&emsp;------------------- x 100%<br>
                            (<?php echo $tt?> x <?php echo $hari?>)</h3>
                           <h2><b>B.O.R = <?php echo $bor;?>%</b></h2>
                          </center>
                      </td> 
                    </tr>
                    <tr>
                          <td>
                        <?php
                          $total    = $d['total'];
                          $jml_pasien   = $d['jml_pasien'];
                          $tt       = $tt;
                          $hari     = $hari;
                          $hasil    = (($tt * $hari) - $total) / $jml_pasien;
                          $toi = number_format($hasil, 2);
                        ?>
                          <center>
                          <h3>(<?php echo $tt?> x <?php echo $hari?>) - <?php echo $total?><br>
                            -------------------------------<br>
                            <?php echo $jml_pasien?></h3>
                           <h2><b>T.O.I = <?php echo $toi;?></b></h2>
                          </center>
                      </td> 
                    </tr>
                    <tr>
                          <td>
                        <?php
                          $total    = $d['total'];
                          $jml_pasien   = $d['jml_pasien'];
                          $tt       = $tt;
                          $hari     = $hari;
                          $hasil    = $jml_pasien / $tt;
                          $bto = number_format($hasil, 2);
                        ?>
                          <center>
                          <h3><?php echo $jml_pasien?><br>
                            -------------------<br>
                            <?php echo $tt?></h3>
                           <h2><b>B.T.O = <?php echo $bto;?></b></h2>
                          </center>
                        <?php } ?>
                      </td> 
                    </tr>
                  <tbody>
                </table>
                </div>
              </div>
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