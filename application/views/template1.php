<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 2 | Dashboard</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
		<?php
			echo @$MASTER['CSS'];
		?>

	</head>
  	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

		  	<header class="main-header">
				<a href="index2.html" class="logo">
					<span class="logo-mini"><b>A</b>LT</span>
					<span class="logo-lg"><b>Admin</b>LTE</span>
				</a>
				<nav class="navbar navbar-static-top">
				  	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
				  	</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
							  	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
									<span class="hidden-xs">Alexander Pierce</span>
							  	</a>
							  	<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										<p>
											Alexander Pierce - Web Developer
											<small>Member since Nov. 2012</small>
										</p>
									</li>
									<li class="user-body">
									  	<div class="row">
											<div class="col-xs-4 text-center">
											  	<a href="#">Followers</a>
											</div>
											<div class="col-xs-4 text-center">
											  	<a href="#">Sales</a>
											</div>
											<div class="col-xs-4 text-center">
											  	<a href="#">Friends</a>
											</div>
									  	</div>
									</li>
									<li class="user-footer">
									  	<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
									  	</div>
										 <div class="pull-right">
											<a href="#" class="btn btn-default btn-flat">Sign out</a>
										 </div>
									</li>
							  	</ul>
							</li>
			  			</ul>
					</div>
				</nav>
			</header>

			<?php $this->load->view('menu'); ?>

			<div class="content-wrapper">

				<section class="content-header">
					<h1>
						<?php echo @$MASTER['DATA']['TITLE'] ?>
						<small><?php echo @$MASTER['DATA']['SUBTITLE'] ?></small>
					</h1>
					<!-- <ol class="breadcrumb">
					  	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					  	<li class="active">Dashboard</li>
					</ol> -->
				</section>

				<section class="content"> <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?> </section>

			</div>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.5
				</div>
				<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
			</footer>

		</div>

		<script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
		<script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
		<?php
			echo $MASTER['JS'];
		?>
	</body>
</html>