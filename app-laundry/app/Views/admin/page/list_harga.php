<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>


<div class="card-body">
    <div class="row">
        <div class="col-lg-12">

            <div class="d-flex flex-column h-100">
                <h3 class="font-weight-bolder mb-0">List Harga Pelayanan</h3>

                <div class="btn-add mt-2 mb-2" style="width: 30%;">
                    <a href="<?= base_url('/admin/add_pelayanan') ?>"><button class="btn btn-sm btn-info">Tambah Pelayanan</button></a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Pelayanan</th>
                            <th style="width: 15%;">Harga</th>
                            <th style="text-align: center;">satuan</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($list_harga as $list):?>
                        <tr>
                            <td style="text-align: center;"> <?= $i++?> </td>
                            <td><?= $list['nama_jasa_pelayanan']; ?></td>
                            <td><?= formatRupiah($list['harga']) ?></td>
                            <td style="text-align: center;"><?= $list['satuan']; ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url('/admin/showFormUpdate/'.$list['id_prod_jasa'])?>"><button class="btn btn-sm btn-warning">Ubah</button></a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete('<?= base_url('/crud/deletePelayanan/'.$list['id_prod_jasa']) ?>')">delete</button>
                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
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
</script>


<?= $this->endSection(); ?>