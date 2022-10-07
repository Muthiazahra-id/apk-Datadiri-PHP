<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
include('./input-config.php');
$no = 1;
$tabledata = "";
$data = mysqli_query($mysqli, " SELECT * FROM datadiri ");
while($row = mysqli_fetch_array($data)){
      $tabledata .= "
            <tr>
                  <td>".$row["nis"]."</td>
                  <td>".$row["nama_lengkap"]."</td>
                  <td>".$row["tanggal_lahir"]."</td>
                  <td>".$row["nilai"]."</td> 
            </tr>
      ";
      $no++;
}
$waktu_Cetak = date('d M Y -H :i:s');
$table = "
 <h1> Laporan Data Diri</h1>
 <h6>Waktu Cetak :$waktu_Cetak</h6>

      <table width='100%'cellpadding=5 border=1 cellspacing=0>
            <tr>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>Tanggal Lahir</th>
                  <th>Nilai</th>
            </tr>
            $tabledata
      </table>
";

$mpdf->WriteHTML($table);
$mpdf->Output();


?>