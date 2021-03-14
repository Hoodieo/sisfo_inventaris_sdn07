<?php 
  $data_pengajuan_aset = $db->get_results("SELECT * FROM tb_pengajuan_aset");
?>  

<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Pengajuan Sarpras Baru</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="text-right">
                <a href="index?m=pengajuan_aset_tambah"
                class="btn btn-info text-white">Tambah Data</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Tanggal Diajukan</th>
                                <th class="border-top-0">Sarpras</th>
                                <th class="border-top-0">Jumlah</th>
                                <th class="border-top-0">Keterangan</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_pengajuan_aset)): ?>
                                <tr><td colspan="8" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_pengajuan_aset as $aset): ?>
                                    
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= date('d M Y', strtotime($aset->tgl_diajukan ));?></td>
                                        <td><?= $aset->nama_aset ?></td>
                                        <td><?= $aset->qty ?></td>
                                        <td><?= $aset->keterangan ?></td>
                                        <td><?= $aset->status ?></td>
                                        <td>
                                            <a href="index?m=pengajuan_aset_edit&id=<?= $aset->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=pengajuan_aset_hapus&id=<?= $aset->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                        </td>
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
</div>