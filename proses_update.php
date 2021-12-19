<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_barang'];
  $idpem = $_POST['id_pembelian'];
  $barang= $_POST['nama_barang'];
  $modal = $_POST['harga_modal'];
  $harga = $_POST['harga_jual'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  BARANG_0019  SET ID_PEMBELIAN='".$idpem."', NAMA_BARANG ='".$barang."', HARGA_MODAL ='".$modal."', HARGA_JUAL ='".$harga."' WHERE  ID_BARANG= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Barang berhasil diubah'); window.location.href='barang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Barang gagal diubah'); window.location.href='barang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: barang.php'); 
}