<?php 
  $data_pengguna = $db->get_results("SELECT * FROM tb_pengguna");
?>  

<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Data Pengguna</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">
            <div class="text-right">
                <a href="index?m=pengguna_tambah"
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
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!count($data_pengguna)): ?>
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_pengguna as $pengguna): ?>
                                    
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $pengguna->username ?></td>
                                        <td><?= $pengguna->status ?></td>
                                        <td>
                                            <a href="aksi?act=pengguna_reset_password&id=<?= $pengguna->id; ?>&username=<?= $pengguna->username ?>" class="btn btn-warning btn-sm" onclick="return confirm('Reset password pengguna `<?= $pengguna->username ?>`?')">Reset Password</a>
                                            <a href="aksi?act=pengguna_hapus&id=<?= $pengguna->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
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