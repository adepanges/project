<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kineforum [ALPA]</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo $this->config->item('url_bootstrap') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('url_plugins') ?>font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('url_bootstrap') ?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('url_bootstrap') ?>dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('url_css') ?>kineforum.css">


    <script type="text/javascript">
      app = <?php echo json_encode($data_app) ?>;
    </script>
    <script src="<?php echo $this->config->item('url_plugins') ?>jQuery/jQuery-2.2.3.min.js"></script>
    <script src="<?php echo $this->config->item('url_bootstrap') ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('url_bootstrap') ?>dist/js/app.min.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->item('url_app_kineforum') ?>js/helper.js"></script>

     <style type="text/css">
      .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?php echo $this->config->item('url_images') ?>page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <div class="loader"></div>
  <div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo site_url() ?>" class="logo">
      <span class="logo-mini"><b>Kine</b></span>
      <span class="logo-lg"><b>KINE</b>FORUM</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $this->config->item('url_media') ?>images/avatar/avatar04.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $this->config->item('url_media') ?>images/avatar/avatar04.png" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
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
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
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
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->config->item('url_media') ?>images/avatar/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">KINEFORUM</li>
        <!-- Optionally, you can add icons to the links -->

        <?php echo generate_menu($data_menu) ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo (isset($data_title)?$data_title:''); ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">