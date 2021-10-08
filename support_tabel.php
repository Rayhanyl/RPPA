<?php include ('templates/header.php'); ?>
<?php include ('templates/side_bar.php'); ?>
<?php include ('koneksi/koneksi.php'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Tables</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables Support</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          DataTable Support
          <div style="float:right;">
          <?php if (empty($_SESSION['level'])){ ?>
          <div></div>
          <?php } else { ?>
          <?php if ($_SESSION['level'] == 'admin'){ ?>
          <h7><b>TAMBAH DATA</b></h7><a href="support_add.php" class="btn btn-icon btn-sm btn-inverse"><i class="fa fa-plus-square fa-2x" style="color:green;"></i></a>
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
              $data = $conn->query("SELECT * FROM progres INNER JOIN bagian ON bagian.id_bagian = progres.bagian INNER JOIN status ON status.id_status = progres.status WHERE progres.bagian = 1");
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
                  <a href="support_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fas fa-edit"></i></a>
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
        location.href = "support_proses.php?aksi=hapus&id=" + id;
      }
    }
  </script>
  <?php include ('templates/footer.php'); ?>