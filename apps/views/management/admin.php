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
            <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <h3 class="panel-title">Admin</h3>
                    </div>
                    <div class="col-md-9 col-xs-9 text-right">
                        <div style="padding: 5px">
                            <button disabled id="password-admin-btn" onclick="modalAdmin('Password')" class="btn btn-warning"><i class="ti-lock"></i> Change Password</button>
                            <button disabled id="delete-admin-btn" class="btn btn-danger"><i class="ti-trash"></i> Delete</button>
                            <button disabled  id="edit-admin-btn" class="btn btn-primary"><i class="ti-eraser"></i> Edit</button>
                            <button onclick="modalAdmin('Tambah')" id="demo-dt-delete-btn" class="btn btn-success"><i class="ti-plus"></i> New</button>
                        </div>
                    </div>
                </div>
                <hr style="margin-top: 0px;">
            </div>
            <div class="panel-body">
                <table id="table-admin" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="header-table">
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama </th>
                            <th>Created At </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        <!-- modal admin -->
        <div class="modal fade" id="modal-admin" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <form id="adminf" name="adminf" action="">
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="umur">Username <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="berat">Password <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="tinggi">Nama <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 30px;">
                            <label class="col-md-3 control-label" for="gaji">Email <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </form>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button id="btn-save-admin" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal admin -->
</div>