<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style1.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/demo.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/supersized.css') ?>">
</head>

<body id="page">
<?php echo validation_errors(); ?>
<?php echo form_open('login/check_database'); ?>

    <fieldset>
        <div style="margin-left:470px; width:500px;" id="box-login">
       <img height="100" style="margin-top:5px;border-radius:20%" width="100" src="<?php echo base_url('assets/img/ass.jpg'); ?>">
        <div class="page-container" style="margin-bottom:15%;">
            <p style="font-size:30px;color:white;">Masuk Akun</p>
            <div align="center">
                <div class="input-control text" data-role="input-control">
                    <input style="width:300px;" type="text" name="user" class="username" placeholder="Username">
                </div>

                <div class="input-control password" data-role="input-control">
                    <input style="width:300;" type="password" name="pass" class="password" placeholder="Password">                
                </div>
                <button class="btn btn-primary" type="submit">Masuk</button>
            </div>
        </div>
        </div>
    </fieldset>

</body>
</html>