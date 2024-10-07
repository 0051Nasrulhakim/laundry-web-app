<?= $this->include('admin/template/header'); ?>

<body class="g-sidenav-show  bg-gray-100">

  <!-- Sidebar -->
  <?= $this->include('admin/template/sidebar'); ?>
  <!-- end Sidebar  -->
  <main class="main-content border-radius-lg ">
    <!-- Navbar -->
    <?= $this->include('admin/template/navbar'); ?>
    <!-- End Navbar -->

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12 position-relative z-index-2">
          <div class="card mb-5">
            <!-- content render-->
            <?= $this->renderSection('content'); ?>
            <!-- end content render -->
          </div>
        </div>

      </div>



      <!-- util footer -->
      <?= $this->include('admin/template/util-footer'); ?>
      <!-- end util footer -->

    </div>


  </main>
  <?= $this->include('admin/template/footer'); ?>