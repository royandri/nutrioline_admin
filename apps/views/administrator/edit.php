<div class="row">
	<div class="col-xs-1">
	</div>
	<div class="col-xs-10">
		<div class="row">
			<div class="box box-warning">
				<div class="box-header">
				</div>
				<div class="box-body" id="masking_loading">
					<form id="form_admin"  name="form_admin" enctype="multipart/form-data" method="post" >
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="user" id="user" placeholder="Cth. Joe" value="">
								<input type="hidden" name="id" id="id" value="<?php echo $id?>">
							</div>
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<label>Passowrd</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="pass" id="pass" placeholder="Cth. Joe" value="">
							</div>
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="nama" id="nama" placeholder="Cth. Allen" value="">
							</div>
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<label>Email</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="email" id="email" placeholder="Cth. JoeAllen@gmail.com" value="">
							</div>
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<label>No HP</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="nohp" id="nohp" placeholder="Cth. 012345778" value="">
							</div>
						</div>
						<!-- /.form group -->
						<!-- phone mask -->
						<div class="form-group hidden">
							<label>Foto</label>
							<?php if(!empty($id)){?>
							<br/>
							<img src="<?php echo $foto_admin;?>" class="img-circle" width="120" height="120" alt="User Image">
							<br/>
							<?php echo "<label>Ganti Foto</label>";}?>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-image"></i>
								</div>
								<input type="file" class="form-control" name="foto_user" id="foto_user" placeholder="Pilih Foto">
							</div>
						</div>
						<div class="form-group">
							<label>Cabang</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<select class="form-control" name="id_cabang" id="cabang"> </select>
							</div>
						</div>
						<div class="form-group">
							<label>Kategori User</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<select class="form-control" name="id_user_kategori" id="id_user_kategori"> </select>
							</div>
						</div>
						<!-- /.form group -->
						<br/>
						<div id="loading" style="text-align: center"></div>
						<div align="center">
							<button id="simpandata" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Simpan</button>
							<a href="<?php echo base_url().$controller;?>" class="btn btn-warning btn-lg">
							<i class="fa fa-arrow-circle-left"></i> Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>