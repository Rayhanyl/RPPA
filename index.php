<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>
<?php
    $total = mysqli_query($conn, "SELECT count(status) as total FROM progres");
    $hasil = mysqli_fetch_array($total);
?>

<?php
$support = mysqli_query($conn, "SELECT count(status) as support FROM progres WHERE bagian=1");
$jaskug = mysqli_query($conn, "SELECT count(status) as jaskug FROM progres WHERE bagian=2");
$kurlog = mysqli_query($conn, "SELECT count(status) as kurlog FROM progres WHERE bagian=3");
$data1 = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian WHERE progres.bagian = 1");
$data2 = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian WHERE progres.bagian = 2");
$data3 = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian WHERE progres.bagian = 3");                     // Fetch Data
$result_support = mysqli_fetch_array($support);
$result_jaskug = mysqli_fetch_array($jaskug);
$result_kurlog = mysqli_fetch_array($kurlog);
$result1 = mysqli_fetch_array($data1);
$result2 = mysqli_fetch_array($data2);
$result3 = mysqli_fetch_array($data3);
?>

<div id="layoutSidenav_content">
    <main>
        <!-- Bagian Bacaan Dashboard -->
        <div class="container-fluid px-4">
            <h1 class="mt-1">Dashboard</h1>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-2">
                <div class="card-body">
                    <center>
                    <h8 class="text-center">
                        <b>REKAPITULASI PROGRESS PENGEMBANGAN APLIKASI</b>
                    <br>
                    <b>DIVISI INFORMATION TECHNOLOGI STRATEGY AND DEVELOPMENT</b>
                    </h8>
                    </center>
<!--                     <p class="text-center">NOTE: Bagian Login Dan Logout Belum, Bagian CRUD Data belum bisa, 
                    Bagian sesudah diagram batang baru bisa menampilkan data nya, belum bisa memilih berdasarkan status nya</p> -->
                </div>
            </div>
        <!-- Bagian Bacaan Dashboard -->
            <!-- Diagram Pie -->
<div class="row">
    <div class="card mb-2">
<!--     <div style="width: 500px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div> -->
    <div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>
        <div class="card-body">
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  [<?php echo ("'".($result1['bagian'])."'")?>,Number(<?php echo("'".($result_support['support'])."'") ?>)],
  [<?php echo ("'".($result2['bagian'])."'")?>,Number(<?php echo("'".($result_jaskug['jaskug'])."'") ?>)],
  [<?php echo ("'".($result3['bagian'])."'")?>,Number(<?php echo("'".($result_kurlog['kurlog'])."'") ?>)]
]);
var options = {
  title:'RPPA'
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
  alert(Object.values(chart));
}
</script>
<!--          <script type="text/javascript">
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?php echo("'".($result1['bagian'])."','".($result2['bagian'])."','".($result3['bagian'])."'")?>],
                datasets: [{
                    label: '',
                    data: [<?php echo( "'".round ($result_support['support']/ ($hasil['total']/100))."',
                        '".round ($result_jaskug['jaskug']/ ($hasil['total']/100))."',
                        '".round ($result_kurlog['kurlog']/ ($hasil['total']/100))."'")?>],
                    backgroundColor: [
                    'rgba(218, 0, 0, 4)',
                    'rgba(255, 165, 0, 4)',
                    'rgba(60, 179, 133, 4)'
                    ],
                    borderColor: [
                    'rgba(240,240,240,8)',
                    'rgba(240,240,240,8)',
                    'rgba(240,240,240,8)'
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
        </script> -->
    </div>
    </div>
</div>
            <!-- Diagram Pie -->
            <!-- Box Persentase -->
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6">
                    <center>
                    <div class="card bg-danger text-white mb-4" style="width:125px; height:125px;">
                        <div class="card-body">
                            <center>
                                <h8 class="animate__animated animate__fadeIn animate__delay-1s "> SUPPORT </h8>
                                <br>
                                <?php 
                                        $inisiasi = mysqli_query($conn, "SELECT count(status) as support FROM progres WHERE bagian=1");
                                        $row = mysqli_fetch_array($inisiasi);
                                    ?>
                                <h8 class="animate__animated animate__bounce">
                                    <?= round( $row['support'] / ($hasil['total']/100))?>% 
                                </h8>
                            </center>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="support_chart.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </center>
                </div>
                <div class="col-xl-3 col-md-6">
                    <center>
                    <div class="card bg-warning text-white mb-4"  style="width:125px; height:125px;">
                        <div class="card-body">
                            <center>
                                <?php 
                                        $inisiasi = mysqli_query($conn, "SELECT count(status) as jaskug FROM progres WHERE bagian=2");
                                        $row = mysqli_fetch_array($inisiasi);
                                    ?>
                                <h8 class="animate__animated animate__fadeIn animate__delay-2s"> JASKUG </h8>
                                <br>
                                <h8 class="animate__animated animate__bounce animate__delay-1s">
                                    <?= round( $row['jaskug'] / ($hasil['total']/100))?>% 
                                </h8>
                            </center>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="jaskug_chart.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </center>
                </div>
                <div class="col-xl-3 col-md-6">
                    <center>
                    <div class="card bg-success text-white mb-4"  style="width:125px; height:125px;">
                        <div class="card-body">
                            <center>
                                <?php 
                                $inisiasi = mysqli_query($conn, "SELECT count(status) as kurlog FROM progres WHERE bagian=3");
                                $row = mysqli_fetch_array($inisiasi);
                                    ?>
                                <h8 class="animate__animated animate__fadeIn animate__delay-3s "> KURLOG </h8>
                                <br>
                                <h8 class="animate__animated animate__bounce animate__delay-2s">
                                    <?= round( $row['kurlog'] / ($hasil['total']/100))?>% 
                                </h8>
                            </center>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="kurlog_chart.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </center>
                </div>
            </div>
             <!-- Box Persentase -->

        </div>
    </main>
   
    <?php include ('templates/footer.php'); ?>