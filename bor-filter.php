<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard | Booking</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
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
            <h1>Form <small> Pencarian</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-search"></i> Cari</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
            <form method="post" action="bor-tampil2" role="form">
            <div class="col-lg-6">
              <!--<div class="form-group">
                <label>Pelayanan</label>
                <select id="iol" class="form-control" type="text" name="iol">
                  <option disabled selected>Pilih</option>
                  <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                      "SELECT * FROM mr_iol ORDER BY nama;");
                    while($d = mysqli_fetch_array($data)){
                    echo "<option value='".$d['id_mr_iol']."'>".$d['nama']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Bangsal</label>
                <div class="checkbox">
                    <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                      "SELECT * FROM mr_unit 
                      WHERE id_unit = '1','2','3'
                      ORDER BY nama_unit;");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <input type="checkbox" name="id_unit" value="<?php echo $d['id_unit']?>"><?php echo $d['nama_unit']?><br>
                      <?php
                      }
                    ?>
                </div>
              </div>-->
              <div class="form-group">
                <label>Bangsal</label>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="1" value="25">
                    Alamanda
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="2" value="29">
                    Anggrek
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="3" value="6">
                    Anturium
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="4" value="24">
                    Bugenfil
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="5" value="27">
                    Cempaka
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="6" value="28">
                    Edelweis
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="7" value="30">
                    Flamboyan
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="8" value="26">
                    Lavender
                  </label>
                </div>
               <div class="checkbox">
                  <label>
                    <input type="checkbox" name="9" value="31">
                    Mawar
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="10" value="7">
                    Sakura
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label>Dari Tanggal</label>
                <input class="form-control" type="date" name="awal">
              </div>
              <div class="form-group">
                <label>Sampai Tanggal</label>
                <input class="form-control" type="date" name="akhir">
              </div>
              <div class="form-group">
                <label>Jumlah Bed</label>
                <input class="form-control" type="number" name="tt" value="11">
              </div>
              <div class="form-group">
                <label>Jumlah Hari</label>
                <input class="form-control" type="number" name="hari" placeholder="Masukkan..">
              </div>
              <button type="submit" class="btn btn-success">Cari</button>
            </div>
            </form>
          </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?><br><br><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>