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
                         <a href="<?php echo site_url();?>admin/sertifikasi/tambah" class="btn bg-red waves-effect"> <i class="material-icons">add</i><span>Tambah Data</span></a>
                         <a href="<?php echo site_url();?>admin/sertifikasi_excel" class="btn bg-green waves-effect"> <i class="material-icons">insert_drive_file</i><span>Export to Excel</span></a> 
                         <br><br>
                            <div class="table-responsive">                               
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Nama Training</th>
                                            <th>No.Reg</th>
                                            <th>Gambar</th>
                                           <!--  <th>Provider</th>
                                            <th>Suberea</th>
                                            <th>Departemen</th>
                                            <th>Tgl.Pelaksanaan</th>
                                            <th>Status</th> -->
                                            <th>Masa Berlaku</th>
                                            <!-- <th>Tgl.Terima</th> -->
                                            <!-- <th>Penerima</th> -->
                                            <!-- <th>Ket</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>                                            
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Nama Training</th>
                                            <th>No.Reg</th>
                                            <th>Provider</th>
                                            <th>Suberea</th>
                                            <th>Departemen</th>
                                            <th>Tgl.Pelaksanaan</th>
                                            <th>Status</th>
                                            <th>Masa Berlaku</th>
                                            <th>Tgl.Terima</th>
                                            <th>Penerima</th>
                                            <th>Ket</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                     <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT 
                                    sertifikasi.sertifikasi_id AS sertifikasi_id,
                                    sertifikasi.sertifikasi_nama AS sertifikasi_nama,
                                    sertifikasi.sertifikasi_tgl AS sertifikasi_tgl,
                                    sertifikasi.sertifikasi_noreg AS sertifikasi_noreg,
                                    sertifikasi.sertifikasi_tglpelaksanaan AS sertifikasi_tglpelaksanaan,
                                    sertifikasi.sertifikasi_status AS sertifikasi_status,
                                    sertifikasi.sertifikasi_provider AS sertifikasi_provider,
                                    sertifikasi.sertifikasi_masaberlaku AS sertifikasi_masaberlaku,
                                    sertifikasi.sertifikasi_keterangan AS sertifikasi_keterangan,
                                    sertifikasi.sertifikasi_gambar AS sertifikasi_gambar,
                                    karyawan.karyawan_nip AS karyawan_nip,
                                    karyawan.karyawan_nama AS karyawan_nama,
                                    karyawan.karyawan_email AS karyawan_email,
                                    penerima_sertifikasi.penerima_id AS penerima_id,
                                    penerima_sertifikasi.penerima_nama AS penerima_nama,
                                    departemen.departemen_id AS departemen_id,
                                    departemen.departemen_nama AS departemen_nama,
                                    subarea.subarea_id AS subarea_id,
                                    subarea.subarea_nama AS subarea_nama,
                                    tahun.tahun_id AS tahun_id,
                                    tahun.tahun_nama AS tahun_nama
                                     FROM sertifikasi
                                     LEFT JOIN tahun ON tahun.tahun_id = sertifikasi.tahun_id 
                                     LEFT JOIN karyawan ON karyawan.karyawan_nip = sertifikasi.karyawan_nip
                                     LEFT JOIN penerima_sertifikasi ON penerima_sertifikasi.penerima_id = sertifikasi.penerima_id  
                                     LEFT JOIN departemen ON departemen.departemen_id = sertifikasi.departemen_id 
                                     LEFT JOIN subarea ON subarea.subarea_id = sertifikasi.subarea_id 


                                     ORDER BY sertifikasi_nama DESC");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->karyawan_nip; ?></td>
                                            <td><?php echo $row->karyawan_nama; ?></td>
                                            <td><?php echo $row->sertifikasi_nama; ?></td>
                                            <td><?php echo $row->sertifikasi_noreg; ?></td>
                                            <td>
                                            <img src="<?php echo base_url()."assets/images/kecil_".$row->sertifikasi_gambar;?>" width="150px"/></td>
                                            <!-- <td><?php echo $row->sertifikasi_provider; ?></td>
                                            <td><?php echo $row->subarea_nama; ?></td>
                                            <td><?php echo $row->departemen_nama; ?></td>
                                            <td><?php echo dateIndo($row->sertifikasi_tglpelaksanaan); ?></td>
                                            <td><?php echo $row->sertifikasi_status; ?></td> -->
                                            <td><?php echo dateIndo($row->sertifikasi_masaberlaku); ?>
                                            </td>

                                            <!-- <td><?php echo dateIndo($row->sertifikasi_tgl); ?></td> -->

                                            <!-- <td><?php echo $row->penerima_nama; ?></td> -->
                                            <!-- <td><?php echo $row->sertifikasi_keterangan; ?></td> -->
                                            <td>
                                                <button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#sertifikasiModal<?php echo $row->sertifikasi_id; ?>" title="Detail"><i class="material-icons">launch</i></button>

                                                <a href="<?php echo site_url();?>admin/sertifikasi_print/<?php echo $row->sertifikasi_id; ?>" title="Print"> <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">print</i></button></a>

                                                <button type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float" onclick="window.location.href='<?php echo site_url();?>admin/sertifikasi/edit/<?php echo $row->sertifikasi_id ?>'" title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </button>

                                                <a href="<?php echo site_url();?>admin/sertifikasi/hapus/<?php echo $row->sertifikasi_id; ?>"onclick="return confirm('Anda yakin akan menghapus ?')" title="Hapus"> <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">delete</i>
                                                </button></a>

                                            </td>
                                        </tr>

                                          <div class="modal fade" id="sertifikasiModal<?php echo $row->sertifikasi_id; ?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Detail Sertifikasi</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                <div class="row clearfix">
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_nama">NIK</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                        <?php echo $row->karyawan_nip; ?>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_nama">Nama Karyawan</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                        <?php echo $row->karyawan_nama; ?>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_nama">Nama Training</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->sertifikasi_nama; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_noreg">No.Reg</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                           <?php echo $row->sertifikasi_noreg; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_provider">Provider</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->sertifikasi_provider; ?>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_provider">Sub Area</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->subarea_nama; ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_provider">Departemen</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->departemen_nama; ?>
                                                        </div>
                                                    </div>
                                                </div>                             
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_tglberlaku">Tanggal Pelaksanaan</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo dateIndo($row->sertifikasi_tglpelaksanaan); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_masaberlaku">Status</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->sertifikasi_status; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_masaberlaku">Masa Berlaku</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo dateIndo($row->sertifikasi_masaberlaku); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_masaberlaku">Tanggal Terima</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo dateIndo($row->sertifikasi_tgl); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sertifikasi_masaberlaku">Penerima</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->penerima_nama; ?>
                                                        </div>
                                                    </div>
                                                </div>                                           
                                                <div class="col-sm-12">
                                                    <label for="sertifikasi_masaberlaku">Keterangan</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <?php echo $row->sertifikasi_keterangan; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $date= date('Y-m-d'); 
                                        if($row->sertifikasi_masaberlaku < $date) 
                                        { ?>
                                        
                                        <?php
                                            $to= $row->karyawan_email;
                                            $subject='Sertifikasi Holcim';
                                            $from = 'cs@holcimcertification.com';
                                            $body= 'Masa Berlaku sertifikat anda sudah habis mulai '.dateIndo($row->sertifikasi_tgl). ' s/d ' .dateIndo($row->sertifikasi_masaberlaku);
                                            $headers = "From: " . strip_tags($from) . "\r\n";
                                            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                                            $headers .= "MIME-Version: 1.0\r\n";
                                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                            mail($to,$subject,$body,$headers);
                                            ?>
                                        <?php } else { echo ""; }   
                                         ?>
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
                    <li><a href="<?php echo base_url(); ?>admin/sertifikasi"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
                    <li class="active"> TAMBAH </li>
                </ol>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH <?php echo $breadcrumb; ?></h2>
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
                         <form id="form_validation" action="<?php echo site_url();?>admin/sertifikasi/tambah" method="POST" enctype="multipart/form-data" onSubmit="return validate()">
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="sertifikasi_nama">Nama Karyawan</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM karyawan", 'karyawan_nip', 'karyawan_nip', 'karyawan_nama', $karyawan_nip, 'submit();');?>
                                </div>
                            </div>
                            <?php if ($karyawan_nip == $karyawan_nip ) {?>
                            <div class="col-sm-12">
                                <label for="sertifikasi_nama">E-mail Karyawan</label>
                                    <div class="form-group form-float">
                                        <?php $query = $this->db->query("SELECT *
                                        FROM karyawan 
                                        WHERE   karyawan.karyawan_nip='$karyawan_nip' limit 1");
                                        foreach ($query->result() as $row){?>
                                    <div class="form-line">
                                        <input type="text" class="form-control input-sm" name="karyawan_email" value="<?php echo $row->karyawan_email; ?>" />
                                    </div> 
                                         <?php } ?>
                                    </div>
                            </div>
                            <?php } ?>
                            <div class="col-sm-4">
                                <label for="sertifikasi_nama">Nama Training</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sertifikasi_nama" placeholder="Masukan Nama Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_tgl">Tanggal Training</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="sertifikasi_tgl" id="sertifikasi_tgl" class="datepicker form-control" placeholder="Masukan Tanggal Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_noreg">No.Reg</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sertifikasi_noreg"  placeholder="Masukan No.Reg Training"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_tglpelaksanaan">Tanggal Pelaksanaan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sertifikasi_tglpelaksanaan" class="datepicker form-control" name="sertifikasi_tglpelaksanaan"  placeholder="Masukan Tanggal Pelaksanaan Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_provider">Provider</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="tex" class="form-control" name="sertifikasi_provider"  placeholder="Masukan Provider Training"  required>
                                    </div>
                                </div>
                            </div>                           
                            <div class="col-sm-4">
                                <label for="sertifikasi_tglberlaku">Tanggal Berlaku</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="tex" id="sertifikasi_tglberlaku" class="datepicker form-control" name="sertifikasi_tglberlaku"  placeholder="Masukan Tanggal Berlaku"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_masaberlaku">Masa Berlaku</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="sertifikasi_masaberlaku" class="form-control" name="sertifikasi_masaberlaku"  placeholder="Masukan Masa Berlaku Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="tahun_id">Tahun Sertifikasi</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="departemen_id">Departemen</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM departemen", 'departemen_id', 'departemen_id', 'departemen_nama', $departemen_id);?>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="sertifikasi_masaberlaku">Keterangan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="sertifikasi_keterangan"  placeholder="Masukan Keterangan Training" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="subarea_id">Sub Area</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM subarea", 'subarea_id', 'subarea_id', 'subarea_nama', $subarea_id);?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="penerima_id">Penerima</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM penerima_sertifikasi", 'penerima_id', 'penerima_id', 'penerima_nama', $penerima_id);?>
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <label for="sertifikasi_status">Status</label>
                                        <div class="demo-radio-button">
                                            <input name="sertifikasi_status" type="radio" id="radio_1" value="BARU" checked />
                                            <label for="radio_1">BARU</label>
                                            <input name="sertifikasi_status" type="radio" id="radio_2" value="PERPANJANGAN" />
                                            <label for="radio_2">PERPANJANGAN</label>
                                        </div>  
                            </div>                            
                            <div class="col-sm-12">
                                <label for="sertifikasi_gambar">Gambar</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="sertifikasi_gambar"  >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/sertifikasi'"/>
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
                    <li><a href="<?php echo base_url(); ?>admin/sertifikasi"> <i class="material-icons"><?php echo $icon; ?></i>  <?php echo $breadcrumb; ?> </a></li>
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
                            <form id="form_validation" action="<?php echo site_url();?>admin/sertifikasi/edit/<?php echo $sertifikasi_id;?>" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="sertifikasi_id" value="<?php echo $sertifikasi_id;?>" />
                            <div class="row clearfix">
                              <div class="col-sm-12">
                                <label for="sertifikasi_nama">Nama Karyawan</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM karyawan", 'karyawan_nip', 'karyawan_nip', 'karyawan_nama', $karyawan_nip, 'submit();');?>
                                </div>
                            </div>
                            <?php if ($karyawan_nip == $karyawan_nip ) {?>
                            <div class="col-sm-12">
                                <label for="sertifikasi_nama">E-mail Karyawan</label>
                                    <div class="form-group form-float">
                                        <?php $query = $this->db->query("SELECT *
                                        FROM karyawan 
                                        WHERE   karyawan.karyawan_nip='$karyawan_nip' limit 1");
                                        foreach ($query->result() as $row){?>
                                    <div class="form-line">
                                        <input type="text" class="form-control input-sm" name="karyawan_email" value="<?php echo $row->karyawan_email; ?>" />
                                    </div> 
                                         <?php } ?>
                                    </div>
                            </div>
                            <?php } ?>
                            <div class="col-sm-4">
                                <label for="sertifikasi_nama">Nama Training</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sertifikasi_nama" value="<?php echo $sertifikasi_nama;?>" placeholder="Masukan Nama Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_tgl">Tanggal Training</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="sertifikasi_tgl" id="sertifikasi_tgl" class="datepicker form-control" value="<?php echo $sertifikasi_tgl;?>" placeholder="Masukan Tanggal Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_noreg">No.Reg</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sertifikasi_noreg"  placeholder="Masukan No.Reg Training" value="<?php echo $sertifikasi_noreg;?>"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_tglpelaksanaan">Tanggal Pelaksanaan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $sertifikasi_tglpelaksanaan;?>"  id="sertifikasi_tglpelaksanaan" class="datepicker form-control" name="sertifikasi_tglpelaksanaan"  placeholder="Masukan Tanggal Pelaksanaan Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_provider">Provider</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $sertifikasi_provider;?>"  class="form-control" name="sertifikasi_provider"  placeholder="Masukan Provider Training"  required>
                                    </div>
                                </div>
                            </div>                           
                            <div class="col-sm-4">
                                <label for="sertifikasi_tglberlaku">Tanggal Berlaku</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $sertifikasi_tglberlaku;?>" id="sertifikasi_tglberlaku" class="datepicker form-control" name="sertifikasi_tglberlaku"  placeholder="Masukan Tanggal Berlaku"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="sertifikasi_masaberlaku">Masa Berlaku</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" value="<?php echo $sertifikasi_masaberlaku;?>"  id="sertifikasi_masaberlaku" class="form-control" name="sertifikasi_masaberlaku"  placeholder="Masukan Masa Berlaku Training" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="tahun_id">Tahun Sertifikasi</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM tahun", 'tahun_id', 'tahun_id', 'tahun_nama', $tahun_id);?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="departemen_id">Departemen</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM departemen", 'departemen_id', 'departemen_id', 'departemen_nama', $departemen_id);?>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <label for="sertifikasi_masaberlaku">Keterangan</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="sertifikasi_keterangan"  placeholder="Masukan Keterangan Training" ><?php echo $sertifikasi_keterangan;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="subarea_id">Sub Area</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM subarea", 'subarea_id', 'subarea_id', 'subarea_nama', $subarea_id);?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="penerima_id">Penerima</label>
                                <div class="form-group form-float">
                                       <?php $this->ADM->combo_box2("SELECT * FROM penerima_sertifikasi", 'penerima_id', 'penerima_id', 'penerima_nama', $penerima_id);?>
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <label for="sertifikasi_status">Status</label>
                                        <div class="demo-radio-button">
                                            <input name="sertifikasi_status" type="radio" id="radio_1" value="BARU"  <?php echo $baru = ($sertifikasi_status=='BARU')?'checked':'';?> />
                                            <label for="radio_1">BARU</label>
                                            <input name="sertifikasi_status" type="radio" id="radio_2" value="PERPANJANGAN" <?php echo $perpanjangan = ($sertifikasi_status=='PERPANJANGAN')?'checked':'';?>  />
                                            <label for="radio_2">PERPANJANGAN</label>
                                        </div>  
                            </div>
                              <?php if ($sertifikasi_gambar){?>               
                            <div class="col-sm-12">
                                <label for="sertifikasi_gambar">Gambar</label>
                                <div class="form-group form-float">
                                            <img src="<?php echo base_url()."assets/images/kecil_".$sertifikasi_gambar;?>" width="150px"/>
                                </div>
                            </div>                                                      
                            <div class="col-sm-12">
                                <label for="sertifikasi_gambar">Edit Gambar</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="sertifikasi_gambar"  >
                                    </div>
                                </div>
                            </div>
                               <?php } else {?>                   
                            <div class="col-sm-12">
                                <label for="sertifikasi_gambar">Gambar</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="sertifikasi_gambar"  >
                                    </div>
                                </div>
                            </div>
                                <?php } ?>   
                            <div class="col-sm-12">
                                <input class="btn bg-red btn-lg waves-effect"  type="submit" name="simpan" value="Simpan Data">
                                <input class="btn btn-default btn-lg waves-effect" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>admin/sertifikasi'"/>
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
