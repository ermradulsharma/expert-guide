<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mahakaal Matka</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>icon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <style type="text/css">
        nav .navbar-nav li > a {
            color: #fff;
        }
        nav.navbar {
            background-color: rgba(123, 31, 162, 0.79);
        }
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: rgba(123, 31, 162, 0.79);
            border-color: rgba(123, 31, 162, 0.79);
            border-color: #0288d0;
            color: #fff;
        }
        .navbar-nav>.open>a, .nav>li>a:focus, .nav>li>a:hover {
            background-color: transparent;
            color: #fff;
        }
        
        .left-sidebar {
            background-color: rgb(41, 64, 98);
        }
        .sidebar-nav ul > li a {
            color: #fff;
        }
        .sidebar-nav ul > li.menu-header {
            color: #fff;
        }

        .sidebar-nav>ul>li.active>a {
            background-color: rgba(255, 255, 255, 0.09);
        }
        .sidebar-nav ul li.active a i, .sidebar-nav ul li a:hover i {
            color: #fff;
        }
    </style>
</head>
<?php $settingsvalue = $this->Admin_model->getSettingsValue(); ?>
<?php if(!empty($this->session->userdata('user_login_id'))){
    $userid = $this->session->userdata('user_login_id');
    $profilevalue = $this->Admin_model->GetProfileValue($userid);
    $query_user = $this->Admin_model->notifications_user($userid);     
}
?>
<body>
    <div class="wrapper-main">
        <header class="topbar clearfix">
            <nav class="navbar navbar-fixed-top bg-white">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-options-vertical"></span>
                        </button>
                        <button id="sidebar-toggle" type="button" class="navbar-toggle toggle-sidebar-bars" data-target="#sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-menu"></span>
                        </button>
                        <h4 style="color:white;font-size:25px;margin-top: 10px;"> Mahakaal Matka</h4>
                    </div>
                    <?php /*echo $this->session->flashdata('feedback');*/ ?>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="hidden-xs">
                                <a href="#" class="sidebar-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="user-img pull-left">
                                        <img alt="Dotdev" src="<?php echo base_url(); ?>assets/img/user/<?php echo $profilevalue->image; ?>">
                                    </span><?php echo $profilevalue->full_name; ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu topbar-dropdown-wrapper" role="menu">
                                    <ul class="dropdown-user-inner">
                                        <li>
                                            <div class="dd-userbox">
                                                <div class="dd-img">
                                                    <img alt="product management" src="<?php echo base_url(); ?>assets/img/user/<?php echo $profilevalue->image; ?>">
                                                </div>
                                                <div class="dd-info">
                                                    <h4>
                                                        <?php echo $profilevalue->full_name; ?>
                                                    </h4>
                                                    <p>
                                                        <?php echo $profilevalue->email; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li> 
                                        <li data-id="users" class="main"><a href="<?php echo base_url();?>admin/View_profile?U=<?php echo base64_encode($this->session->userdata('user_login_id')); ?>"><i class="icon-user mr10"></i> Profile</a></li>
                                        <li><a id="resetmodal" href=""><i class="icon-key mr10"></i> Change Password</a></li>
                                        <li class="divider"></li>
                                        <li data-id="dashboard" class="main"><a href="<?php echo base_url();?>login/logout"><i class="icon-logout mr10"></i> Sign Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
      
        </header>
        <aside class="left-sidebar">
            <div class="slimscroll-left-sidebar">
                <nav class="sidebar-nav">
                    <ul>
                        <li data-id="dashboard" id="dashboard" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false">
                                <i class="icon-grid"></i>
                                <span class="">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('user_type') == 'Admin'){ ?>
                                            <li data-id="configuration" class="main">
                                                <a href="<?php echo base_url()?>admin/Site_Settings" aria-expanded="false">
                                            <i class="icon-settings mr10"></i>  <span class="">
                                            Configuration
                                </span> </a>
                                        </li>
                                            
                                        <?php } ?>
                        <li data-id="u_History" id="u_History" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="icon-user"></i>
                                <span class="">
                                History
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/activeusers">Active Users</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/winners">Winners</a></li>
                            </ul>
                        </li>
                        <li data-id="P_games" id="P_games" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="icon-user"></i>
                                <span class="">
                               Play Games
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/single">Single</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/panna">Panna</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/Jodi">Jodi</a></li>
                            </ul>
                        </li>
                        <li data-id="users" id="users" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Users
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/List_user_updated">List User</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/Add_User">Add User</a></li>
                            </ul>
                        </li>
                        <li data-id="staffy" id="staffy" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Staffs
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/staffs">List Staff</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/add_staff">Add Staff</a></li>
                            </ul>
                        </li>
                        <li data-id="descriptionss" id="descriptionss" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="icon-user"></i>
                                <span class="">
                               Header Description
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/m_description">Mini Description </a></li>
                                <li><a href="<?php echo base_url(); ?>admin/b_description">Big Description</a></li>
                            </ul>
                        </li>
                        <li data-id="Live" id="Live" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/live_update" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Hindi Ads
                                </span>
                            </a>
                        </li>
                        
                                <li data-id="Live" id="Live" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/wallet" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Wallet
                                </span>
                            </a>
                        </li>
                        
                         <li data-id="Live" id="Live" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/commission" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Commission
                                </span>
                            </a>
                        </li>
                        
                        
                                   <li data-id="Live" id="Live" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/yantri" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Jantri
                                </span>
                            </a>
                        </li>
                        
                             <li data-id="Live" id="Live" class="main">
                            <a class="" href="<?php echo base_url('admin/caluclation'); ?>" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Caluclation
                                </span>
                            </a>
                        </li>
                        
                        <li data-id="achuk" id="achuk" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                     Kalyan Achuk 
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                 
                                <li><a href="<?php echo base_url(); ?>admin/whatsapp_img">Whatsapp Image</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/kalyan_achuk"> Kalyan Achuk</a></li>
                            </ul>
                        </li>
                        <li data-id="market" id="market" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/markets" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Markets
                                </span>
                            </a>
                        </li>

                        <li data-id="marketsassign" id="marketsassign" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/marketassign" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Markets Assign
                                </span>
                            </a>
                        </li>

                       <!--  <li data-id="liveupdate" id="liveupdate" class="main">
                            <a class="" href="<//?php echo base_url(); ?>admin/liveupdate" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Live Updates
                                </span>
                            </a>
                        </li>
 -->
                        <li data-id="resultt" id="resultt" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/results" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Results
                                </span>
                            </a>
                        </li>
                        <li data-id="passy" id="passy" class="main">
                            <a class="" href="<?php echo base_url(); ?>admin/pass" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Guessing Pass
                                </span>
                            </a>
                        </li>
                      
                        <li data-id="cmss" id="cmss" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    CMS
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/faq">FAQ</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/about">About</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/popularity">Popularity</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/wiki">Wiki Pedia</a></li>
                            </ul>
                        </li>
                        <li data-id="chart" id="chart" class="main">
                            <a class="has-arrow" href="<?php echo base_url(); ?>admin/charts" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Time Table  
                                </span>
                            </a>
                        </li>
                        <li data-id="freetips" id="freetips" class="main">
                            <a class="has-arrow" href="<?php echo base_url(); ?>admin/freetip" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Free-Tip 
                                </span>
                            </a>
                        </li>
                        <li data-id="subscriptionS" id="subscriptionS" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Subscription
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>admin/packege_name">Package Name</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/subcriptions">Subcriptions List</a></li>
                            </ul>
                        </li>
                        <li data-id="notificationy" id="notificationy" class="main">
                            <a class="has-arrow" href="notifications" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Notifications
                                </span>
                            </a>
                        </li>
                        <li data-id="desclaimery" id="Desclaimer" class="main">
                            <a class="has-arrow" href="desclaimers" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                   Desclaimers
                                </span>
                            </a>
                        </li>
                      </ul>                
                </nav>
            </div>
        </aside>        	