<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Mahasiswa</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="<?php echo base_url('mahasiswa'); ?>">
          <i class="fas fa-times mr-1"></i>
          Batal
        </a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('mahasiswa/create/action'); ?>">
            <div class="card-body">
              <?php 
                if (!empty(validation_errors())) {
              ?>
              <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
              </div>
              <?php 
                }
              ?>
              
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input name="nim" class="form-control" id="nim" placeholder="NIM" maxlength="7" value="<?= set_value('nim') ?>" autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input name="nama" class="form-control" id="nama" placeholder="Nama" maxlength="50" value="<?= set_value('nama') ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <input name="alamat" class="form-control" id="alamat" placeholder="Alamat" maxlength="50" value="<?= set_value('alamat') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input name="no_hp" class="form-control" id="no-hp" placeholder="Nomor HP" maxlength="15" value="<?= set_value('no_hp') ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan_id" class="form-control select-jurusan" style="width: 100%;">
                      <option value="" selected disabled>Pilih Jurusan</option>
                        <?php foreach ($jurusan as $j_data) { ?>
                        <option value="<?= $j_data->id ?>" <?= ($j_data->id == set_value('jurusan_id')) ? 'selected="selected"' : ''; ?> >(<?= $j_data->kode_jurusan ?>) <?= $j_data->nama_jurusan ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select name="prodi_id" class="form-control select-prodi" style="width: 100%;">
                      <option value="" selected disabled>Pilih Program Studi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input name="kelas" type="text" class="form-control" id="kelas" placeholder="Kelas" maxlength="7" value="<?= set_value('kelas') ?>">
                </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->