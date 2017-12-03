  <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Selamat datang <b> <?php echo $admin->admin_nama; ?> </b>, di Web Sertifikasi Pegawai Holcim.
                                <!-- <small>27th June 2017</small> -->
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
              
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">list</i>
                        </div>
                        <div class="content">
                            <div class="text">LIST SERTIFIKASI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $sertifikasi; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA KARYAWAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $karyawan; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">DEPARTEMEN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $departemen; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">donut_large</i>
                        </div>
                        <div class="content">
                            <div class="text">SUB AREA</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $subarea; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
           
            </div>
        </div>
    </section>