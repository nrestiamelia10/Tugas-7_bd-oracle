<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_transaksi'];
  $barang=$_POST['nama_barang'];
   $nama=$_POST['nama_pembeli'];
  $total=$_POST['sub_total'];
  

	$query = "INSERT INTO TRANSAKSI_10 (ID_TRANSAKSI,NAMA_BARANG,NAMA_PEMBELI,SUB_TOTAL) VALUES ('".$id."','".$barang."','".$nama."','".$total."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Transkasi berhasil ditambahkan'); 
	window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Transkasi gagal ditambahkan');
	window.location.href='transaksi.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}