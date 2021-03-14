<?php 
	ob_start();
	require_once '../includes/functions.php';
	require_once '../vendor/autoload.php';
    
    $query = '';

    if ($_POST['laporan'] == 'Penggunaan Sarana-Prasarana') {
        $query = "SELECT tb_penggunaan_aset.*, tb_aset.nama_aset FROM tb_penggunaan_aset JOIN tb_aset ON tb_penggunaan_aset.id_aset=tb_aset.id WHERE Month(tgl_serahkan)='$_POST[bulan]' AND Year(tgl_serahkan)='$_POST[tahun]'";
        $tabel_head = '<tr><th class="border-top-0">No</th><th class="border-top-0">Penanggung Jawab</th><th class="border-top-0">QTY</th><th class="border-top-0">Status</th><th class="border-top-0">Tgl Serahkan</th><th class="border-top-0">Tgl Dikembalikan</th><th class="border-top-0">Keterangan</th><th class="border-top-0">Sarpras</th></tr>';
    }elseif ($_POST['laporan'] == 'Kondisi Sarana-Prasarana') {
        $query = "SELECT * FROM tb_aset ORDER BY kondisi ";
        $tabel_head = '<tr><th class="border-top-0">No</th><th class="border-top-0">Foto</th><th class="border-top-0">Nama Sarpras</th><th class="border-top-0">Jenis</th><th class="border-top-0">Jumlah</th><th class="border-top-0">Kondisi</th></tr>';
    }elseif ($_POST['laporan'] == 'Pengajuan Sarana-Prasarana') {
        $query = "SELECT * FROM tb_pengajuan_aset WHERE status='Diajukan'";
        $tabel_head = '<tr><th class="border-top-0">No</th><th class="border-top-0">Sarpras</th><th class="border-top-0">Jumlah</th><th class="border-top-0">Tgl Diajukan</th><th class="border-top-0">Keterangan</th></tr>';
    }

    $data_aset = $db->get_results($query);
    // echo "<pre>";
    // var_dump($data_aset); die();
    // echo "</pre>";

	$html = '<h2 style="text-align:center;">Laporan '.$_POST['laporan'].'</h2>';
    $html .= ($_POST['laporan'] == 'Penggunaan Sarana-Prasarana') 
                ? '<p>Laporan Bulan: <b>'.getMonthInd($_POST['bulan']).' '.$_POST['tahun'].'</b></p>'
                : '';
    $html .= '<p>Tanggal Cetak: '.date('d M Y H:i:s').'</p><table class="table" border="1" cellpadding="6" cellspacing="0"><thead>'.$tabel_head.'</thead><tbody>';

$html .= $query;
    if (count($data_aset) < 1) {
        $html .= '<tr><td colspan="9" style="text-align:center;">Tidak ada data</td></tr>';
    }else{
        // Laporan Penggunaan Sarana-Prasarana
        if ($_POST['laporan'] == 'Penggunaan Sarana-Prasarana') {
            foreach ($data_aset as $aset) {
                $tgl_kembali = ($aset->tgl_kembali=='') ? ' - ' : date('d M Y', strtotime($aset->tgl_kembali));
                $html .= '<tr>
                            <td>'.++$i.'</td>
                            <td>'.$aset->penanggung_jawab.'</td>
                            <td>'.$aset->qty.'</td>
                            <td>'.$aset->status.'</td>
                            <td>'.date('d M Y', strtotime($aset->tgl_serahkan)).'</td>
                            <td>'.$tgl_kembali.'</td>
                            <td>'.$aset->keterangan.'</td>
                            <td>'.$aset->nama_aset.'</td>
                        </tr>';
            }
        }

        // Laporan Kondisi Sarana-Prasarana
        elseif ($_POST['laporan'] == 'Kondisi Sarana-Prasarana') {
            foreach ($data_aset as $aset) {
                $img = (!$aset->foto) 
                    ? 'Tidak ada foto' 
                    : '<img src="../images/'.$aset->foto.'" width="80" alt=".[Foto '.$aset->nama_aset.']">';
                $html .= '<tr>
                    <td>'.++$i.'</td>
                    <td>'.$img.'</td>
                    <td>'.$aset->nama_aset.'</td>
                    <td>'.$aset->jenis.'</td>
                    <td>'.$aset->qty.'</td>
                    <td>'.$aset->kondisi.'</td>
                </tr>';
            }

        }

        // Laporan Kondisi Sarana-Prasarana
        elseif ($_POST['laporan'] == 'Pengajuan Sarana-Prasarana') {
            foreach ($data_aset as $aset) {
                $html .= '<tr>
                    <td>'.++$i.'</td>
                    <td>'.$aset->nama_aset.'</td>
                    <td>'.$aset->qty.'</td>
                    <td>'.$aset->tgl_diajukan.'</td>
                    <td>'.$aset->keterangan.'</td>
                </tr>';
            }

        }
    }

    $html .= '</tbody>
    </table>';


	// Create Raport PDF File
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
	$mpdf->WriteHTML($html);
	$filename = 'Laporan.pdf';
	$mpdf->Output($filename,\Mpdf\Output\Destination::INLINE);
	ob_end_flush();
	ob_clean();
 ?>