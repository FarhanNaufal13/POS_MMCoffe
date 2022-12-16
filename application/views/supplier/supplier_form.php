<section class="content-header">
  <h1>
    Pemasok
    <small>Barang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i> Supplier</a></li>
    <li class="active"><?= ucfirst($page) ?> Supplier</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Supplier</h3>
      <div class="pull-right">
        <a href="<?= site_url('supplier'); ?>" class="btn btn-default btn-flat">
          <i class="fa fa-undo"> Kembali</i>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= site_url('supplier/proses') ?>" method="POST">
            <div class="form-group">
              <label>Nama Supplier *</label>
              <input value="<?= $row -> supplier_id ?>" type="hidden" name="id">
              <input class="form-control" value="<?= $row -> name ?>" type="text" name="nama" pattern="[a-z A-Z]+" required>
            </div>
            <div class="form-group">
              <label>No. Telpon Supplier *</label>
              <input class="form-control" value="<?= $row -> phone ?>" type="telp" name="no_telpon" pattern="^\d{10}$" required>
            </div>
            <div class="form-group">
              <label>Alamat Supplier *</label>
              <textarea class="form-control" name="alamat" required><?= $row -> address ?></textarea>
            </div>
            <div class="form-group">
              <label>Deskripsi Supplier *</label>
              <textarea class="form-control" name="deskripsi" required><?= $row -> description ?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name=<?=$page?> class="btn btn-success btn-flat">Simpan</button>
              <button type="reset" class="btn btn-default btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>