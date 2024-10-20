<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>



<div class="card-body">
    <div class="row">
        <div class="col-lg-12">

            <div class="d-flex flex-column h-100">
                <h3 class="font-weight-bolder mb-0 text-center">List Harga Orderan Masuk</h3>

                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Pemilik</th>
                            <th style="width: 15%;">Harga</th>
                            <!-- <th style="text-align: center;">Alamat</th> -->
                            <!-- <th style="text-align: center;">No Hp</th> -->
                            <th style="text-align: center;">Tanggal Order</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $list_order_masuk): ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $list_order_masuk['nama_pembeli'] ?></td>
                                <td><?= formatRupiah($list_order_masuk['total_harga_transaksi']) ?></td>
                                <td><?= tanggal_indo($list_order_masuk['tanggal_order']) ?></td>
                                <td><?php
                                    if($list_order_masuk['status']==1){
                                        echo 'Order Masuk';
                                    }else if($list_order_masuk['status'] == '2'){
                                        echo 'Proses Pencucian';
                                    }else if($list_order_masuk['status'] == '3'){
                                        echo 'Proses Pengeringan';
                                    }else if($list_order_masuk['status'] == '4'){
                                        echo 'Strika Dan Lipat';
                                    }else if($list_order_masuk['status'] == '5'){
                                        echo 'Selesai';
                                    }
                                ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/invoice/').$list_order_masuk['id_transaksi']?>"><button class="btn btn-sm btn-info">Detail</button></a>
                                    <button class="btn btn-sm btn-warning" onclick="setModal('<?= $list_order_masuk['id_transaksi'] ?>', '<?= $list_order_masuk['nama_pembeli'] ?>')">Ubah Status</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/utils/modal_ubahStatus') ?>
<script>
    function setModal(id, nama) {
        // Mengisi ID ke dalam modal
        document.getElementById('modalId').value = id;
        // Mengisi Nama Pembeli ke dalam modal jika diperlukan
        document.getElementById('nama_pembeli').value = nama;
        // Menampilkan modal
        document.getElementById('customModal').style.display = 'block';
    }
</script>

<?= $this->endSection(); ?>