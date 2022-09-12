<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $title; ?></title>
<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 10]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="#">
<meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="#">
<!-- Favicon icon -->
<link rel="icon" href="<?php echo base_url('assets/adminty/') ?>files\assets\images\favicon.ico" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminty/') ?>files\bower_components\bootstrap\css\bootstrap.min.css">
<!-- feather Awesome -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminty/') ?>files\assets\icon\feather\css\feather.css">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminty/') ?>files\assets\css\style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminty/') ?>files\assets\css\jquery.mCustomScrollbar.css">
</head>

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="index-1.htm">
                        <img class="img-fluid" src="<?php echo base_url('assets/img/'.$perusahaan->logo) ?>" alt="Theme-Logo" width ="30px">&nbsp;<span style="font-size: 15px: "><?php echo $perusahaan->nama_perusahaan; ?></span>
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle">
                                    <a href="<?php echo base_url('index.php/obat/kedaluwarsa') ?>"><i class="feather icon-message-square"></i></a>
                                    <?php if ($totalobatkedaluwarsa > 0): ?>
                                        <span class="badge bg-c-green"><?php echo $totalobatkedaluwarsa; ?></span>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle">
                                    <a href="<?php echo base_url('index.php/obat/habis') ?>"><i class="feather icon-bell"></i></a>
                                    <?php if ($totalobathabis > 0): ?>
                                        <span class="badge bg-c-pink"><?php echo $totalobathabis; ?></span>
                                    <?php endif ?>  
                                </div>
                            </div>
                        </li>
                        <li class="user-profile header-notification">

                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <span><?php echo $users->username; ?></span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                    <li>
                                        <a href="<?php echo base_url('index.php/login/logout') ?>">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat start-->

        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <?php if ($this->ion_auth->in_group('apoteker')): ?>
                                <li class="">">
                                    <a href="<?php echo base_url() ?>">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                        <span class="pcoded-mtext">Obat</span>
                                    </a>

                                    <ul class="pcoded-submenu">
                                       <li class=" ">
                                        <a href="<?php echo base_url('index.php/obat/tambah/') ?>">
                                            <span class="pcoded-mtext">Tambah Obat</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?php echo base_url('index.php/obat') ?>">
                                            <span class="pcoded-mtext">Lihat Obat</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?php echo base_url('index.php/obat/habis') ?>">
                                            <span class="pcoded-mtext">Obat Habis</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="<?php echo base_url('index.php/obat/kedaluwarsa') ?>">
                                            <span class="pcoded-mtext">Obat Kedaluwarsa</span>
                                        </a>
                                    </li> 
                                </ul>
                            </li>

                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                                    <span class="pcoded-mtext">Kategori & Unit</span>
                                </a>

                                <ul class="pcoded-submenu">
                                   <li class=" ">
                                       <a href="<?php echo base_url('index.php/kategori/tambah/') ?>">
                                        <span class="pcoded-mtext">Tambah Kategori</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="<?php echo base_url('index.php/kategori') ?>">
                                        <span class="pcoded-mtext">Lihat Kategori</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="<?php echo base_url('index.php/unit/tambah/') ?>">
                                        <span class="pcoded-mtext">Tambah Unit</span>
                                    </a>
                                </li>
                                <li class=" ">
                                  <a href="<?php echo base_url('index.php/unit') ?>">
                                    <span class="pcoded-mtext">Lihat Unit</span>
                                </a>
                            </li>  
                        </ul>
                    </li>

                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                            <span class="pcoded-mtext">Supplier</span>
                        </a>
                        <ul class="pcoded-submenu">
                           <li class=" ">
                               <a href="<?php echo base_url('index.php/pemasok/tambah/') ?>">
                                <span class="pcoded-mtext">Tambah Supplier</span>
                            </a>
                        </li>
                        <li class=" ">
                           <a href="<?php echo base_url('index.php/pemasok') ?>">
                            <span class="pcoded-mtext">Lihat Supplier</span>
                        </a>
                    </li>  
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)"><i class="ion-ios-cart"></i>
                    <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                    <span class="pcoded-mtext">Penjualan</span>
                </a>
                <ul class="pcoded-submenu">
                   <li class=" ">
                    <a href="<?php echo base_url('index.php/penjualan/proses_tambah/') ?>">
                        <span class="pcoded-mtext">Tambah Penjualan</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="<?php echo base_url('index.php/penjualan') ?>">
                        <span class="pcoded-mtext">Lihat Penjualan</span>
                    </a>
                </li>  
            </ul>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                <span class="pcoded-mtext">Pembelian</span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="<?php echo base_url('index.php/pembelian/proses_tambah/') ?>">
                    <span class="pcoded-mtext">Tambah Pembelian</span>
                </a>
            </li>
            <li class=" ">
               <a href="<?php echo base_url('index.php/pembelian') ?>">
                <span class="pcoded-mtext">Lihat Pembelian</span>
            </a>
        </li> 
        
    </ul>
</li>
<li class="">
   <a href="<?php echo base_url('index.php/laporan') ?>">
    <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
    <span class="pcoded-mtext">Laporan</span>
</a>
</li>
<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
    <span class="pcoded-mtext">User</span>
</a>
<ul class="pcoded-submenu">
   <li class=" ">
      <a href="<?php echo base_url('index.php/users/create/') ?>">
        <span class="pcoded-mtext">Tambah User</span>
    </a>
