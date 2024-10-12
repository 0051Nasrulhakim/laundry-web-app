

<!-- <button id="openModalBtn" class="custom-open-btn">Open Modal</button> -->
<form action="<?= base_url('/crud/checkout/') . date('Ymdhis') ?>" method="post" id="checkout">
  <div id="customModal" class="custom-modal">
    <div class="custom-modal-content">
      <span id="closeModalBtn" class="custom-close-btn">&times;</span>
      <h2>Konfirmasi Transaksi</h2>
      <p>
      <div class="form-group">
        <label for="nama_pembeli" class="col-form-label">Nama Pembeli</label>
        <input
          type="text"
          id="nama_pembeli"
          class="form-control"
          style="border: 1px solid grey; padding: 1%;"
          name="nama_pembeli">
      </div>
      <div class="form-group">
        <label for="no_hp" class="col-form-label">Nomor Hp</label>
        <input
          type="text"
          id="no_hp"
          class="form-control"
          style="border: 1px solid grey; padding: 1%;"
          name="no_hp">
      </div>
      <div class="form-group">
        <label for="alamat_pembeli" class="col-form-label">Alamat Pembeli</label>
        <textarea
          class="form-control"
          placeholder="Tulis Alamat Pembeli"
          id="floatingTextarea2"
          style="height: 100px; border: 1px solid grey; padding: 1%;"
          name="alamat_pembeli"></textarea>
      </div>

      <div class="btn" style="text-align: right; width: 100%;">
        <button type="button" class="btn btn-info" onclick="checkout()">Checkout</button>
      </div>
      </p>
    </div>
  </div>
</form>


<style>
  .custom-modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Semi-transparent background */
  }

  .custom-modal-content {
    background-color: #fff;
    margin: 2% auto;
    padding: 20px;
    border-radius: 8px;
    width: 88%;
    max-width: 500px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    position: relative;
  }

  .custom-close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
  }

  .custom-open-btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

<script>
  const openModalBtn = document.getElementById('openModalBtn');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const customModal = document.getElementById('customModal');

  openModalBtn.addEventListener('click', () => {
    customModal.style.display = 'block';
  });

  closeModalBtn.addEventListener('click', () => {
    customModal.style.display = 'none';
  });
</script>