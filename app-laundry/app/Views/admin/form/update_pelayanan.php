<?= $this->extend('admin/index') ?>
<?= $this->section('content') ?>


<div class="card-body">
    <div class="row">
        <div class="col-lg-12">

            <div class="d-flex flex-column h-100">
                <h3 class="font-weight-bolder mb-3">Form Update Pelayanan</h3>

                <div class="form" style="border: 1px solid #ced4da; padding: 1.5%; border-radius: 6px; width: 65%;">

                    <form action="<?= base_url() ?>crud/updatePelayanan" method="post">
                        <input
                            type="text"
                            id="inputNama"
                            class="form-control"
                            style="border: 1px solid grey; padding: 1%;"
                            name="id_prod_jasa"
                            value="<?= $pelayanan['id_prod_jasa'] ?>">
                        <div class="row align-items-center mb-2">

                            <div class="col-3">
                                <label for="inputNama" class="col-form-label">Nama Pelayanan</label>
                            </div>

                            <div class="col-9">
                                <input
                                    type="text"
                                    id="inputNama"
                                    class="form-control"
                                    style="border: 1px solid grey; padding: 1%;"
                                    name="nama_jasa_pelayanan"
                                    value="<?= $pelayanan['nama_jasa_pelayanan'] ?>">
                            </div>

                            <?php if (isset(session()->getFlashdata('errors')['nama_jasa_pelayanan'])): ?>
                                <div class="error" style="color: red; margin-left: 26%">
                                    <?= esc(session()->getFlashdata('errors')['nama_jasa_pelayanan']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="row align-items-center mb-2">
                            <div class="col-3">
                                <label for="inputNama" class="col-form-label">Harga</label>
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="inputNama"
                                    class="form-control"
                                    style="border: 1px solid grey; padding: 1%;"
                                    name="harga"
                                    value="<?= $pelayanan['harga'] ?>">
                            </div>

                            <?php if (isset(session()->getFlashdata('errors')['harga'])): ?>
                                <div class="error" style="color: red; margin-left: 26%">
                                    <?= esc(session()->getFlashdata('errors')['harga']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="row align-items-center mb-2">
                            <div class="col-3">
                                <label for="inputNama" class="col-form-label">Satuan</label>
                            </div>
                            <div class="col-9">
                                <input
                                    type="text"
                                    id="inputNama"
                                    class="form-control"
                                    style="border: 1px solid grey; padding: 1%;"
                                    name="satuan"
                                    value="<?= $pelayanan['satuan'] ?>">

                            </div>

                            <?php if (isset(session()->getFlashdata('errors')['satuan'])): ?>
                                <div class="error" style="color: red; margin-left: 26%">
                                    <?= esc(session()->getFlashdata('errors')['satuan']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="btn-form" style="text-align: right; margin-top: 4%;">
                            <button class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>