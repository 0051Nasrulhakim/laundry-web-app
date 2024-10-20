
<!-- Modal Ubah Status -->
<form action="<?= base_url('crud/ubahStatus') ?>" method="post" id="ubahStatus">
  <div id="customModal" class="custom-modal">
    <div class="custom-modal-content">
      <span id="closeModalBtn" class="custom-close-btn">&times;</span>
      <h2>Ubah Status Transaksi</h2>
      <p>
      <div class="form-group">
        <label for="nama_pembeli" class="col-form-label">Nama Pembeli</label>
        <input
          type="text"
          id="nama_pembeli"
          class="form-control"
          style="border: 1px solid grey; padding: 1%;"
          name="nama_pembeli" readonly disabled>
      </div>
      <!-- <div class="form-group"> -->
        <!-- <label for="no_hp" class="col-form-label">Id</label> -->
        <input
          type="text"
          id="modalId"
          class="form-control"
          style="border: 1px solid grey; padding: 1%;"
          name="id" hidden>
      <!-- </div> -->
      <div class="form-group">
        <label for="alamat_pembeli" class="col-form-label">Status</label>
        <Select class="form-select" name="status">
            <option value="2">Proses Pencucian</option>
            <option value="3">Pengeringan</option>
            <option value="4">Strika & Lipat</option>
            <option value="5">Selesai</option>
        </Select>
      </div>

      <div class="btn" style="text-align: right; width: 100%;">
        <button type="submit" class="btn btn-info">Ubah Status</button>
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
  const closeModalBtn = document.getElementById('closeModalBtn');
  const customModal = document.getElementById('customModal');

  // Fungsi untuk menutup modal
  closeModalBtn.addEventListener('click', () => {
    customModal.style.display = 'none';
    document.getElementById('modalId').value = ''; // Mengosongkan ID saat modal ditutup
    document.getElementById('nama_pembeli').value = ''; // Mengosongkan nama saat modal ditutup
  });

  // Menutup modal jika user mengklik di luar modal
  window.onclick = function(event) {
    if (event.target == customModal) {
      customModal.style.display = 'none';
      document.getElementById('modalId').value = '';
      document.getElementById('nama_pembeli').value = '';
    }
  }
</script>
