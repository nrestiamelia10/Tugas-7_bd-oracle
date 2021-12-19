<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_transaksi'];
  $idpem=$_POST['id_pembelian'];
  $idbarang=$_POST['id_barang'];
  $harga=$_POST['harga_jual'];
  $tanggal=$_POST['tanggal_jual'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE TRANSAKSI_19 SET ID_PEMBELIAN='".$idpem."', ID_BARANG ='".$idbarang."', HARGA_JUAL ='".$harga."', TANGGAL_JUAL ='".$tanggal."' WHERE  ID_TRANSAKSI= '".$id."' ";
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