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
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
                .max.title {
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis;
            }
  </style>
</head>
<body> 
 
<!-- ScrollSpy -->
    <div class="container">
        <div class="card-columns">
        <?php
        $batas = 3;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($koneksi,"SELECT * FROM progres WHERE status=5 AND bagian=1");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
        
        $data = mysqli_query($koneksi,"SELECT * FROM progres WHERE status=1 AND bagian=1 limit $halaman_awal, $batas");
        while($d = mysqli_fetch_array($data)){
        ?>
        <!-- Batas -->
         <div class="card" style="margin-top:50px;">
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
    <!-- ScrollSpy -->
</body>
</html>

<!-- <script type="application/javascript">
    var counter = document.getElementById('counter').getContext('2d');
    var no= 0; // posisi mulai titik point
    var pointToFill = 4.72; // titik point membuat sebuah lingkaran
    var cw = counter.canvas.width; // nilai width canvas
    var ch = counter.canvas.height; // nilai height canvas
    var diff; // mencari nilai diantara
 
    function fillCounter(){
      diff = ((no/100) * Math.PI*2*10);
 
      counter.clearRect(0,0,cw,ch);
 
      counter.lineWidht = 10005; 
 
      counter.fillStyle = '#fff';
 
      counter.strokeStyle = 'black'; // nilai warna stroke
 
      counter.textAlign = 'center';
 
      counter.font = "20px monospace";
 
      counter.fillText(no+'%',100,110); // fillText(text,x,y)
 
      counter.beginPath();
      counter.arc(100,100,90,pointToFill,diff/10+pointToFill); // arc(x,y,radius,strat,stop)
 
      counter.stroke();
 
      if(no >= 80)
      {
        clearTimeout(fill);
      }
      no++;
    }
 
    var fill = setInterval(fillCounter,10); // untuk memanggil function fillCounter setiap 50ms
  </script> -->
