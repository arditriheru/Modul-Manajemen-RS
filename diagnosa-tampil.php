<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Rekap <small>Diagnosa</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Diagnosa</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
       <form method="post" action="diagnosa-export" role="form">
        <div class="col-lg-6">
         <div class="form-group">
          <input class="form-control" type="hidden" name="dokter" value="<?php echo $dokter?>">
        </div>
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
          <th><div align="center">Nama Dokter</div></th>
          <th><div align="center">ICD</div></th>
          <th><div align="center">Diagnosa</div></th>
          <th><div align="center">Jumlah</div></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../koneksi.php';
        $id_dokter = $_POST['id_dokter'];
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        $no = 1;
        $data = mysqli_query($koneksi,"
          SELECT mr_rla.icd, MR_ICD.diagnosa, mr_dokter.nama_dokter,
          COUNT(*) AS 'hasil'
          FROM mr_rla, MR_ICD, mr_bl, mr_dokter
          WHERE mr_rla.id_mr_bl = mr_bl.id_mr_bl
          AND mr_bl.id_dokter = mr_dokter.id_dokter
          AND mr_rla.icd = MR_ICD.icd
          AND mr_bl.id_dokter = '$id_dokter'
          AND mr_rla.tanggal BETWEEN '$awal' AND '$akhir'
          GROUP BY icd
          ORDER BY hasil DESC;");
        while($d = mysqli_fetch_array($data)){
          ?>
          <tr>
            <td><div align="center"><?php echo $no++; ?></div></td>
            <td><div align="center"><?php echo $d['nama_dokter']; ?></div></td>
            <td><div align="center"><?php echo $d['icd']; ?></div></td>
            <td><?php echo $d['diagnosa']; ?></td>
            <td><div align="center"><?php echo $d['hasil']; ?></div></td>
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