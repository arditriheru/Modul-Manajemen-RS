<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manajemen | RSKIA Rachmi</title>
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
            <h1>Rekap <small>Demografi Propinsi</small></h1>
            <ol class="breadcrumb">
              <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Propinsi</li>
            </ol>
            <?php include "../notifikasi1.php"?>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
          <div class="table-responsive">
          	<form method="post" action="d-pasien-propinsi" role="form">
          	<div class="col-lg-6">
			  <div class="form-group">
                <label>Dari Tanggal</label>
                <input class="form-control" type="date" name="awal">
              </div>
              <div class="form-group">
                <label>Sampai Tanggal</label>
                <input class="form-control" type="date" name="akhir">
              </div>
              <button type="submit" class="btn btn-success">Cari</button>
            </div>
            </form>
            <br><br>
                </div>
          </div>
        </div><!-- /.row -->
      </div><br><br><?php include "../copyright.php";?>
      <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>