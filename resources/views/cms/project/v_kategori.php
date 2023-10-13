<?= $this->extend("cms/layout/v_template") ?>

<?= $this->section("title") ?>
<title>Kategori - SmartSys</title>
<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Kategori</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="<?php echo base_url('/') ?>">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('/datakategori') ?>">Data Kategori</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title"><?= $title; ?></h4>
            <div class="ml-auto">
              <button type="button" class="btn btn-icon btn-round btn-info mr-1" data-toggle="modal" data-target="#importModal">
                <i class="fa fa-regular fa-download"></i>
              </button>
              <button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#exportModal">
                <i class="fa fa-regular fa-upload"></i>
              </button>
            </div>
            <a href="<?php echo base_url('/datakategori/tambah') ?>" type="button" class="btn btn-primary btn-round ml-2" <?php if ($_SESSION['role'] == "superadmin") {
                                                                                                                            echo "hidden";
                                                                                                                          } ?>><i class="fa fa-plus"></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: <?php if ($_SESSION['role'] != "superadmin") {
                                      echo "14%";
                                    } else {
                                      echo "23%";
                                    } ?>; text-align: center;">No</th>
                  <th style="text-align: center;">Kategori</th>
                  <?php if ($_SESSION['role'] != "superadmin") { ?>
                    <th style="width: 20%; text-align: center;">Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($kategori as $ktg) : ?>
                  <tr>
                    <th scope="row" style="text-align: center;"><?= $no++ ?></th>
                    <td style="text-align: center;"><?= $ktg["nama_kategori"] ?></td>
                    <?php if ($_SESSION['role'] != "superadmin") { ?>
                      <td style="text-align: center;">
                        <div class="form-button-action">
                          <a href="<?php echo base_url('/datakategori/ubah/') . "/" . $ktg["id_kategori"] ?>">
                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Ubah">
                              <i class="fa fa-edit"></i>
                            </button>
                          </a>
                          <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" onclick="hapus(<?= $ktg["id_kategori"] ?>)" data-original-title="Hapus">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    <?php } ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="importModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Import Data Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Template Data</h5>
        <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon">
          <li class="nav-item">
            <a class="" href="<?= base_url('assets/template/kategori/Template-Data-Kategori.csv') ?>">
              <button type="button" class="btn btn-outline-primary" style="width: 90px; text-align: center;">
                <i class="fa fa-file-code"></i>
                CSV
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="" href="<?= base_url('assets/template/kategori/Template-Data-Kategori.xlsx') ?>">
              <button type="button" class="btn btn-outline-primary" style="width: 90px; text-align: center;">
                <i class="fa fa-file-excel"></i>
                EXCEL
              </button>
            </a>
          </li>
        </ul>
        <br>
        <h6 class="float-right">*Tekan untuk mengunduh template</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-round float-right mr-2" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary btn-round float-right mr-2" data-toggle="modal" data-target="#inputModal" data-dismiss="modal">Import Data</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Import -->

<!-- Modal Export -->
<div class="modal fade" id="exportModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Export Data Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon">
          <li class="nav-item">
            <a class="" href="<?= base_url('/datakategori/exportcsv') ?>">
              <button type="button" class="btn btn-outline-primary" style="width: 90px; text-align: center;">
                <i class="fa fa-file-code"></i>
                CSV
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="" href="<?= base_url('/datakategori/exportexcel') ?>">
              <button type="button" class="btn btn-outline-primary" style="width: 90px; text-align: center;">
                <i class="fa fa-file-excel"></i>
                EXCEL
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="" href="<?= base_url('/datakategori/exportpdf') ?>">
              <button type="button" class="btn btn-outline-primary" style="width: 90px; text-align: center;">
                <i class="fa fa-file-pdf"></i>
                PDF
              </button>
            </a>
          </li>
        </ul>
        <br>
        <h6 class="float-right">*Tekan untuk mengunduh</h6>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Export -->

<!-- Modal Input -->
<div class="modal fade" id="inputModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Input File Data Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('/datakategori/import') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="modal-body">
          <div class="form-group">
            <label for="file_import">Import File</label>
            <input type="file" class="form-control-file" id="file_import" name="file_import" required>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger float-right mr-2" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-outline-success float-right mr-2">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Input -->
<?= $this->endSection() ?>

<?= $this->section("content_js") ?>
<script>
  $(document).ready(function() {
    // Add Row
    $('#add-row').DataTable({
      "pageLength": 5,
    });

    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

  });

  function hapus(id) {
    Swal.fire({
      title: 'Peringatan!!!',
      text: "apakah anda yakin ingin menghapus Data Kategori ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: '<?= base_url('/datakategori') . "/" ?>' + id,
          method: 'delete',
          success: function(response) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil Menghapus Data!',
              text: response.message,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Oke',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload(true);
              }
            })
            fetchAllPosts();
          }
        });
      }
    });
  }

  <?php if (session()->getFlashdata('berhasil_tambah') != NULL) { ?>
    Swal.fire({
      icon: 'success',
      title: 'Data Berhasil Ditambahkan!',
      confirmButtonColor: '#1572E8',
    });
  <?php } ?>

  <?php if (session()->getFlashdata('berhasil_import') != NULL) { ?>
    Swal.fire({
      icon: 'success',
      title: 'Data Berhasil Diimport!',
      confirmButtonColor: '#1572E8',
    });
  <?php } ?>

  <?php if (session()->getFlashdata('gagal_import') != NULL) { ?>
    Swal.fire({
      icon: 'error',
      title: 'Data Anda Tidak Sesuai!',
      confirmButtonColor: '#1572E8',
    });
  <?php } ?>
</script>
<?= $this->endSection() ?>