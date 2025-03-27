Total Penjualan : <?=rp($total_penjualan)?><br>
Total Keuntungan: <?=rp($keuntungan)?>
<table border="1px solid" style="border:1px solid;">
    <tr>
        <td>Nama Barang</td>
        <td>Gambar</td>
        <td>Diskripsi</td>
        <td>Jumlah</td>
        <td>Harga Satuan</td>
    </tr>
    <?php
    foreach ($barang as $key => $value) {
        $img = file_exists(FCPATH.'images/'.$value->images) ? $value->images:'noimages.jpg';
        ?>
        <tr>
            <td><?=$value->nama_produk?></td>
            <td><img src="<?=base_url().'images/'.$img?>" width="70px" alt=""></td>
            <td><?=$value->diskripsi?></td>
            <td><?=$value->jumlah?></td>
            <td><?=rp($value->harga_jualpro)?></td>
        </tr>
        <?php
    }
    ?>
</table>