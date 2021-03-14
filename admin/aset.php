<?php 
  $data_aset = $db->get_results("SELECT * FROM tb_aset");
?>  

<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Sarpras</h3>
        </div>

        <?php if ($_SESSION['status'] != 'Guru') { ?>
            <div class="col-md-6 col-4 align-self-center">
            <div class="text-right">
                <a href="index?m=aset_tambah"
                class="btn btn-info text-white">Tambah Data</a>
            </div>
        </div>
        <?php } ?>
        
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
                                <th class="border-top-0">Foto</th>
                                <th class="border-top-0">Nama Sarpras</th>
                                <th class="border-top-0">Jenis</th>
                                <th class="border-top-0">Jumlah</th>
                                <th class="border-top-0">Kondisi</th>

                                <?php if ($_SESSION['status'] != 'Guru') { ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php } ?>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_aset)): ?>
                                <tr><td colspan="7" class="text-center">Tidak ada data</td></tr> 
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
                                        <td>
                                            <?php if ($_SESSION['status'] != 'Guru') { ?>
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalAset<?=$aset->id ?>">Detail</button>
                                                <a href="index?m=aset_edit&id=<?= $aset->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="aksi?act=aset_hapus&id=<?= $aset->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data aset <?= $aset->nama_aset ?>?')">Hapus</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <?php include 'modal_aset.php'; ?>

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