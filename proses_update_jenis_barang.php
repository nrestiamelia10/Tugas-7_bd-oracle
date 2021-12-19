<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_jenis_barang'];
  $idbrg = $_POST['id_barang'];
  $jenis= $_POST['jenis_barang'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  JENIS_BARANG_0019  SET ID_BARANG='".$idbrg."', JENIS_BARANG='".$jenis."' WHERE  ID_JENIS_BARANG= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Jenis Barang berhasil diubah'); window.location.href='jenis_barang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Jenis Barang gagal diubah'); window.location.href='jenis_barang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: jenis_barang.php'); 
}