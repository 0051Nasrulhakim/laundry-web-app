<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>

<div class="section-mai" style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; margin-top: 2%; margin-bottom: 2%;">
    <div class="title" style="text-align: center; font-size: 18pt; color: black; font-weight: 900;">
        INVOICE PEMBAYARAN
    </div>
    <div class="wrap-body" style="padding: 2%;">
        <div class="atasNama" style="text-align: right;">
            <div class="left">
                19 - Oktober 2024 
            </div>
        </div>
        <div class="atasNama" style="display: flex;">
            <div class="left" style="width: 27%;">
                Kode Transaksi 
            </div>
            <div class="right">
                : <?= $orderDetail['id_transaksi']; ?>
            </div>
        </div>
        <div class="atasNama" style="display: flex;">
            <div class="left" style="width: 27%;">
                Order Atas nama 
            </div>
            <div class="right">
                : <?= $orderDetail['nama_pembeli']; ?>
            </div>
        </div>
        <div class="nomorHp" style="display: flex;">
            <div class="left" style="width: 27%;">
                Nomor Hp 
            </div>
            <div class="right">
               : <?= $orderDetail['no_hp']; ?>
            </div>
        </div>
        <div class="alamat" style="display: flex;">
            <div class="left" style="width: 27%;">
                Alamat 
            </div>
            <div class="right">
                : <?= $orderDetail['alamat_pembeli']; ?>
            </div>
        </div>
        <div class="orderDetail" style="display: flex; margin-top: 2%;">
            <div class="left" style="width: 18%;">
                Item 
            </div>
            <div class="right" style="width: 100%;">
                
                <?php foreach($item as $items):?>
                <div class="itemList" style="display: flex; width: 100%;">
                    <div class="namaItem" style="width: 67%;">
                        <?= $items['nama_jasa_pelayanan']; ?>
                    </div>
                    <div class="harga" style="width: 30%;">
                        @<?= $items['harga'] ?> x <?= $items['qty'] ?>
                    </div>
                    <div class="total" style="width: 30%; text-align: right;"><?= $items['total_harga']?></div>
                </div>
                <?php endforeach;?>
                
            </div>
        </div>

        <div class="total_harga" style="text-align: right; font-size: 17pt;">
            <?= $orderDetail['total_harga_transaksi']; ?>
        </div>
        <div class="total_harga" style="text-align: center; margin-top: 2%; width: 80%; margin-left: auto; margin-right: auto;">
            Trimakasih Telah Mempercayakan Laundry pakaian anda kepada kami.
            anda dapat memantau progres laundry dengan mengecek kode transaksi pada web kami.
        </div>


    </div>

</div>
<div class="btn">
    <button class="btn btn-sm btn-success">Cetak Invoice</button>
    <button class="btn btn-sm btn-primary">Kirim Kode</button>
</div>

<?= $this->endSection(); ?>