<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membuat Circular Progress Dengan Javascript</title>
  <link rel="stylesheet" href="circular.css">
  <script src="jquery-1.10.2.min.js"></script>
</head>
<body>
  <div class="bulet"></div>
  <div class="blur"></div>
  <canvas height="200" width="200" id="counter" />
</body>
</html>
<script type="application/javascript">
    var counter = document.getElementById('counter').getContext('2d');
    var no= 0; // posisi mulai titik point
    var pointToFill = 4.72; // titik point membuat sebuah lingkaran
    var cw = counter.canvas.width; // nilai width canvas
    var ch = counter.canvas.height; // nilai height canvas
    var diff; // mencari nilai diantara
 
    function fillCounter(){
      diff = ((no/100) * Math.PI*2*10);
 
      counter.clearRect(0,0,cw,ch);
 
      counter.lineWidht = 15; 
 
      counter.fillStyle = '#fff';
 
      counter.strokeStyle = '#FD0A0A'; // nilai warna stroke
 
      counter.textAlign = 'center';
 
      counter.font = "45px monospace";
 
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
  </script>
