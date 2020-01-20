<div>
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Management Admin</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="ti-home"></i></a></li>
            <li><a href="#"><?php echo ucfirst($controller);?></a></li>
            <?php if(ucfirst($controller) != $title) { ?>
            <li class="active"><?php echo $title;?></li>
            <?php } ?>
        </ol>
    </div>

    <div id="page-content">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Inline Form</h3>
            </div>
            <div class="panel-body">
                Isi Data
            </div>
        </div>
    </div>
</div>