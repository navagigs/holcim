 <?php if ($action == 'view' || empty($action)){ ?>
  <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $breadcrumb; ?>
                </h2>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard"> <i class="material-icons">home</i> DASHBOARD</a> </li>
                    <li class="active"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <?php echo $breadcrumb; ?>
                            </h2>
                           <!--  <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                             <!-- ========== Flashdata ========== -->
                      <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert bg-pink alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                      <?php } ?>
                  <!-- ========== End Flashdata ========== -->
                         <a href="<?php echo site_url();?>admin/adm/tambah" class="btn bg-red waves-effect"> <i class="material-icons">add</i><span>Tambah Data</span></a> <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               <!--     <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                     <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM admin  ORDER BY admin_id DESC");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->admin_nama; ?></td>
                                            <td><?php echo $row->admin_username; ?></td>
                                            <td><?php echo $row->admin_email; ?></td>
                                            <td><?php if($row->admin_level == '1') { echo "Admin"; } else{ echo "Operator";} ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='<?php echo site_url();?>admin/adm/edit/<?php echo $row->admin_username; ?>'">
                                    				<i class="material-icons">edit</i>
                                				</button>
                                				<a href="<?php echo site_url();?>admin/adm/hapus/<?php echo $row->admin_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"> <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                    				<i class="material-icons">delete</i>
                                				</button></a>
                                			</td>
                                        </tr>
                                    <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>    <!-- End Page Content -->

<?php } elseif ($action == 'tambah') { ?>
<section class="content">
        <div class="container-fluid">
           <div class="block-header">
                <h2>
                    <?php echo $breadcrumb; ?>
                </h2>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard"> <i class="material-icons">home</i> DASHBOARD</a> </li>
                    <li><a href="<?php echo base_url(); ?>admin/adm"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
                    <li class="active"> TAMBAH </li>
                </ol>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH <?php echo $breadcrumb; ?></h2>
                           <!--  <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <form id="form_validation" action="<?php echo site_url();?>admin/adm/tambah" method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <label for="admin_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_nama" placeholder="Masukan Nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="admin_username">Username</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_username" placeholder="Masukan Username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="admin_email">E-mail</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="admin_email"  placeholder="Masukan E-mail"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="admin_password">Password</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="admin_password"  placeholder="Masukan Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="admin_level">Level</label>
                                <div class="form-group form-float">
                                        <div class="demo-radio-button">
                                            <input name="admin_level" type="radio" id="radio_1" value="1" checked />
                                            <label for="radio_1">Admin</label>
                                            <input name="admin_level" type="radio" id="radio_2" value="2" />
                                            <label for="radio_2">Operator</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/adm'"/>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>
<?php } elseif ($action == 'edit') { ?>

<section class="content">
        <div class="container-fluid">
           <div class="block-header">
                <h2>
                    <?php echo $breadcrumb; ?>
                </h2>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard"> <i class="material-icons">home</i> DASHBOARD</a> </li>
                    <li><a href="<?php echo base_url(); ?>admin/adm"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
                    <li class="active"> EDIT </li>
                </ol>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT <?php echo $breadcrumb; ?></h2>
                           <!--  <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <form id="form_validation" action="<?php echo site_url();?>admin/adm/edit" method="POST">
                            <input type="hidden" name="admin_me" value="<?php echo $admin_me;?>" />
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <label for="admin_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_nama" value="<?php echo $admin_nama;?>" placeholder="Masukan Nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="admin_username">Username</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_username" value="<?php echo $admin_username;?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="admin_email">E-mail</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="admin_email" value="<?php echo $admin_email;?>" placeholder="Masukan E-mail"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="admin_password">Password</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="admin_password"  placeholder="Masukan Password" >
                                    </div>*Kosongkan bila tidak diubah.
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="admin_level">Level</label>
                                <div class="form-group form-float">
                                        <div class="demo-radio-button">
                                            <input name="admin_level" type="radio" id="radio_1" value="1" <?php echo $admin = ($admin_level=='1')?'checked':'';?> />
                                            <label for="radio_1">Admin</label>
                                            <input name="admin_level" type="radio" id="radio_2" value="2"  <?php echo $op = ($admin_level=='2')?'checked':'';?>/>
                                            <label for="radio_2">Operator</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/adm'"/>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>
<?php } ?>
