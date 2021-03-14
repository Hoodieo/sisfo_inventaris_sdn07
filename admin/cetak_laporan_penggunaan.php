<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Cetak Laporan Penggunaan Sarana-Prasarana</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   <form method="POST" action="generate_laporan">
                        <input type="hidden" name="m" value="cetak_laporan">
                        <input type="hidden" name="laporan" value="Penggunaan Sarana-Prasarana">

                        <div class="form-group row">
                            <label for="bulan" class="col-2 col-form-label">Bulan</label>
                            <div class="col-md-2">
                              <select name="bulan" class="form-control">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">July</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-2 col-form-label">Tahun</label>
                            <div class="col-md-2">
                              <select name="tahun" class="form-control">
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                              </select>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="index?m=laporan_penggunaan" class="btn btn-secondary">Batal</a>
                            <button type="submit" name="cetak_btn" class="btn btn-primary">Cetak</button>    
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>