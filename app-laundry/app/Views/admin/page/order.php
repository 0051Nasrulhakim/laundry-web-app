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

                        <form action="<?= base_url('crud/addToCart') ?>" method="post">
                            <div class="left" style="width: 50%; margin-right: 3%;">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        id="id_prod_jasa"
                                        class="form-control"
                                        style="border: 1px solid grey; padding: 1%;"
                                        name="id_prod_jasa" readonly hidden>
                                </div>
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
                                            id="qty"
                                            class="form-control"
                                            style="border: 1px solid grey; padding: 1%;"
                                            name="qty" oninput="calculateTotal()">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="total" class="col-form-label">Total</label>
                                <input
                                    type="number"
                                    id="total"
                                    class="form-control"
                                    style="border: 1px solid grey; padding: 1%;"
                                    name="total_harga" readonly>
                            </div>

                            <div class="btn" style="text-align: center; width: 100%; margin-top: 5%;">
                                <button class="btn btn-sm btn-success">Add to cart</button>
                            </div>

                        </form>
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
                                <?php $i = 1;
                                foreach ($listCart as $list): ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="word-wrap: break-word; max-width: 200px;"><?= $list['nama_jasa_pelayanan'] ?></td>
                                        <td style="text-align: center;"><?= $list['harga'] ?></td>
                                        <td style="text-align: center;"><?= $list['qty'] ?></td>
                                        <td style="text-align: center;"><?= $list['satuan'] ?></td>
                                        <td style="text-align: center;"><?= $list['total_harga'] ?></td>
                                        <td style="text-align: center;">
                                            <button class="btn" onclick="confirmDelete('<?= base_url('/crud/deleteCart/' . $list['id']) ?>')">
                                                <i class="fa-solid fa-trash fa-lg" style="color: red;"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($listCart): ?>
                            <div class="btn-action" style="text-align: right;">
                                <button class="btn btn-warning" onclick="confirmCancel('<?= base_url('/crud/cancelCart/' . '0') ?>')">Batalkan</button>
                                <!-- <button class="btn btn-info" onclick="checkout('<?= base_url('/crud/checkout/') . date('Ymdhis') ?>')">Checkout</button> -->
                                <button class="btn btn-info" id="openModalBtn">Checkout</button>
                                <!-- <button type="button" class="btn bg-gradient-primary" id="openModalBtn">
                                    Launch demo modal
                                </button> -->
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->include('admin/utils/modal_Checkout') ?>


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
                    // console.log(data)
                    return {
                        results: data
                    };
                },
                data: function(params) {
                    // console.log('params =' + params)
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
                            console.log('res', response)
                            $('#id_prod_jasa').val(response.id_prod_jasa);
                            $('#harga').val(response.harga);
                        }
                    }
                });
            }
        });
    });

    function calculateTotal() {
        var total = 0;
        var harga = $('#harga').val();
        var input = $('#qty').val();


        // console.log(input)
        console.log(harga)
        if (harga != '') {
            total = parseInt(input) * parseInt(harga);

            $('#total').val(total);
        } else {
            alert('Pilih pelayanan terlebih dahulu');
        }
    }

    function confirmCancel(url) {
        Swal.fire({
            title: 'Apakah Anda yakin membatalkan?',
            text: "Semua Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan AJAX untuk menghapus data
                deleteData(url);
            }
        });
    }

    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan AJAX untuk menghapus data
                deleteData(url);
            }
        });
    }


    function deleteData(url) {
        $.ajax({
            url: url,
            type: 'DELETE', // atau 'POST' tergantung implementasi
            success: function(result) {
                Swal.fire(
                    'Terhapus!',
                    'Data telah berhasil dihapus.',
                    'success'
                ).then(() => {
                    // Reload halaman atau redirect
                    location.reload(); // Atau gunakan window.location.href = '/crud';
                });
            },
            error: function(xhr, status, error) {
                Swal.fire(
                    'Error!',
                    'Terjadi kesalahan saat menghapus data.',
                    'error'
                );
            }
        });
    }

    function checkout() {
        Swal.fire({
            title: 'Selesaikan Order?',
            text: "Pastikan data yang Anda masukkan sudah benar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna memilih "Yes", kirim form secara manual
                document.getElementById('checkout').submit();
            }
        });
    }
</script>


<?= $this->endSection(); ?>