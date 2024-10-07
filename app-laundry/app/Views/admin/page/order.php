<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>

<style>
    .table th,
    .table td {
        
        max-width: 150px; /* Atur lebar maksimum */
        word-wrap: break-word; /* Memastikan teks dapat terputus */
        overflow-wrap: break-word; /* Alternatif untuk dukungan browser */
        white-space: normal; /* Pastikan teks dapat terbungkus */
    }

    .table td {
        overflow: hidden; /* Sembunyikan overflow jika ada */
        text-overflow: ellipsis; /* Gunakan elipsis jika terlalu panjang */
    }
</style>

<div class="card-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-column h-100">
                <h3 class="font-weight-bolder mb-0">Halaman Order</h3>

                <div class="section-order" style="border: 1px solid #ced4da; padding: 0.4%; border-radius: 7px; margin-top: 1%; display: flex;">
                    <div class="left" style="width: 33%; margin-right: 1%; border: 1px solid; padding: 0.5%;">
                        <div class="title" style="text-align: center; font-size: 14pt; font-weight: bolder; background-color: green; color: black;">
                            Order item
                        </div>
                        left
                    </div>
                    <div class="right" style="width: 68%; border: 1px solid; padding: 0.5%;">
                        <div class="title" style="text-align: center; font-size: 14pt; font-weight: bolder; background-color: yellow; color: black;">
                            Cart Order
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th style="width: 20%;">Nama</th>
                                    <th style="text-align: center;">Harga</th>
                                    <th style="width: 3%; text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Satuan</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td style="word-wrap: break-word; max-width: 200px;">Boneka besar ukuran manusia</td>
                                    <td style="text-align: center;">200.000</td>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;">Kg</td>
                                    <td style="text-align: center;">200.000</td>
                                    <td style="text-align: center;">
                                        <button class="btn">
                                            <i class="fa-solid fa-trash fa-lg" style="color: red;"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td style="word-wrap: break-word; max-width: 200px;">Boneka besar ukuran manusia</td>
                                    <td style="text-align: center;">200.000</td>
                                    <td style="text-align: center;">2</td>
                                    <td style="text-align: center;">Kg</td>
                                    <td style="text-align: center;">200.000</td>
                                    <td style="text-align: center;">
                                        <button class="btn">
                                            <i class="fa-solid fa-trash fa-lg" style="color: red;"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-action" style="text-align: right;">
                            <button class="btn btn-warning">Batalkan</button>
                            <button class="btn btn-info">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
