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
                            <li class="active">
                                <i class="fa fa-fw fa-wrench"></i> View Absen
                            </li>
                        </ol>
                    </div>
                </div>
                <script language="javascript">
  function valid()
  {
    var cek_id=document.form_absen.emp_id.value
        
  if (cek_id=="")
    {
    alert("Anda belum mengisi ID anda")
    form_absen.emp_id.focus()
    return false  
    }
  return true
  }
</script>
<BODY>

<H1><font size="5">Silahkan Masukkan Periode Tanggal Absensi</font></H1>

<HR>

<form method="POST" action="<?php echo site_url(); ?>/login/view_absen">
<div class="row" style="width:900px; margin-left:4px;">
<div class="panel panel-primary">
<div class="panel-heading">Search Absen</div>
<div class="panel-body">
<div class="table-responsive">

  <table class="table table-hover">
  <!--<tr>
    <td>ID Employee <label>:</label></td>
    <td><input type="text" class="form-control" name="id_emp"  placeholder="Your id emp " required ></td>
  </tr>-->
    <tr>
      <td><b><i>Input Employee Id:</i></b></label></td>
      <td><input type="number" class="form-control" name="emp_id" id="emp_id"></td>
      <td></td>
    </tr>

    <tr>
      <td align="left" width="173">
      <b><i>Tahun:</i></b></td>
      <td width="500">
          <select class="btn btn-primary" name="thn" id="thn">
              <option value="">Years</option>
              <?php 
                                for ($thn=2013 ; $thn <=2015 ; $thn++)
                                        {
                                                echo "<option value='$thn'>$thn</option>";
                                        }
              ?>
          </select>
        </td>
    </tr>
  
    <tr>
       <td width="173"><i><b>Bulan :</b></i></td>
       <td width="500">
          <select class="btn btn-primary" name="bln" id="bln">
            <option value="">Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </td>
      </tr>
    </table>
    <input class="btn btn-primary" type="submit" value="Submit ">
<table>
</div>
</div>
</div>
</div>
</form>
<!-- jQuery -->
    <script src="<?php echo base_url('css_f/js/jquery.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('css_f/js/bootstrap.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('css_f/js/plugins/morris/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('css_f/js/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('css_f/js/plugins/morris/morris-data.js'); ?>"></script>