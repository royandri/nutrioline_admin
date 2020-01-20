 <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

         <li class="<?php if($controller=='dashboard'){ echo 'active';}?>">
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <?php if ($_SESSION['level']=='admin'): ?>
            <li class="<?php if($controller=='pengaturan'){ echo 'active';}?>">
              <a href="<?php echo base_url().'pengaturan';?>">
                <i class="fa fa-wrench"></i> <span> Pengaturan</span>
              </a>
            </li>
            <li class="<?php if($controller=='administrator'){ echo 'active';}?>">
              <a href="<?php echo base_url().'administrator';?>">
                <i class="fa fa-user-plus"></i> <span>Admin</span>
              </a>
            </li>
            <li class="<?php if($controller=='tenan'){ echo 'active';}?>">
              <a href="<?php echo base_url().'tenan';?>">
                <i class="fa fa-user"></i> <span>Exhibitors</span>
              </a>
            </li>
            <li class="<?php if($controller=='infoTenan'){ echo 'active';}?>">
              <a href="<?php echo base_url().'infoTenan';?>">
                <i class="fa fa-info-circle"></i> <span>Program Promo</span>
              </a>
            </li>
            <li class="<?php if($controller=='booth'){ echo 'active';}?>">
              <a href="<?php echo base_url().'booth';?>">
                <i class="fa fa-cube"></i> <span>Booth</span>
              </a>
            </li>
            <li class="<?php if($controller=='hargaBooth'){ echo 'active';}?>">
              <a href="<?php echo base_url().'hargaBooth';?>">
                <i class="fa fa-money"></i> <span>Harga Booth</span>
              </a>
            </li>
            <li class="<?php if($controller=='kategoriBooth'){ echo 'active';}?>">
              <a href="<?php echo base_url().'kategoriBooth';?>">
                <i class="fa fa-cube"></i> <span>Kategori Booth</span>
              </a>
            </li>
            <li class="<?php if($controller=='booking'){ echo 'active';}?>">
              <a href="<?php echo base_url().'booking';?>">
                <i class="fa fa-money"></i> <span>Booking Booth</span>
              </a>
            </li>
            <li class="<?php if($controller=='kategori'){ echo 'active';}?>">
              <a href="<?php echo base_url().'kategori';?>">
                <i class="fa fa-cubes"></i> <span>Kategori</span>
              </a>
            </li>
            <li class="<?php if($controller=='bank'){ echo 'active';}?>">
              <a href="<?php echo base_url().'bank';?>">
                <i class="fa fa-university"></i> <span>Bank</span>
              </a>
            </li>
            <li class="<?php if($controller=='konfirmasiPembayaran'){ echo 'active';}?>">
              <a href="<?php echo base_url().'konfirmasiPembayaran';?>">
                <i class="fa fa-university"></i> <span>Konfirmasi Pembayaran</span>
              </a>
            </li>
            <li class="<?php if($controller=='konfirmasiPembayaranTunai'){ echo 'active';}?>">
              <a href="<?php echo base_url().'konfirmasiPembayaranTunai';?>">
                <i class="fa fa-university"></i> <span>Konfirmasi Pembayaran Tunai</span>
              </a>
            </li>
        <?php elseif ($_SESSION['level']=='informasi'): ?>
            <li class="<?php if($controller=='claimvoucher'){ echo 'active';}?>">
              <a href="<?php echo base_url().'claimvoucher';?>">
                <i class="fa fa-money"></i> <span>Claim Voucher</span>
              </a>
            </li>
            <li class="<?php if($controller=='reportvoucher'){ echo 'active';}?>">
              <a href="<?php echo base_url().'reportvoucher';?>">
                <i class="fa fa-money"></i> <span>Report Voucher</span>
              </a>
            </li>
        <?php elseif ($_SESSION['level']=='penjaga'): ?>   
            <li class="<?php if($controller=='claimjajanan'){ echo 'active';}?>">
              <a href="<?php echo base_url().'claimjajanan';?>">
                <i class="fa fa-cutlery"></i> <span>Claim Jajanan</span>
              </a>
            </li>
            <li class="<?php if($controller=='reportjajanan'){ echo 'active';}?>">
              <a href="<?php echo base_url().'reportjajanan';?>">
                <i class="fa fa-cutlery"></i> <span>Report Jajanan</span>
              </a>
            </li>
        <?php else: ?>
          <?php destroy_sesi(); ?>
        <?php endif ?>

        <li class="<?php if($controller=='logout'){ echo 'active';}?>">
          <a href="<?php echo base_url().'logout';?>">
            <i class="fa fa-user-plus"></i> <span>Logout</span>
          </a>
        </li>

       

      </ul>


