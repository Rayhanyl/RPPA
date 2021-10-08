<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Form</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="support_tabel.php">Table</a></li>
        <li class="breadcrumb-item active">Form Input Support</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Form Input Support
        </div>
        <div class="card-body">
  <form action="support_proses.php?aksi=insert" method="POST">
<!--   <div class="form-group">
    <label for="bagian">Bagian</label>
     <select class="form-control" name='bagian' required>
        <option value=""></option>
        <option value="">-- Pilih Status --</option>
        <option value="1" selected>Support</option>
      </select>
  </div> -->
  <input type="name" name="bagian" value="1" hidden>
  <div class="form-group">
    <label for="modul">Modul / Sistem / Aplikasi / Kegiatan</label>
    <input type="text" class="form-control" placeholder="Modul / Sistem / Aplikasi / Kegiatan" name="modul">
  </div>
  <div class="form-group">
    <label for="persentase">Persentase</label>
    <input type="text" class="form-control" placeholder="Persentase" name="persentase">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
      <select class="form-control" name='status' required>
        <option value=""></option>
        <option value="">-- Pilih Status --</option>
        <option value="1">Initiation</option>
        <option value="2">Coding</option>
        <option value="3">Testing</option>
        <option value="4">UAT</option>
        <option value="5">Complete</option>
        <option value="6">Onhold</option>
        <option value="7">Returned</option>
      </select>
  </div>
  <div class="form-group">
    <label for="due_date">Deadline</label>
    <input type="date" class="form-control" placeholder="Deadline" name="due_date">
  </div>
  <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
  </main>
  <?php include ('templates/footer.php'); ?>