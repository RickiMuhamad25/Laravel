<?php $this->load->view('include/head'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>jquery.datetimepicker.css">
<script type="text/javascript" src="<?php echo base_url();?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>jquery.datetimepicker.js"></script>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="width:102%">
                    <div class="col-lg-12">
                        <h1 style="color:black;" class="page-header">
                            Book Meeting
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('login/admin'); ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-desktop"></i> Book meeting
                            </li>
                        </ol>
                    </div>
                </div>
                <style type="text/css">
/*  
    Side Navigation Menu V2, RWD
    ===================
    License:
    http://goo.gl/H8ytpz
    ===================
    Author: @PableraShow

 */

@charset "UTF-8";
@import url(http://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}
h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
      font-weight: bold;
      font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
      font-weight: normal;
      font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
       -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
      text-align: left;
      overflow: hidden;
      width: 100%;
      margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
      padding-bottom: 2%;
      padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
      background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
      background-color: #2C3446;
}

.container th {
      background-color: #1F2739;
}

.container td:first-child {
      color: #FB667A;
}

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
       -moz-box-shadow: 0 6px 6px -6px #0E1119;
            box-shadow: 0 6px 6px -6px #0E1119;
}


@media (max-width: 800px) {
    .container td:nth-child(4),
.container th:nth-child(4) {
          display: none;
      }
}
</style>
<h3 align="center" style="color:black;border:0;box-shadow:0 0;">Data Meeting</h3><hr style="width:100%">
<!-- Start Modal Add Meeting -->
<a data-toggle="modal" data-target="#addroom" href="#"><input class="btn btn-primary" type="submit" value="Add Room Meeting"><label style="margin-left:2%">=></label>
<a data-toggle="modal" data-target="#addmeeting" href="#"><input style="margin-left:2%" class="btn btn-primary" style="margin-bottom:10px;" type="submit" value="Add Meeting"></a></a>
<?php $this->load->view('Administrator/addmeeting'); ?>
<?php $this->load->view('Administrator/new_room'); ?>
<!-- End Modal Add Meeting -->
<table class="container">
        <tr>
                <td>id_book</td>
                <td>Ticket Book</td>
                <td>Emp_id</td>
                <td>Date</td>
                <td>Email</td>
                <td>Logs</td>
                <td>Aksi</td>
            </tr>
            <?php 
                foreach ($data_meeting->result_array() as $rowDataCnt) : 
            ?>
            <tr>
                <td><?php echo $rowDataCnt['id_book']; ?></td>
                <td><?php echo $rowDataCnt['ticket_book']; ?></td>
                <td><?php echo $rowDataCnt['emp_id']; ?></td>
                <td><?php echo $rowDataCnt['date_book']; ?></td>
                <td><?php echo $rowDataCnt['emp_email']; ?></td>
                <td><?php echo $rowDataCnt['logs_id']; ?></td>
                <td align="center">
                    <a data-toggle="modal" data-target="#<?php echo $rowDataCnt['id_book'] ?>" href="#"><i style="margin-left:50%" class=" glyphicon glyphicon-pencil"></i></a>
                    <a onclick="return confirm('Anda Yakin ingin Menghapus Books ?')" href="<?php echo site_url('login/d_meeting/'.$rowDataCnt['id_book']); ?>"><i style="color:red; margin-right:50%" class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php echo $this->load->view('Administrator/e_meeting');  ?>
        <?php endforeach ?>
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