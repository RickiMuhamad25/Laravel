<html lang="en">
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css_f/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css_f/css/sb-admin.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css_f/css/plugins/morris.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css_f/font-awesome-4.1.0/css/font-awesome.min.css'); ?>">
</head>
<body>

<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Hello , <?php echo $username ?> </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-wrench"></i>  Setting  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('login/users'); ?>"><i class="fa fa-fw fa-user"></i> List User</a>
                        </li>
                        <li>
                            <a onclick="return confirm('Anda Yakin ingin logout ?')" href="<?php echo site_url('login'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                       <li><a href="<?php echo site_url('login/admin'); ?>"><i class="fa fa-fw fa-dashboard"></i>&nbsp;Dashboard</a></li>
                    </li>
                    <li>
                        <a href="<?php echo site_url('login/form'); ?>"><i class="fa fa-fw fa-table"></i> Elearning</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('login/l_helpdesk'); ?>"><i class="fa fa-fw fa-edit"></i> Helpdesk</a>
                    </li>
                    <li>
                       <a href="<?php echo site_url('login/l_meeting'); ?>"><i class="fa fa-fw fa-desktop"></i> Book Meetting</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('login/absen'); ?>"><i class="fa fa-fw fa-tasks"></i> Absen</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>