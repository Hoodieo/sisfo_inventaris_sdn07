<!-- Modal Detail Info Aset -->
<div class="modal fade" id="modalAset<?=$aset->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sarpras: <?= $aset->nama_aset ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="text-center my-3">
            <img src="../images/<?= $aset->foto ?>" alt="[Tidak ada foto]" width="200">    
        </div>

       <div class="row">
        <div class="col-4">Sarpras</div>
        <div class="col-8 h6"><?= $aset->nama_aset ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Jumlah (QTY)</div>
        <div class="col-8 h6"><?= $aset->qty ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Nilai Sarpras</div>
        <div class="col-8 h6">Rp <?= number_format($aset->nilai_aset,2,',','.') ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Sumber Sarpras</div>
        <div class="col-8 h6"><?= $aset->sumber_aset ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Kepemilikan</div>
        <div class="col-8 h6"><?= $aset->kepemilikan ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Kondisi</div>
        <div class="col-8 h6"><?= $aset->kondisi ?></div>
            
        </div>
       <div class="row">
        <div class="col-4">Status Penggunaan</div>
        <div class="col-8 h6"><?= $aset->status_penggunaan ?></div>
            
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div> 
    </div>
  </div>
</div>