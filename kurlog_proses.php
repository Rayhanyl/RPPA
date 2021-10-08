<?php
include 'koneksi/koneksi.php';
$aksi = $_GET['aksi'];
// PROSES INPUT
if ($aksi == 'insert') {
    $bagian = $_POST['bagian'];
    $modul = $_POST['modul'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $persentase = $_POST['persentase'];
    $due_date = $_POST['due_date'];

    
    $insert = $conn->query('INSERT INTO progres 
                        (bagian,modul,status,keterangan,persentase,due_date) 
                        VALUES 
                        ("'.$bagian.'","'.$modul.'","'.$status.'","'.$keterangan.'","'.$persentase.'","'.$due_date.'")');
    if ($insert) {
        echo '<script>alert("Data berhasil ditambahkan");location.href = "kurlog_tabel.php"</script>';
    } else {
        echo '<script>alert("Data gagal ditambahkan");history.go(-1)</script>';
    }

}else if ($aksi == 'update') {
    $id = $_GET['id'];
    $bagian = $_POST['bagian'];
    $modul = $_POST['modul'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $persentase = $_POST['persentase'];
    $due_date = $_POST['due_date'];
    
    $update = $conn->query('UPDATE progres SET bagian="'.$bagian.'",
                                            modul="'.$modul.'",
                                            status="'.$status.'",
                                            keterangan="'.$keterangan.'",
                                            persentase="'.$persentase.'",
                                            due_date="'.$due_date.'" WHERE id="'.$id.'"');

    if ($update) {
        echo '<script>alert("Data berhasil diUpdate");location.href = "kurlog_tabel.php"</script>';
    } else {
        echo '<script>alert("Data gagal diUpdate");history.go(-1)</script>';
    }

    var_dump($update);
// HAPUS DATA
} else if ($aksi == 'hapus') {
    $id = $_GET['id'];
    $hapus = $conn->query('DELETE FROM progres WHERE id="'.$id.'"');

    if ($hapus) {
        echo '<script>alert("Data berhasil dihapus");location.href = "kurlog_tabel.php"</script>';
    } else {
        echo '<script>alert("Data gagal dihapus");history.go(-1)</script>';
    }
// PROSES CHANGE PASSWORD
}