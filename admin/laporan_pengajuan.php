<?php 
  $data_pengajuan_aset = $db->get_results("SELECT * FROM tb_pengajuan_aset ORDER BY status, tgl_diajukan ASC");
?>  


<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Laporan Pengajuan Sarpras</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <!-- ======== Tabs Menu ======== -->
                    <div class="d-flex justify-content-between">
                        <ul class="nav nav-pills mb-3">
                          <li class="nav-item">
                            <a class="nav-link" href="index?m=laporan_penggunaan">Laporan Penggunaan Sarpras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="index?m=laporan_kondisi">Laporan Kondisi Sarpras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="index?m=laporan_pengajuan">Laporan Pengajuan Sarpras</a>
                          </li>
                        </ul>

                        <?php if ($_SESSION['status'] != 'Kepala Sekolah'): ?>
                        <div>
                            <form method="POST" action="generate_laporan">
                                <input type="hidden" name="m" value="cetak_laporan">
                                <input type="hidden" name="laporan" value="Pengajuan Sarana-Prasarana">
                                <button type="submit" class="btn btn-secondary">Cetak Laporan</button>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>

                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Sarpras</th>
                                <th class="border-top-0">Jumlah</th>
                                <th class="border-top-0">Tgl Diajukan</th>
                                <th class="border-top-0">Keterangan</th>
                                <th class="border-top-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_pengajuan_aset)): ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_pengajuan_aset as $aset): ?>
                                    
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $aset->nama_aset ?></td>
                                        <td><?= $aset->qty ?></td>
                                        <td><?= date('d M Y', strtotime($aset->tgl_diajukan)) ?></td>
                                        <td><?= $aset->keterangan ?></td>
                                        <td><?= $aset->status ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>