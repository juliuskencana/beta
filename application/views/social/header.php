<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= assets_url('css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= assets_url('css/style.css'); ?>">
	<link rel="stylesheet" href="<?= assets_url('css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?= assets_url('css/skeleton.css'); ?>">
	<link rel="stylesheet" href="<?= assets_url('css/bootstrap.icon-large.min.css'); ?>">
	<title>Social Media | Julius Kencana</title>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="<?= base_url('assets/img/logo.jpg'); ?>" alt=""></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="social-media-menu-top"><a href="<?= base_url('social/news_feed'); ?>">Social Media</a></li>
					<li><a href="#about">Marketplace</a></li>
				</ul>

				<form class="navbar-form navbar-left hidden-sm" role="search">
					<div class="form-group inline-block">
					<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-inverse"><i class="fa fa-search fa-fw"></i></button>
				</form>

				<ul class="nav navbar-nav navbar-right">
					<?php if ($this->session->userdata('logged_in') == TRUE){ ?>
						<li>
							<a href="<?= base_url('social/setting') ?>" class="dropdown-toggle">welcome back, <?= $user->username ?></a>
						</li>
					<?php }else{ ?>
						<li class="innerLR">
							<a href="<?= base_url('social/auth'); ?>" style="margin-right: 15px;" class="sign-in btn btn-primary navbar-btn pull-left"><i class="fa fa-pencil"></i> Sign in</a>
							<a href="<?= base_url('social/auth'); ?>" class="sign-in btn btn-primary navbar-btn pull-left"><i class="fa fa-sign-in"></i> Sign up</a>
						</li>
					<?php } ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>