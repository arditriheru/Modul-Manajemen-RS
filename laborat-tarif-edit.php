<?php include 'views/header.php';?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Detail <small>Poliklinik</small></h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-flash"></i> Detail</li>
      </ol>
      <?php include "../notifikasi1.php"?>
    </div>
  </div><!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <?php 
        include '../koneksi.php';
        $id_lab_tarif = $_GET['id'];
        $data = mysqli_query($koneksi,"
          SELECT * FROM lab_tarif WHERE id_lab_tarif = $id_lab_tarif;");
        while($d = mysqli_fetch_array($data)){
          ?>
          <?php
          if(isset($_POST['submit'])){
            include '../koneksi.php';
            $kel      = $_POST['kel'];

            $edit=mysqli_query($koneksi,"UPDATE lab_tarif SET kel='$kel' WHERE id_lab_tarif='$id_lab_tarif'");
            if($edit){
              echo "<script>
              setTimeout(function() {
                swal({
                  title: 'Berhasil',
                  text: 'Memperbarui Tarif Laborat',
                  type: 'success'
                  }, function() {
                    window.location = 'laborat-tarif-tampil';
                    });
                    }, 10);
                    </script>";
                  }else{
                    echo "<script>
                    setTimeout(function() {
                      swal({
                        title: 'Gagal',
                        text: 'Memperbarui Tarif Laborat',
                        type: 'error'
                        }, function() {
                          window.location = 'laborat-tarif-edit?id=$id_lab_tarif';
                          });
                          }, 10);
                          </script>";
                        }
                      }
                      ?>

                      <form method="post" action="" role="form">
                        <div class="form-group">
                          <label>Kode</label>
                          <input class="form-control" type="text" name="id_lab_tarif"
                          value="<?php echo $d['id_lab_tarif']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Tindakan</label>
                          <input class="form-control" type="text" name="nama"
                          value="<?php echo $d['nama']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Kode Kelompok</label><p class="redtext">Pemisah antar kode kelompok memakai koma tanpa spasi!</p>
                          <input class="form-control" type="text" name="kel"
                          value="<?php echo $d['kel']; ?>" required="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Edit</button>
                        </form><?php }?> 
                      </div>
                    </div>
                  </div><!-- /.row -->
                  <?php include 'views/footer.php';?>