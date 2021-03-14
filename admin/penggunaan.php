<?php 
    $where = ($_SESSION['status'] == 'Guru') ? '' : ' WHERE status="Dipinjamkan" OR status="Dikembalikan"';
    $sql = "SELECT tb_penggunaan_aset.*, tb_aset.nama_aset FROM tb_penggunaan_aset JOIN tb_aset ON tb_penggunaan_aset.id_aset=tb_aset.id $where ORDER BY status DESC";
    $data_penggunaan_aset = $db->get_results($sql);

    $verifikasi_aset =  $db->get_row("SELECT count(id) as jumlah FROM tb_penggunaan_aset WHERE status='Diproses'");
    $verifikasi_aset = ($verifikasi_aset->jumlah < 1) ? '' : ' ('.$verifikasi_aset->jumlah.')';
?>  

<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Penggunaan Sarpras</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="text-right">
                <?php if ($_SESSION['status'] != 'Guru') { ?>
                <a href="index?m=penggunaan_verifikasi" class="btn btn-success text-white">Verifikasi Pengajuan Sarpras <?=$verifikasi_aset?> </a>
                <?php } ?>
                <a href="index?m=penggunaan_tambah"
                class="btn btn-info text-white">Buat Pengajuan Penggunaan</a>
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
                                <th class="border-top-0">Penanggung Jawab</th>
                                <th class="border-top-0">QTY</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Tgl Diserahkan</th>
                                <th class="border-top-0">Tgl Dikembalikan</th>
                                <th class="border-top-0">Keterangan</th>
                                <th class="border-top-0">Sarpras</th>
                                <th class="border-top-0">Aksi</th>
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
                                        <td><?= ($aset->tgl_serahkan=='') ? '' : date('d M Y', strtotime($aset->tgl_serahkan)) ?></td>
                                        <td><?= ($aset->tgl_kembali=='') ? '' : date('d M Y', strtotime($aset->tgl_kembali)) ?></td>
                                        <td><?= $aset->keterangan ?></td>
                                        <td><?= $aset->nama_aset ?></td>
                                        <td>
                                            <?php if ($_SESSION['status'] == 'Guru') {
                                                if (($_SESSION['user_id'] == $aset->id_user) && ($aset->status=='Diproses')) { ?>
                                                    <a href="aksi?act=penggunaan_hapus&id=<?= $aset->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Batalkan pinjam?')">Batalkan</a>
                                            <?php }
                                            }else{ ?>
                                            <a href="index?m=penggunaan_edit&id=<?= $aset->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=penggunaan_hapus&id=<?= $aset->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                            <?php } ?>
                                            
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