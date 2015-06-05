<?php $this->load->view('include/head'); ?>
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row" style="width:102%">
      <div class="col-lg-12">
        <h1 style="color:black;" class="page-header">
          Elearning
        </h1>
        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url('login/admin'); ?>">Dashboard</a>
          </li>
          <li class="active">
            <i class="fa fa-fw fa-table"></i> Elearning
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
<h3 align="center" style="color:black;border:0;box-shadow:0 0;">Data Elearning</h3><hr style="width:100%">
<!-- Start Modal Add Elearning -->
<a data-toggle="modal" data-target="#addelearning" href="#"><input class="btn btn-primary" style="margin-bottom:10px;" type="submit" value="Add Elearning"></a>
<?php $this->load->view('Administrator/addelearning'); ?>
<!-- End Modal Add Elearning -->
<table class="container">
        <tr>
                <td>id_emp</td>
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>email</td>
                <td>phone</td>
                <td>job_title</td>
                <td>job_area</td>
                <td>Aksi</td>
            </tr>
            <?php 
                foreach ($data_elearning->result_array() as $rowDataCnt) : 
            ?>
            <tr>
                <td><?php echo $rowDataCnt['id_emp']; ?></td>
                <td><?php echo $rowDataCnt['fn']; ?></td>
                <td><?php echo $rowDataCnt['mn']; ?></td>
                <td><?php echo $rowDataCnt['ln']; ?></td>
                <td><?php echo $rowDataCnt['email']; ?></td>
                <td><?php echo $rowDataCnt['tlp']; ?></td>
                <td><?php echo $rowDataCnt['job_title']; ?></td>
                <td><?php echo $rowDataCnt['job_area']; ?></td>
                <td align="center">
                    <a data-toggle="modal" data-target="#<?php echo $rowDataCnt['id'] ?>" href="#"><i style="margin-left:50%" class=" glyphicon glyphicon-pencil"></i></a>
                    <a onclick="return confirm('Anda Yakin ingin Menghapus user ?')" href="<?php echo site_url('login/delete/'.$rowDataCnt['id']); ?>"><i style="color:red; margin-right:50%" class="glyphicon glyphicon-trash"></i></a>
                </td>
                <!--<td>
                  <a data-toggle="modal" data-target="#<?php echo $rowDataCnt['id'] ?>" href="#"><button  style="width:80px; margin-bottom:5px;" class="glyphicon glyphicon-list"></button></a>
                </td>-->
            </tr>
            <?php echo $this->load->view('Administrator/edit_elearning');  ?>
        <?php endforeach ?>
</table>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</div>

</body>
</html>