<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_pembelian'];
  $jum = $_POST['jumlah_beli'];
  $sub= $_POST['sub_total'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  PEMBELIAN_10019  SET JUMLAH_BELI='".$jum."', SUB_TOTAL ='".$sub."' WHERE  ID_PEMBELIAN= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Pembelian berhasil diubah'); window.location.href='barang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Pembelian gagal diubah'); window.location.href='barang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pembelian.php'); 
}