<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_transaksi'];
  $barang=$_POST['nama_barang'];
   $nama=$_POST['nama_pembeli'];
  $total=$_POST['sub_total'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE TRANSAKSI_10 SET NAMA_BARANG='".$barang."', NAMA_PEMBELI ='".$nama."', SUB_TOTAL ='".$total."' WHERE  ID_TRANSAKSI= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Transaksi berhasil diubah'); window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Transaksi gagal diubah'); window.location.href='transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}