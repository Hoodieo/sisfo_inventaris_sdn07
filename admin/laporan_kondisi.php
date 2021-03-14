<?php 
  $data_aset = $db->get_results("SELECT * FROM tb_aset");
?>  

<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Laporan Kondisi Sarpras</h3>
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
                            <a class="nav-link active" href="index?m=laporan_kondisi">Laporan Kondisi Sarpras</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="index?m=laporan_pengajuan">Laporan Pengajuan Sarpras</a>
                          </li>
                        </ul>

                        <?php if ($_SESSION['status'] != 'Kepala Sekolah'): ?>
                        <div>
                            <form method="POST" action="generate_laporan">
                                <input type="hidden" name="m" value="cetak_laporan">
                                <input type="hidden" name="laporan" value="Kondisi Sarana-Prasarana">
                                <button type="submit" class="btn btn-secondary">Cetak Laporan</button>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>

                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Foto</th>
                                <th class="border-top-0">Nama Sarpras</th>
                                <th class="border-top-0">Jenis</th>
                                <th class="border-top-0">Jumlah</th>
                                <th class="border-top-0">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_aset)): ?>
                                <tr><td colspan="9" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_aset as $aset): ?>
                                    
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td> 
                                            <?php if (!$aset->foto): ?>
                                                Tidak ada foto
                                            <?php else: ?>
                                                <img src="<?= '../images/'.$aset->foto ?>" width="80" alt="<?= '[Foto '.$aset->nama_aset.']' ?>">
                                            <?php endif ?>
                                        </td>
                                        <td><?= $aset->nama_aset ?></td>
                                        <td><?= $aset->jenis ?></td>
                                        <td><?= $aset->qty ?></td>
                                        <td><?= $aset->kondisi ?></td>
                                        
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