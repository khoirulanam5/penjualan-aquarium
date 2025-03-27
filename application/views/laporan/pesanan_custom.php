<table border="solid">
    <thead style="background-color: lightblue;">
        <tr>
            <th style="">No Resi </th>
            <th style="">Tanggal</th>
            <th>Jumlah</th>
            <th>Panjang (cm)</th>
            <th>Lebar (cm)</th>
            <th>Tinggi (cm)</th>
            <th>Ketebalan Kaca (mm)</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            if (!empty($datas)) {
                
                $total = json_decode($datas->data_produk);
                
                if($datas->status_kirim == 1){
                    $pengiriman = "Proses dikirim";
                }elseif($datas->status_kirim == 2){
                    $pengiriman = "Paket sudah diterima";
                }else{
                    $pengiriman = "Pembayaran belum diverifikasi";
                }
                if(!empty($total->custom)){
                    foreach ($total->custom as $key => $value) {
                    ?>
                    <tr id="<?= $datas->no_transaksi ?>">
                        <?php
                            
                            echo "<td>" . strtoupper($datas->no_transaksi) . "</td>";
                            echo "<td>" . date("d-m-Y",strtotime($value->tanggal)) . "</td>";
                            echo "<td>".$value->jumlah."</td>";
                            echo "<td>".$value->panjang."</td>";
                            echo "<td>".$value->lebar."</td>";
                            echo "<td>".$value->tinggi."</td>";
                            echo "<td>".$value->ketebalan_kaca."</td>";
                            echo "<td>".$value->keterangan."</td>";
                        ?>

                    </tr>
                    <?php $no++;
                        }
                    }
                } 
            ?>
    </tbody>
</table>