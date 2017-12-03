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
                         <a href="<?php echo site_url();?>admin/karyawan/tambah" class="btn bg-red waves-effect"> <i class="material-icons">add</i><span>Tambah Data</span></a> <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No.Telepon</th>
                                            <th>Departemen</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               <!--     <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No.Telepon</th>
                                            <th>Departemen</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                     <?php
                                    $no=1;
       								$query = $this->db->query("SELECT 
                                    karyawan.karyawan_nip AS karyawan_nip,
                                    karyawan.karyawan_nama AS karyawan_nama,
                                    karyawan.karyawan_email AS karyawan_email,
                                    karyawan.karyawan_tlp AS karyawan_tlp,
                                    departemen.departemen_id AS departemen_id,
                                    departemen.departemen_nama AS departemen_nama
                                     FROM karyawan
                                     LEFT JOIN departemen ON departemen.departemen_id = karyawan.departemen_id  ORDER BY karyawan_nip DESC");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->karyawan_nip; ?></td>
                                            <td><?php echo $row->karyawan_nama ?></td>
                                            <td><?php echo $row->karyawan_email; ?></td>
                                            <td><?php echo $row->karyawan_tlp; ?></td>
                                            <td><?php echo $row->departemen_nama; ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='<?php echo site_url();?>admin/karyawan/edit/<?php echo $row->karyawan_nip ?>'">
                                    				<i class="material-icons">edit</i>
                                				</button>
                                				<a href="<?php echo site_url();?>admin/karyawan/hapus/<?php echo $row->karyawan_nip; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"> <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
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
                    <li><a href="<?php echo base_url(); ?>admin/karyawan"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/karyawan/tambah" method="POST">
                            <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="karyawan_nip">NIK</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_nip" placeholder="Masukan NIK" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_nama" placeholder="Masukan Nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_email">E-mail</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="karyawan_email"  placeholder="Masukan E-mail"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_tlp">No.Telepon</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_tlp"  placeholder="Masukan No.Telepon" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="departemen_id">Departemen</label>
                                       <?php $this->ADM->combo_box2("SELECT * FROM departemen", 'departemen_id', 'departemen_id', 'departemen_nama', $departemen_id);?>
                               
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/karyawan'"/>
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
                    <li><a href="<?php echo base_url(); ?>admin/karyawan"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
                    <li class="active"> EDIT </li>
                </ol>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT <?php echo $breadcrumb; ?></h2>
                            <!-- <ul class="header-dropdown m-r--5">
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/karyawan/edit" method="POST">
                            <input type="hidden" name="karyawan_nip" value="<?php echo $karyawan_nip;?>" />
                            <div class="row clearfix">
                              <div class="col-sm-6">
                                <label for="karyawan_nip">NIP</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_nip"  value="<?php echo $karyawan_nip;?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_nama" placeholder="Masukan Nama"  value="<?php echo $karyawan_nama;?>"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_email">E-mail</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="karyawan_email"  value="<?php echo $karyawan_email;?>"  placeholder="Masukan E-mail"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="karyawan_tlp">No.Telepon</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="karyawan_tlp"  value="<?php echo $karyawan_tlp;?>"  placeholder="Masukan No.Telepon" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="departemen_id">Departemen</label>
                                       <?php $this->ADM->combo_box2("SELECT * FROM departemen", 'departemen_id', 'departemen_id', 'departemen_nama', $departemen_id);?>
                               
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/karyawan'"/>
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
