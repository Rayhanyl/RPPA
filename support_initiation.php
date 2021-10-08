<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php
$koneksi    = mysqli_connect("localhost", "root", "", "itsd");

// Query Database
$inisiasi       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=1 AND bagian = 1");
$coding       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=2 AND bagian = 1");
$testing       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=3 AND bagian = 1");
$uat       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=4 AND bagian = 1");
$complete       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=5 AND bagian = 1");
$onhold       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=6 AND bagian = 1");
$returnd       = mysqli_query($koneksi, "SELECT count(status) as coding FROM progres WHERE status=7 AND bagian = 1");
$data = $koneksi->query("SELECT * FROM progres INNER JOIN status ON status.id_status = progres.status WHERE progres.status = 1");
$result = mysqli_fetch_array($data);

// Fetch Data
$result_inisiasi = mysqli_fetch_array($inisiasi);
$result_coding = mysqli_fetch_array($coding);
$result_testing = mysqli_fetch_array($testing);
$result_uat = mysqli_fetch_array($uat);
$result_complete = mysqli_fetch_array($complete);
$result_onhold = mysqli_fetch_array($onhold);
$result_returnd = mysqli_fetch_array($returnd);


?>

 <div id="layoutSidenav_content">
     <script src="js/Chart.js"></script>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="support_chart.php">Diagram</a></li>
                            <li class="breadcrumb-item active">Support Status</li>
                        </ol>
                        <canvas id="barchart" width="100%" height="10"></canvas>
                    </div>
                </main>


                <script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: ['Initiation','Coding','Testing','UAT','Complete','Onhold','Returned'],
            datasets: [
            {
              label: "Total",
              data: [<?php echo("'".$result_inisiasi['coding']."','".$result_coding['coding']."','".$result_testing['coding']."','".
                $result_uat['coding']."','".$result_complete['coding']."','".$result_onhold['coding']."','".$result_returnd['coding']."'")?>],
              backgroundColor: [
                '#ccff33',
                '#9ef01a',
                '#70e000',
                '#38b000',
                '#008000',
                'yellow',
                'red'
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>


    <!-- ScrollSpy -->
<div class="container mt-4 mb-4">
  <center>
  <a class="btn" style="width:90px; background-color:#ccff33;" href="support_initiation.php" >Initiantion</a>
  <a class="btn" style="width:90px; background-color:#9ef01a;" href="support_coding.php">Coding</a>
  <a class="btn" style="width:90px; background-color:#70e000;" href="support_testing.php">Testing</a>
  <a class="btn" style="width:90px; background-color:#38b000;" href="support_uat.php">UAT</a>
  <a class="btn" style="width:90px; background-color:#008000;" href="support_complete.php">Complete</a>
  <a class="btn" style="width:90px; background-color:yellow;" href="support_onhold.php">Onhold</a>  
  <a class="btn" style="width:90px; background-color:red;" href="support_returned.php">Returned</a>
  </center>
</div>


<!-- Masing - masing Status -->
    <div class="container mt-4">
        <div class="card-columns">
        <?php
        $batas = 3;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($koneksi,"SELECT * FROM progres WHERE status=1 AND bagian=1");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);

        $data = mysqli_query($koneksi,"SELECT * FROM progres WHERE status=1 AND bagian=1 limit $halaman_awal, $batas");
        while($d = mysqli_fetch_array($data)){
          ?>
        <!-- Batas -->
         <div class="card">
            <div class="card-header text-center">
               <p> <?= $result['status'] ?></p>
              <?php
              $color="background-color:red;";
              if ($d['persentase'] > 0 && $d['persentase'] < 50) {
                $color="background-color:#d30d0d;";
              }else if ($d['persentase'] < 100){
                $color="background-color:#ff8800;";
              } else {
                $color="background-color:#70e000;";
              }
              ?>
                <div class="progress">
                <div class="progress-bar " style=" <?=$color?> width:<?= $d['persentase'];?>%"><?= $d['persentase'];?>%</div>
              </div>
            </div>
            <div class="card-body">
              <p class="max title" >Modul : <?= $d['modul'];?></p>
              <p class="max title">Keterangan : <?= $d['keterangan'];?></p>
            </div>
            <div class="card-footer" >
             <p>Deadline : <?= $d['due_date'];?></p>
            </div>
          </div> 
        <!-- Batas -->
          <?php
        }
        ?>
        </div>
    </div>
<nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
        </li>
        <?php 
        for($x=1;$x<=$total_halaman;$x++){
          ?> 
          <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
        }
        ?>        
        <li class="page-item">
          <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
        </li>
      </ul>
    </nav>
<!-- Masing - masing Status -->


<?php include ('templates/footer.php'); ?>
