<?php 
  $data_penggunaan_aset = $db->get_results("SELECT tb_penggunaan_aset.*, tb_aset.nama_aset FROM tb_penggunaan_aset JOIN tb_aset ON tb_penggunaan_aset.id_aset=tb_aset.id");
?>  


<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Laporan Penggunaan Sarpras</h3>
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
                            <a class="nav-link active" href="index?m=laporan_penggunaan">Laporan Penggunaan Sarpras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="index?m=laporan_kondisi">Laporan Kondisi Sarpras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="index?m=laporan_pengajuan">Laporan Pengajuan Sarpras</a>
                          </li>
                        </ul>

                        <?php if ($_SESSION['status'] != 'Kepala Sekolah'): ?>
                        <div>
                            <a href="index?m=cetak_laporan_penggunaan" class="btn btn-secondary">Cetak Laporan</a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Penanggung Jawab</th>
                                <th class="border-top-0">QTY</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Tgl Diserahkan</th>
                                <th class="border-top-0">Tgl Dikembalikan</th>
                                <th class="border-top-0">Keterangan</th>
                                <th class="border-top-0">Sarpras</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_penggunaan_aset)): ?>
                                <tr><td colspan="9" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_penggunaan_aset as $aset): ?>
                                    
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $aset->penanggung_jawab ?></td>
                                        <td><?= $aset->qty ?></td>
                                        <td><?= $aset->status ?></td>
                                        <td><?= date('d M Y', strtotime($aset->tgl_serahkan)) ?></td>
                                        <td><?= ($aset->tgl_kembali == '') ? '-' : date('d M Y', strtotime($aset->tgl_kembali)) ?></td>
                                        <td><?= ($aset->keterangan == '') ? '-' : $aset->keterangan ?></td>
                                        <td><?= $aset->nama_aset ?></td>
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