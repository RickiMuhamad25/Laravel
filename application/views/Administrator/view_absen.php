<?php $this->load->view('include/head'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="width:102%">
                    <div class="col-lg-12">
                        <h1 style="color:black;" class="page-header">
                            View Absen
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('login/admin'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-wrench"></i> <a href="<?php echo site_url('login/absen') ?>"> View Absen </a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-wrench"></i> Absen 
                            </li>
                        </ol>
                    </div>
                </div>

<tr>
<h1 align="center" style="bgcolor:#fff;">Emplyee ID : <?php echo "$_POST[emp_id]"; ?> </h1>
<h3 align="center">Periode Tahun <?php echo "<font color=red>$_POST[thn]</font>"; ?> Bulan    <?php echo "<font color=red>$_POST[bln]</font>"; ?></h3>
<table class="table">
<td align=top bgcolor="#1738ac" align="center" width="37">
  <p align="LEFT">
  <font color="ffffff" size="2"><b>No</b></font>
  </p>
  </td>

  <td bgcolor="#1738ac" align="Left">
  <p align="left">
  <font color="ffffff" size="2"><b>Tanggal</b></font>
  </td>
  <td bgcolor="#1738ac" align="Left">
  <p align="left">
  <font color="ffffff" size="2"><b>Masuk</b></font>
  </td>
  <td bgcolor="#1738ac" align="Left">
  <p align="left">
  <font color="ffffff" size="2"><b>Keluar</b></font>
  </td>
  
  <td bgcolor="#1738ac" align="right" width="20">
  <p align="right">
  <font color="ffffff" size="2"><b>Keterangan</b></font>
  </td>
<?php
//include "konek.php";
$p=0;
for ($i=1; $i<32; $i++) 
{

//$sql = m($absen,"SELECT FORMAT(dTime,'dd-mm-yyyy') as tanggal, FORMAT(dTime,'h:m:s') as masuk,FORMAT(dTime,'h:m:s') as keluar from LogInfo where nFingerPrintID=$_POST[user_id] AND dTime between #$_POST[date_beg]# And #$_POST[date_last]# order by dTime ASC");


//$sql=mysql_query("select FORMAT(dTime,'dd-mm-yyyy') as tanggal, FORMAT(scan_date,'h:m:s') as masuk,FORMAT(scan_date,'h:m:s') as keluar from att_log where pin='492' order by scan_date ASC");
//$sql=mysql_query("select date_format(scan_date,'%d-%m-%Y') as tanggal, date_format(scan_date,'%h:%m:%s') as masuk, date_format(scan_date,'%h:%m:%s') as keluar from att_log where pin='$_POST[emp_id]' AND scan_date between '$_POST[date_beg]' and '$_POST[date_last]'  order by scan_date ASC limit 1");
$sql=mysql_query("SELECT date_format(scan_date,'%d-%m-%Y') as tanggal,date_format(scan_date,'%H:%i:%s') as masuk, date_format(scan_date,'%H:%i:%s') as keluar from att_log where date_format(scan_date,'%Y')='$_POST[thn]' and date_format(scan_date,'%m')='$_POST[bln]' and date_format(scan_date,'%e')='$i' and pin='$_POST[emp_id]' order by scan_date ASC LIMIT 1");

while ($row=mysql_fetch_array($sql))
  {
  $p++; 
 if ($i %2 ==0)
  {
  
  echo "
    <tr>  
    <td align=LEFT>
      <font style='arial' size='2'>$p</font>
    </td>
    <td align=LEFT>
      <font style='arial' size='2'> $row[tanggal]</font>
    </td>
    
    <td align=LEFT>
      <font style='arial' size='2'> $row[masuk]</font>
    </td>
    <td></td>
    <td><p align=left><font color=blue><b>In</b></font></p></td>
    </tr>";
  }
else
  {
    echo "
    <tr>  
    <td align=LEFT>
      <font style='arial' size='2'>$p </font>
    </td>
    <td align=LEFT>
      <font style='arial' size='2'> $row[tanggal]</font>
    </td>
    <td><font style='arial' size='2'> $row[masuk]</font></td>
    <td></td>
    
    <td><p align=left><font color=blue><b>In</b></font></p></td>
    </tr>";
}
}
  $lina = mysql_query("SELECT *,date_format(scan_date,'%H:%i:%s') as masuk, date_format(scan_date,'%H:%i:%s') as keluar, date_format(scan_date,'%Y-%m-%d') as tgl from att_log where date_format(scan_date,'%Y')='$_POST[thn]' and date_format(scan_date,'%m')='$_POST[bln]' and date_format(scan_date,'%e')='$i' and pin='$_POST[emp_id]' order by scan_date DESC LIMIT 1");
while($dho = mysql_fetch_array($lina))
  { 
   if ($i %2 ==0)
    {
    echo "
    <tr>
    <td align=LEFT>
        
    </td>
    <td align=LEFT>
      
    </td>
    
    <td align=LEFT>
  
    </td>
    <td align=LEFT>
      <font style='arial' size='2'> $dho[keluar]</font>
    </td>
    <td><p align=right><font color=red><b>Out</b></font></p></td>
    </tr>";
  }
else
  {
    echo "
    <tr>  
    <td align=LEFT>
      <font style='arial' size='2'> </font>
    </td>
    <td align=LEFT>
      
    </td>
    <td></td>
    <td><font style='arial' size='2'> $dho[keluar]</font></td>
    
    <td><p align=right><font color=red><b>Out</b></font></p></td>
    </tr>";
}
}
}
?>
</table>
</div>
</div>

<!-- jQuery -->
    <script src="<?php echo base_url('css_f/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('css_f/js/bootstrap.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('css_f/js/plugins/morris/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('css_f/js/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('css_f/js/plugins/morris/morris-data.js'); ?>"></script>