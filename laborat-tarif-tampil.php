<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Demografi Agama</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Agama</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="laborat-tarif-export" role="form">
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
            <th><div align="center">No</div></th>
            <th><div align="center">Tindakan</div></th>
            <th><div align="center">Alat</div></th>
            <th><div align="center">Jasa RS</div></th>
            <th><div align="center">Tarif</div></th>
            <th><div align="center">Kelompok</div></th>
            <th><div align="center">Action</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../koneksi.php';
          $no=1;
          $data = mysqli_query($koneksi,"
            SELECT * FROM lab_tarif;");
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><div align="center"><?php echo $no++; ?></div></td>
              <td><div align="center"><?php echo $d['nama']; ?></div></td>
              <td><div align="center"><?php echo $d['alat']; ?></div></td>
              <td><div align="center"><?php echo $d['jasa_rs']; ?></div></td>
              <td><div align="center"><?php echo $d['tarif']; ?></div></td>
              <td><div align="center"><?php echo $d['kel']; ?></div></td>
              <td>
                <div align="center">
                    <a href="laborat-tarif-edit?id=<?php echo $d['id_lab_tarif']; ?>"
                      <button type="button" class="btn btn-warning">Edit</a><br><br>
                      </div>
                    </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.row -->
      <?php include 'views/footer.php';?>