<?php 
session_start();
if(!isset($_SESSION['username'])) {
header('location:index.php'); }
else { $username = $_SESSION['username']; 
}
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
    <?php 
          include 'koneksi.php';
          $data = mysqli_query($koneksi,"SELECT COUNT(*) AS a FROM mr_pasien;");
          while($d = mysqli_fetch_array($data)){
    ?>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Demografi <small>Per Kecamatan | Total 
              <?php echo $d['a']; }?> Pasien</small></h1></small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>  

            <?php include "notifikasi1.php"?>

          </div>
        </div><!-- /.row -->
  <div class="row">
          <div class="col-lg-12">
            <h4 id="nav-tabs">Pilih Kabupaten</h4>
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
                  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                </div>
                <div class="tab-pane fade" id="2">
                  <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                </div>
              </div>
            </div>

          </div>
          
        </div><!-- /.row -->
<br><br>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
