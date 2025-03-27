<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian - <?= $no_transaksi ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .nota-container { width: 100%; max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px; }
        h2, h4 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f8f8f8; }
        .btn-print { display: block; width: 100%; text-align: center; margin-top: 20px; }
        @media print {
            .btn-print { display: none; }
        }
    </style>
</head>
<body>

<div class="nota-container">
    <h2>Shopfish Aquarium</h2>
    <h4>Nota Pembelian</h4>
    <p>No. Transaksi: <b><?= $no_transaksi ?></b></p>
    <p>Tanggal: <b><?= date("d M Y", strtotime($tanggal)) ?></b></p>
    <p>Status Pembayaran: 
        <b><?= ($status_bayar == 1) ? "Lunas" : "Menunggu Verifikasi" ?></b>
    </p>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $item): ?>
                <tr>
                    <td><?= $item->nama_produk ?></td>
                    <td><?= $item->jumlah ?> pcs</td>
                    <td><?= rp($item->harga_jualpro) ?></td>
                    <td><?= rp($item->jumlah * $item->harga_jualpro) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($custom as $item): ?>
                <tr>
                    <td>Custom Order: <?= $item->panjang ?> x <?= $item->lebar ?> x <?= $item->tinggi ?> cm</td>
                    <td><?= $item->jumlah ?> pcs</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" style="text-align:right;">Total Bayar:</th>
                <th><?= rp($total_bayar) ?></th>
            </tr>
        </tfoot>
    </table>

    <button class="btn-print" onclick="window.print()">Cetak Nota</button>
</div>

</body>
</html>
