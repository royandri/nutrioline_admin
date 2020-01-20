<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $title;?> | <?php echo site_title();?></title>

  <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'> -->
  <link href="<?php echo asset_url();?>css/nifty.min.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/pace/pace.min.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/toastr/toastr.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/sweatalert/sweetalert2.css" rel="stylesheet">
  <script src="<?php echo asset_url();?>plugins/pace/pace.min.js"></script>
  <link href="<?php echo asset_url();?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
  
  <link href="<?php echo asset_url();?>plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo asset_url();?>plugins/summernote/summernote.min.css" rel="stylesheet">

  
  <script src="<?php echo asset_url();?>js/jquery.min.js"></script>
  <script src="<?php echo asset_url();?>js/bootstrap.min.js"></script>
  <script src="<?php echo asset_url();?>js/nifty.min.js"></script>

  <script src="<?php echo asset_url();?>plugins/datatables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo asset_url();?>plugins/datatables/media/js/dataTables.bootstrap.js"></script>
  <script src="<?php echo asset_url();?>plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo asset_url();?>plugins/toastr/toastr.min.js"></script>
  <script src="<?php echo asset_url();?>plugins/sweatalert/sweetalert2.all.js"></script>
  <script src="<?php echo asset_url();?>plugins/summernote/summernote.min.js"></script>

  
  <!-- <script src="<?php //echo asset_url();?>plugins/flot-charts/jquery.flot.min.js"></script>
  <script src="<?php //echo asset_url();?>plugins/flot-charts/jquery.flot.resize.min.js"></script>
  <script src="<?php //echo asset_url();?>plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
  <script src="<?php //echo asset_url();?>plugins/sparkline/jquery.sparkline.min.js"></script> -->

  <!-- <script src="<?php //echo asset_url();?>js/demo/dashboard.js"></script> -->

</head>

<body>
  <div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
      <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
          <a href="index.html" class="navbar-brand">
            <img src="<?php echo asset_url();?>img/logo.png" alt="Nutrioline Logo" class="brand-icon">
            <div class="brand-title">
              <span class="brand-text">Nutrioline</span>
            </div>
          </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
          <ul class="nav navbar-top-links">

            <!--Navigation toogle button-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <li class="tgl-menu-btn">
              <a class="mainnav-toggle" href="#">
                <i class="ti-menu"></i>
              </a>
            </li>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Navigation toogle button-->

            <!--Search-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <li>
              <div class="custom-search-form">
                <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                  <i class="pli-magnifi-glass"></i>
                </label>
                <form>
                  <div class="search-container collapse" id="nav-searchbox">
                    <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                  </div>
                </form>
              </div>
            </li>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End Search-->

          </ul>
          <ul class="nav navbar-top-links">
            <li>
            </li>
          </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

      </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <?php include $path_action;?>
      </div>
      <!--===================================================-->
      <!--END CONTENT CONTAINER-->


      <!--MAIN NAVIGATION-->
      <!--===================================================-->
      <nav id="mainnav-container">
        <div id="mainnav">
          <div class="mainnav-brand">
              <a href="index.html" class="brand">
                  <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                  <span class="brand-text">Nifty</span>
              </a>
              <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
          </div>
                  
          <!--Menu-->
          <!--================================-->
          <div id="mainnav-menu-wrap">
            <div class="nano">
              <div class="nano-content">
                <div id="mainnav-profile" class="mainnav-profile">
                  <div class="profile-wrap text-center">
                    <div class="pad-btm">
                      <img class="img-circle img-md" src="<?php echo asset_url();?>img/profile-photos/1.png" alt="Profile Picture">
                    </div>
                    <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                      <span class="pull-right dropdown-toggle">
                        <i class="dropdown-caret"></i>
                      </span>
                      <p class="mnp-name">Administrator</p>
                      <span class="mnp-desc">admin@mail.com</span>
                    </a>
                  </div>
                  <div id="profile-nav" class="collapse list-group bg-trans">
                    <a href="<?php echo base_url().'logout';?>" class="list-group-item">
                      <i class="pli-unlock icon-lg icon-fw"></i> Logout
                    </a>
                  </div>
                </div>

                <ul id="mainnav-menu" class="list-group">

                  <!--Category name-->
                  <li class="list-header">Navigation</li>

                  <li class="active-sub">
                    <a href="<?php echo base_url().'dashboard';?>">
                      <i class="ti-home"></i>
                      <span class="menu-title">
                        Dashboard
                      </span>
                    </a>
                  </li>

                  <!--Master-->
                  <li>
                    <a href="#">
                      <i class="ti-harddrives"></i>
                      <span class="menu-title">Master</span>
                      <i class="arrow"></i>
                    </a>
                    <ul class="collapse">
                      <li><a href="<?php echo base_url().'master/dataset';?>">Dataset</a></li>
                      <li><a href="<?php echo base_url().'master/rekomendasi';?>">Rekomendasi</a></li>
                    </ul>
                  </li>

                  <!-- Perhitungan -->
                  <li>
                    <a href="#">
                      <i class="ti-write"></i>
                      <span class="menu-title">Perhitungan</span>
                      <i class="arrow"></i>
                    </a>
                    <ul class="collapse">
                      <li><a href="<?php echo base_url().'perhitungan/prediksi';?>">Prediksi Gizi</a></li>
                      <li><a href="<?php echo base_url().'perhitungan/uji';?>">Uji Dataset</a></li>
                    </ul>
                  </li>

                  <!-- Management -->
                  <li>
                    <a href="#">
                      <i class="ti-settings"></i>
                      <span class="menu-title">Management</span>
                      <i class="arrow"></i>
                    </a>
                    <ul class="collapse">
                      <li><a href="<?php echo base_url().'management/admin';?>">Admin</a></li>
                    </ul>
                  </li>

                </ul>

              </div>
            </div>
          </div>
          <!--================================-->
          <!--End menu-->

        </div>
      </nav>
      <!--===================================================-->
      <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <footer id="footer">
      <div class="hide-fixed pull-right pad-rgt">
        Muhamad Uli Nuha | <strong>5150411025</strong>
      </div>
      <p class="pad-lft">&#0169; 2020 Nutrioline</p>
    </footer>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
      <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
  </div>
  <!--===================================================-->
  <!-- END OF CONTAINER -->



  <!--JAVASCRIPT-->
    


  <?php 
  if ($js_file !='') {
    include $js_file;
  }
  ?>



</body>

</html>