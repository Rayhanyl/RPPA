<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>
<?php
$data = $conn->query('SELECT * FROM progres INNER JOIN status ON status.id_status = progres.status WHERE id="'.$_GET['id'].'"');
$row = $data->fetch_assoc()

?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Form</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="jaskug_tabel.php">Tabel</a></li>
        <li class="breadcrumb-item active">Form Edit Jaskug</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Form Edit Jaskug
        </div>
        <div class="card-body">
  <form action="jaskug_proses.php?aksi=update&id=<?= $_GET['id'] ?>" method="POST">
<!--   <div class="form-group">
    <label for="bagian">Bagian</label>
     <select class="form-control" name='bagian' required>
        <option value="<?= $row['bagian'] ?>"></option>
        <option value="">-- Pilih Bagian --</option>
        <option value="2">Jaskug</option>
      </select>
  </div> -->
  <input type="name" name="bagian" value="2" hidden>
  <div class="form-group">
    <label for="modul">Modul / Sistem / Aplikasi / Kegiatan</label>
    <input type="text" class="form-control" placeholder="Modul / Sistem / Aplikasi / Kegiatan" name="modul" value="<?= $row['modul'] ?>">
  </div>
  <div class="form-group">
    <label for="persentase">Persentase</label>
    <input type="text" class="form-control" placeholder="Persentase" name="persentase" value="<?= $row['persentase'] ?>">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
      <select class="form-control" name='status' required>
        <option disabled>-- Pilih Status --</option>
        <?php
        $status = $conn->query('SELECT * FROM status');
        while($rowti=$status->fetch_assoc()) {
          if($rowti['status']==$row['status']){
            ?>
        <option value="<?= $rowti['id_status'] ?>" selected><?= $rowti['status']?></option>
        <?php
          }else{
            ?>
        <option value="<?= $rowti['id_status'] ?>"><?= $rowti['status'] ?></option>
        <?php

          }
              }?>
      </select>
  </div>
  <div class="form-group">
    <label for="due_date">Deadline</label>
    <input type="date" class="form-control" placeholder="Deadline" name="due_date" value="<?= $row['due_date'] ?>">
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" value="<?= $row['keterangan'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
  </main>
  <?php include ('templates/footer.php'); ?>