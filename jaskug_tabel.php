<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Tables</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables Jaskug</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          DataTable Jaskug
          <div style="float:right;">
          <?php if (empty($_SESSION['level'])){ ?>
          <div></div>
          <?php } else { ?>
          <?php if ($_SESSION['level'] == 'admin'){ ?>
          <h7><b>TAMBAH DATA</b></h7><a href="jaskug_add.php" class="btn btn-icon btn-sm btn-inverse"><i class="fa fa-plus-square fa-2x" style="color:green;"></i></a>
           <?php } } ?>
          </div>
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Bagian</th>
                <th>Modul</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Presentase</th>
                <th>Keterangan</th>
                <?php if (empty($_SESSION['level'])){ ?>
                <?php } else { ?>
                <?php if ($_SESSION['level'] == 'admin'){ ?>
                <th>Manajemen Data</th>
                <?php } } ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Bagian</th>
                <th>Modul</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Presentase</th>
                <th>Keterangan</th>
                <?php if (empty($_SESSION['level'])){ ?>
                <?php } else { ?>
                <?php if ($_SESSION['level'] == 'admin'){ ?>
                <th>Manajemen Data</th>
                <?php } } ?>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              $data = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian INNER JOIN status ON status.id_status = progres.status WHERE progres.bagian = 2");
                while($row = $data->fetch_assoc()) {
              ?>
              <tr>
                <td><?= $row['bagian']?></td>
                <td><?= $row['modul']?></td>
                <td><?= $row['due_date']?></td>
                <td><?= $row['status']?></td>
                <td><?= $row['persentase']?>%</td>
                <td><?= $row['keterangan']?></td>
                <?php if (empty($_SESSION['level'])){ ?>
                <?php } else { ?>
                <?php if ($_SESSION['level'] == 'admin'){ ?>
                <td class="text-center">
                  <a href="jaskug_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fas fa-edit"></i></a>
                  <a onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-sm btn-danger"
                    style="color:#fff;cursor:pointer"><i class="fa fas fa-trash"></i></a>
                </td>
                <?php } } ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <script>
    function deleteData(id) {
      var r = confirm("Anda yakin ingin menghapus ini");
      if (r == true) {
        location.href = "jaskug_proses.php?aksi=hapus&id=" + id;
      }
    }
  </script>
  <?php include ('templates/footer.php'); ?><?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Tables</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables Jaskug</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          DataTable Example
        </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th>Bagian</th>
                <th>Modul</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Presentase</th>
                <th>Keterangan</th>
                <th>Manajemen Data</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Bagian</th>
                <th>Modul</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Presentase</th>
                <th>Keterangan</th>
                <th>Manajemen Data</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
              $data = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian INNER JOIN status ON status.id_status = progres.status WHERE progres.bagian = 2");
              while($row = $data->fetch_assoc()) {
              ?>
              <tr>
                <td><?= $row['bagian']?></td>
                <td><?= $row['modul']?></td>
                <td><?= $row['due_date']?></td>
                <td><?= $row['status']?></td>
                <td><?= $row['persentase']?>%</td>
                <td class="text-justify"><?= $row['keterangan']?></td>
                <td class="text-center">
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal1"><i
                      class="fa fa-plus"></i></a>
                  <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i
                      class="fa fas fa-edit"></i></a>
                  <a onclick="deleteData(<?= $row['id'] ?>)" class="btn btn-sm btn-danger"
                    style="color:#fff;cursor:pointer"><i class="fa fas fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              <!-- Form Data Modal Edit-->
              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="/action_page.php">
                        <div class="form-group">
                          <label for="bagian">Bagian</label>
                          <input type="text" class="form-control" placeholder="Bagian" id="bagian" name="bagian">
                        </div>
                        <div class="form-group">
                          <label for="modul">Modul / Sistem / Aplikasi / Kegiatan</label>
                          <input type="text" class="form-control" placeholder="Modul" id="modul" name="modul">
                        </div>
                        <div class="form-group">
                          <label for="duedate">Deadline</label>
                          <input type="date" class="form-control" placeholder="DueDate" id="due_date" name="due_date">
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" placeholder="Status" id="status" name="status">
                        </div>
                        <div class="form-group">
                          <label for="persentase">Persentase</label>
                          <input type="text" class="form-control" placeholder="Persentase" id="persentase"
                            name="persentase">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Form Data Modal Edit -->

              <!-- Form Data Modal Add-->
              <!-- The Modal -->
              <div class="modal fade" id="myModal1">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="add_data.php?aksi=insert" method="post">
                        <div class="form-group">
                          <label for="bagian">Bagian</label>
                          <input type="text" class="form-control" placeholder="Bagian" id="bagian" name="bagian">
                        </div>
                        <div class="form-group">
                          <label for="modul">Modul / Sistem / Aplikasi / Kegiatan</label>
                          <input type="text" class="form-control" placeholder="Modul" id="modul" name="modul">
                        </div>
                        <div class="form-group">
                          <label for="duedate">Deadline</label>
                          <input type="date" class="form-control" placeholder="DueDate" id="due_date" name="due_date">
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" placeholder="Status" id="status" name="status">
                        </div>
                        <div class="form-group">
                          <label for="persentase">Persentase</label>
                          <input type="text" class="form-control" placeholder="Persentase" id="persentase"
                            name="persentase">
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <input type="text" class="form-control" placeholder="Keterangan" id="keterangan"
                            name="keterangan">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Form Data Modal Add -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <script>
    function deleteData(id) {
      var r = confirm("Anda yakin ingin menghapus ini");
      if (r == true) {
        location.href = "jaskug_proses.php?aksi=hapus&id=" + id;
      }
    }
  </script>
  <?php include ('templates/footer.php'); ?>