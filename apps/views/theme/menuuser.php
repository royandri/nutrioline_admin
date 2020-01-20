    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo $domainclient;?>" class="navbar-brand"><b>ArmyPark</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <?php if($_SESSION['level']=='USER'){?>
          <ul class="nav navbar-nav">
		 
            <li class="<?php if(empty($controller) || $controller=="user"){ echo "active";} ?>"><a href="<?php echo base_url();?>user">Home <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($controller=="buyticket" ||$controller=="choseticket" || $controller=="revieworder"){ echo "active";} ?>"><a href="<?php echo base_url();?>choseticket">Buy Ticket</a></li>
            <li class="<?php if($controller=="myticket"){ echo "active";} ?>"><a href="<?php echo base_url();?>myticket">My Ticket</a></li>
            <li class="<?php if($controller=="myinvoices"){ echo "active";} ?>"><a href="<?php echo base_url();?>myinvoices">My Invoices</a></li>
          </ul>
          <?php } ?>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        <?php if($_SESSION['level']=='USER'){?>
          <ul class="nav navbar-nav">          
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>public/images/user/<?php echo $_SESSION['image'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Ridlo Fadlli</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>public/images/user/<?php echo $_SESSION['image'];?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['nama'];?> - 
                 <?php echo $_SESSION['email'];?>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
          <?php } ?>
        </div>
      </div>
    </nav>