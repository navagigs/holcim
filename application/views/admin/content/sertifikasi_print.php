<body onload="javascript:window.print()">
<style type="text/css">
	table {
		border: 1px solid #000;
		border-collapse: collapse;
	}
	table th {
		background-color: #E6E6FA;
		font-size: 12px;
	}
	#title {
		width: 100%;
		margin: 0px auto;
		height: 40px;
		font-weight: bold;
		font-size: 22px;
	}
</style>
<div id="title"><center>DATA SERTIFIKAT TAHUN <?php echo date('Y'); ?></center></div>
                                 <table width="100%" border="1px">
                                    <thead>
                                        <tr bgcolor="#E6E6FA">
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
                                    karyawan.karyawan_nip AS karyawan_nip,
                                    karyawan.karyawan_nama AS karyawan_nama,
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
                                     WHERE sertifikasi.sertifikasi_id = '$sertifikasi->sertifikasi_id'


                                     ORDER BY sertifikasi_nama DESC");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td><?php echo $row->karyawan_nip; ?></td>
                                            <td><?php echo $row->karyawan_nama; ?></td>
                                            <td><?php echo $row->sertifikasi_nama; ?></td>
                                            <td><?php echo $row->sertifikasi_noreg; ?></td>
                                            <td><?php echo $row->sertifikasi_provider; ?></td>
                                            <td><?php echo $row->subarea_nama; ?></td>
                                            <td><?php echo $row->departemen_nama; ?></td>
                                            <td><?php echo dateIndo($row->sertifikasi_tglpelaksanaan); ?></td>
                                            <td><?php echo $row->sertifikasi_status; ?></td>
                                            <td><?php echo dateIndo($row->sertifikasi_masaberlaku); ?></td>

                                            <td><?php echo dateIndo($row->sertifikasi_tgl); ?></td>

                                            <td><?php echo $row->penerima_nama; ?></td>
                                            <td><?php echo $row->sertifikasi_keterangan; ?></td>
                                        </tr>
                                    <?php $no++; } ?>
                                    </tbody>
                                </table> 