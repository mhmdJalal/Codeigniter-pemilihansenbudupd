 <!-- Main wrapper  -->
 <div id="main-wrapper">
     <!-- header header  -->
     <div class="header">
         <nav class="navbar top-navbar navbar-expand-md navbar-light">
             <!-- Logo -->
             <div class="navbar-header">
                 <a class="navbar-brand" href="<?= base_url('Dashboard') ?>">
                   <!-- Logo icon -->
                   <b>
                     <img src="<?= base_url('assets/images/wikrama.png') ?>" alt="homepage" class="dark-logo" width="40px" height="40px" />
                   </b>
                   <!--End Logo icon -->
                   <span class="dark-logo"><b>SMK WIKRAMA</b></span>
                 </a>
             </div>
             <!-- End Logo -->
             <div class="navbar-collapse">
                 <!-- toggle and nav items -->
                 <ul class="navbar-nav mr-auto mt-md-0">
                     <!-- This is  -->
                     <li class="nav-item m-l-10">
                       <a class="nav-link sidebartoggler hidden-sm-down text-muted" href="javascript:void(0)">
                         <i class="ti-menu"></i>
                       </a>
                     </li>
                 </ul>

                 <!-- User profile-->
                 <ul class="navbar-nav my-lg-0">
                   <li class="nav-item m-l-10 m-t-20">
                       <h5 class="text-muted"><?= $this->session->userdata('name'); ?></h5>
                   </li>
                     <!-- Profile -->
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-muted " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="<?= base_url('assets/images/bookingSystem/3.png') ?>" alt="user" class="profile-pic" />
                         </a>
                         <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                             <ul class="dropdown-user">
                               <li><a href="<?= base_url('Auth/logout/admin') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </div>
         </nav>
     </div>
     <!-- End header header -->
     <!-- Left Sidebar  -->
     <div class="left-sidebar m-t-12">
         <!-- Sidebar scroll-->
         <div class="scroll-sidebar">
             <!-- Sidebar navigation-->
             <nav class="sidebar-nav">
                 <ul id="sidebarnav">
                    <li>
                     <a href="<?= base_url('Dashboard') ?>">
                       <i class="icon-home"></i>
                       <span class="hide-menu">Dashboard</span>
                     </a>
                   </li>
                     <li>
                       <a href="<?= base_url('Dashboard/dataPeserta') ?>">
                         <i class="icon-people"></i>
                         <span class="hide-menu">Data Peserta</span>
                       </a>
                     </li>
                     <li>
                       <a href="<?= base_url('Dashboard/dataUpd') ?>">
                         <i class="icon-tag"></i>
                         <span class="hide-menu">Data UPD</span>
                       </a>
                     </li>
                     <li>
                       <a href="<?= base_url('Dashboard/dataSenbud') ?>">
                         <i class="icon-drawar"></i>
                         <span class="hide-menu">Data SENBUD</span>
                       </a>
                     </li>
                     <li>
                       <a href="<?= base_url('Dashboard/hasilPemilihan') ?>">
                         <i class="icon-printer"></i>
                         <span class="hide-menu">Hasil Pemilihan</span>
                       </a>
                     </li>
                 </ul>
             </nav>
             <!-- End Sidebar navigation -->
         </div>
         <!-- End Sidebar scroll-->
     </div>
     <!-- End Left Sidebar  -->

     <div class="page-wrapper">
