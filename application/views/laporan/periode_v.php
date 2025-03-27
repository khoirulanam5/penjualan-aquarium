<center><h3>Laporan <?=ucwords($this->input->get('periode'))?></h3></center>
<div class="row col-md-12">
    <center>
        <table style='text-align:center;border:solid 1px'>
            <tr style="background:#e1e6ec">
                <td style="">No Transaksi</td>
                <td style="border-left:solid 1px">Status Bayar</td>
                <td style="border-left:solid 1px">Tgl Jual</td>
                <td style="border-left:solid 1px">Id Pegawai</td>
                <td style="border-left:solid 1px">Id Pengiriman</td>
                <td style="border-left:solid 1px">Status Kirim</td>
                <td style="border-left:solid 1px">Nama Penerima</td>
            </tr>
            <?php
            foreach ($items as $key => $value) {
            ?>
            <tr>
                <td style="border-top:solid 1px"><?=$value->no_transaksi?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=($value->status_bayar == 1) ? "Lunas":"Belum Bayar"?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=$value->tgl_jual?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=$value->id_pegawai?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=$value->id_pengiriman?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=($value->status_kirim == 2) ? 'Sudah Diterima Pembeli' :'Belum Diterima'?></td>
                <td style="border-left:solid 1px;border-top:solid 1px"><?=$value->nama_penerima?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </center>
</div>