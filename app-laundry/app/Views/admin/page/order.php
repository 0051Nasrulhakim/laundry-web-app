<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .table th,
    .table td {

        max-width: 150px;
        /* Atur lebar maksimum */
        word-wrap: break-word;
        /* Memastikan teks dapat terputus */
        overflow-wrap: break-word;
        /* Alternatif untuk dukungan browser */
        white-space: normal;
        /* Pastikan teks dapat terbungkus */
    }

    .table td {
        overflow: hidden;
        /* Sembunyikan overflow jika ada */
        text-overflow: ellipsis;
        /* Gunakan elipsis jika terlalu panjang */
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

                        <div class="form-group">
                            <label for="inputNama" class="col-form-label">Nama Pelayanan</label>
                            <select id="item" class="form-control" name="item" style="border: 1 px solid; black"></select>
                        </div>

                        <div class="section" style="display: flex;">
                            <div class="left" style="width: 50%; margin-right: 3%;">
                                <div class="form-group">
                                    <label for="harga" class="col-form-label">Harga</label>
                                    <input
                                        type="number"
                                        id="harga"
                                        class="form-control"
                                        style="border: 1px solid grey; padding: 1%;"
                                        name="harga" readonly>
                                </div>
                            </div>
                            <div class="right" style="width: 44%;">
                                <div class="form-group">
                                    <label for="inputNama" class="col-form-label">Jumlah</label>
                                    <input
                                        type="number"
                                        id="inputNama"
                                        class="form-control"
                                        style="border: 1px solid grey; padding: 1%;"
                                        name="jumlah">
                                </div>
                            </div>
                        </div>

                        <div class="btn" style="text-align: center; width: 100%; margin-top: 5%;">
                            <button class="btn btn-sm btn-success">Add to cart</button>
                        </div>
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


<script>
    $(document).ready(function() {
        // Initialize select2
        $('#item').select2({
            placeholder: 'Pilih Pelayanan',
            ajax: {
                url: '<?= base_url('crud/search'); ?>', // URL untuk pencarian data
                dataType: 'json',
                delay: 150,
                processResults: function(data) {
                    console.log(data)
                    return {
                        results: data
                    };
                },
                data: function(params) {
                    console.log(params)
                    // Jika params.term tidak ada, kirimkan string kosong
                    var query = {
                        term: params.term || '' // Default ke string kosong jika tidak ada input
                    };
                    console.log(query); // Untuk debugging, lihat apa yang dikirim
                    return query;
                },
                cache: true
            }
        });

        // When item is selected, fetch data via AJAX
        $('#item').on('change', function() {
            var itemId = $(this).val();
            if (itemId) {
                $.ajax({
                    url: '<?= base_url('crud/detail'); ?>/' + itemId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            console.log(response)
                            // $('#name').val(response.name);
                            $('#harga').val(response.harga);
                        }
                    }
                });
            }
        });
    });
</script>


<?= $this->endSection(); ?>