</li>
<li class=" ">
   <a href="<?php echo base_url('index.php/users') ?>">
    <span class="pcoded-mtext">Lihat User</span>
</a>
</li>
</li>
</ul>
<li class="">
<a href="<?php echo base_url('index.php/setting') ?>">
    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
    <span class="pcoded-mtext">Setting</span>
</a>
</li>
<?php endif ?>
<?php if ($this->ion_auth->in_group('karyawan')): ?>
<li class="">">
<a href="<?php echo base_url() ?>">
    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
    <span class="pcoded-mtext">Dashboard</span>
</a>
</li>
<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
        <span class="pcoded-mtext">Obat</span>
    </a>

    <ul class="pcoded-submenu">
       <li class=" ">
         <a href="<?php echo base_url('index.php/obat/tambah/') ?>">
            <span class="pcoded-mtext">Tambah Obat</span>
        </a>
    </li>
    <li class=" ">
       <a href="<?php echo base_url('index.php/obat') ?>">
        <span class="pcoded-mtext">Lihat Obat</span>
    </a>
</li>
<li class=" ">
    <a href="menu-bottom.htm">
        <span class="pcoded-mtext">Obat Habis</span>
    </a>
</li>
<li class=" ">
    <a href="menu-bottom.htm">
        <span class="pcoded-mtext">Obat Kedaluwarsa</span>
    </a>
</li>  
</ul>
</li>

<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
    <span class="pcoded-micon"><i class="feather icon-book"></i></span>
    <span class="pcoded-mtext">Kategori & Unit</span>
</a>

<ul class="pcoded-submenu">
   <li class=" ">
    <a href="<?php echo base_url('index.php/kategori/tambah/') ?>">
        <span class="pcoded-mtext">Tambah Kategori</span>
    </a>
</li>
<li class=" ">
   <a href="<?php echo base_url('index.php/kategori') ?>">
    <span class="pcoded-mtext">Lihat Kategori</span>
</a>
</li>
<li class=" ">
<a href="<?php echo base_url('index.php/unit/tambah/') ?>">
    <span class="pcoded-mtext">Tambah Unit</span>
</a>
</li>
<li class=" ">
<a href="<?php echo base_url('index.php/unit') ?>">
<span class="pcoded-mtext">Lihat Unit</span>
</a>
</li>  
</ul>
</li>

<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
    <span class="pcoded-mtext">Supplier</span>
</a>
<ul class="pcoded-submenu">
   <li class=" ">
    <a href="<?php echo base_url('index.php/pemasok/tambah/') ?>">
        <span class="pcoded-mtext">Tambah Supplier</span>
    </a>
</li>
<li class=" ">
  <a href="<?php echo base_url('index.php/pemasok') ?>">
    <span class="pcoded-mtext">Lihat Supplier</span>
</a>
</li>  
</ul>
</li>
<li class="pcoded-hasmenu">
<a href="javascript:void(0)"><i class="ion-ios-cart"></i>
    <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
    <span class="pcoded-mtext">Penjualan</span>
</a>
<ul class="pcoded-submenu">
   <li class=" ">
     <a href="<?php echo base_url('index.php/penjualan/proses_tambah/') ?>">
        <span class="pcoded-mtext">Tambah Penjualan</span>
    </a>
</li>
<li class=" ">
    <a href="<?php echo base_url('index.php/penjualan') ?>">
        <span class="pcoded-mtext">Lihat Penjualan</span>
    </a>
</li>  
</ul>
</li>
<li class="pcoded-hasmenu">
<a href="javascript:void(0)">
    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
    <span class="pcoded-mtext">Pembelian</span>
</a>
<ul class="pcoded-submenu">
   <li class=" ">
      <a href="<?php echo base_url('index.php/pembelian/proses_tambah/') ?>">
        <span class="pcoded-mtext">Tambah Pembelian</span>
    </a>
</li>
<li class=" ">
    <a href="<?php echo base_url('index.php/pembelian') ?>">
        <span class="pcoded-mtext">Lihat Pembelian</span>
    </a>
</li> 

</ul>
</li>
<?php endif ?>
</ul>
</div>
</nav>
<div class="pcoded-content">
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper"></div>
        <?php if ($this->session->flashdata('message') == TRUE): ?>
            <div class="alert alert-info text-left"><?php echo $this->session->flashdata('message'); ?></div>
        <?php endif ?>
        <?php $this->load->view($page) ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script data-cfasync="false" src="cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\modernizr\js\modernizr.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\bower_components\chart.js\js\Chart.js"></script>
<!-- amchart js -->
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\pages\widget\amchart\amcharts.js"></script>
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\pages\widget\amchart\serial.js"></script>
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\pages\widget\amchart\light.js"></script>
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\assets\js\SmoothScroll.js"></script>
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\js\pcoded.min.js"></script>
<!-- custom js -->
<script src="<?php echo base_url('assets/adminty/') ?>files\assets\js\vartical-layout.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\assets\pages\dashboard\custom-dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminty/') ?>files\assets\js\script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-23581568-13');
</script>
</body>

</html>


<!-- <!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
</head>
<body>
<p><b><center>Selamat Datang di Dashboard Apotek Qaureen Farma</center></b></p><br/>
<a href="<?php echo base_url('index.php/login/logout') ?>"><center>Logout</center></a>
</body>
</html> -->