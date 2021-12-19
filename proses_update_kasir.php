<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_kasir'];
  $idtrns = $_POST['id_transaksi'];
  $nama= $_POST['nama_kasir'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  KASIR_019  SET ID_TRANSAKSI='".$idtrns."', NAMA_KASIR='".$nama."' WHERE  ID_KASIR= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Kasir berhasil diubah'); window.location.href='kasir.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Kasir gagal diubah'); window.location.href='kasir.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: kasir.php'); 
}