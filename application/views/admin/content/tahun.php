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
                         <a href="<?php echo site_url();?>admin/tahun/tambah" class="btn bg-red waves-effect"> <i class="material-icons">add</i><span>Tambah Data</span></a> <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               <!--     <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                     <?php
                                    $no=1;
       								$query = $this->db->query("SELECT * FROM tahun  ORDER BY tahun_id DESC");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->tahun_nama ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='<?php echo site_url();?>admin/tahun/edit/<?php echo $row->tahun_id ?>'">
                                    				<i class="material-icons">edit</i>
                                				</button>
                                				<a href="<?php echo site_url();?>admin/tahun/hapus/<?php echo $row->tahun_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"> <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
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
                    <li><a href="<?php echo base_url(); ?>admin/tahun"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/tahun/tambah" method="POST">
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="tahun_nama">Tahun</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tahun_nama" placeholder="Masukan Tahun" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/tahun'"/>
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
                    <li><a href="<?php echo base_url(); ?>admin/tahun"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/tahun/edit" method="POST">
                            <input type="hidden" name="tahun_id" value="<?php echo $tahun_id;?>" />
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="tahun_nama">Tahun</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tahun_nama" placeholder="Masukan Tahun"  value="<?php echo $tahun_nama;?>"  required>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/tahun'"/>
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
