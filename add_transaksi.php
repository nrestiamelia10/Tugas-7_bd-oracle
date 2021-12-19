<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_transaksi'];
  $idpem=$_POST['id_pembelian'];
  $idbarang=$_POST['id_barang'];
  $harga=$_POST['harga_jual'];
  $tanggal=$_POST['tanggal_jual'];

	$query = "INSERT INTO TRANSAKSI_19 (ID_TRANSAKSI,ID_PEMBELIAN,ID_BARANG,HARGA_JUAl,TANGGAL_JUAL) VALUES ('".$id."','".$idpem."','".$idbarang."','".$harga."','".$tanggal."')";
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