<!DOCTYPE html>
<html>
<?php include'cetak_excel.php'; ?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Penjualan Toko Sembako</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
						<th>NO</th>
						<th>ID_PEMBELIAN</th>
						<th>ID_BARANG</th>
						<th>NAMA BARANG</th>
						<th>HARGA MODAL</th>
                        <th>HARGA JUAL</th> 
						<th>SUB TOTAL</th>   						
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					include'koneksi.php';
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi,'select * from BARANG_0019
Inner join PEMBELIAN_10019 on BARANG_0019.ID_BARANG =PEMBELIAN_10019.ID_PEMBELIAN');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["HARGA_JUAL"] * $row["JUMLAH_BELI"];
					$total_semua += $total;	
						
						?>
                       <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
						<td>
						 <?php echo $row["ID_BARANG"];?>
						</td>
						<td>
						 <?php echo $row["ID_PEMBELIAN"]?>
						</td>
						<td>
						 <?php echo $row["NAMA_BARANG"]?>
						</td>						
						  <td> 
						<?php echo $row["HARGA_MODAL"]?>
						</td>
						<td>
						 <?php echo $row["HARGA_JUAL"]?>
						</td>
                          <td>
						 <?php echo $row["HARGA_JUAL"]?>
						</td>                 
                      </tr>                                             
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                                <div class="card-body">
                 <center>Bekasi, 10 Januari 2022</center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Neng Resti Amelia </b></center>
                </div>
              </div>
            </div>
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>