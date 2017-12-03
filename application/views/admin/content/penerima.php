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
                         <a href="<?php echo site_url();?>admin/penerima/tambah" class="btn bg-red waves-effect"> <i class="material-icons">add</i><span>Tambah Data</span></a> <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Sub Area</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                               <!--     <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Sub Area</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                     <?php
                                    $no=1;
       								$query = $this->db->query("SELECT 
                                    penerima_sertifikasi.penerima_id AS penerima_id,
                                    penerima_sertifikasi.penerima_nama AS penerima_nama,
                                    penerima_sertifikasi.penerima_tgl AS penerima_tgl,
                                    penerima_sertifikasi.penerima_keterangan AS penerima_keterangan,
                                    subarea.subarea_id AS subarea_id,
                                    subarea.subarea_nama AS subarea_nama
                                     FROM penerima_sertifikasi
                                     LEFT JOIN subarea ON subarea.subarea_id = penerima_sertifikasi.subarea_id  ORDER BY penerima_id DESC");
       								foreach ($query->result() as $row){ 
       								?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->penerima_nama ?></td>
                                            <td><?php echo dateIndo($row->penerima_tgl); ?></td>
                                            <td><?php echo $row->subarea_nama; ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='<?php echo site_url();?>admin/penerima/edit/<?php echo $row->penerima_id ?>'">
                                    				<i class="material-icons">edit</i>
                                				</button>
                                				<a href="<?php echo site_url();?>admin/penerima/hapus/<?php echo $row->penerima_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')"> <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
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
                    <li><a href="<?php echo base_url(); ?>admin/penerima"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/penerima/tambah" method="POST">
                            <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="penerima_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="penerima_nama" placeholder="Masukan Nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="penerima_tgl">Tanggal</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sertifikasi_tgl" class="datepicker form-control" class="form-control" name="penerima_tgl"  placeholder="Masukan Tanggal"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="penerima_keterangan">Keterangan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="penerima_keterangan" placeholder="Masukan Keterangan"></textarea> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="subarea_id">Sub Area</label>
                                       <?php $this->ADM->combo_box2("SELECT * FROM subarea", 'subarea_id', 'subarea_id', 'subarea_nama', $subarea_id);?>
                               
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/penerima'"/>
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
                    <li><a href="<?php echo base_url(); ?>admin/penerima"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/penerima/edit" method="POST">
                            <input type="hidden" name="penerima_id" value="<?php echo $penerima_id;?>" />
                            <div class="row clearfix">
                             <div class="col-sm-6">
                                <label for="penerima_nama">Nama</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="penerima_nama" placeholder="Masukan Nama" value="<?php echo $penerima_nama;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="penerima_tgl">Tanggal</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sertifikasi_tgl" class="datepicker form-control" class="form-control" name="penerima_tgl"  placeholder="Masukan Tanggal" value="<?php echo $penerima_tgl;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="penerima_keterangan">Keterangan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="penerima_keterangan" placeholder="Masukan Keterangan"><?php echo $penerima_keterangan;?></textarea> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="subarea_id">Sub Area</label>
                                       <?php $this->ADM->combo_box2("SELECT * FROM subarea", 'subarea_id', 'subarea_id', 'subarea_nama', $subarea_id);?>
                               
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/penerima'"/>
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
