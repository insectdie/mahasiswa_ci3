<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Mahasiswa</h1>
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
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" href="<?php echo base_url('mahasiswa/create') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Baru
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-mahasiswa" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Jurusan</th>
                  <th>Program Studi</th>
                  <th>Kelas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data as $data) { ?>
                  <tr id="<?= $data->id; ?>">
                    <td><?= $no++; ?></td>
                    <td><?= $data->nim; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->alamat; ?></td>
                    <td><?= $data->no_hp; ?></td>
                    <td><?= ($data->nama_jurusan == NULL) ? '<span class="text-muted font-italic">Jurusan belum dipilih!</span>': $data->nama_jurusan; ?></td>
                    <td><?= ($data->nama_prodi == NULL) ? '<span class="text-muted font-italic">Program Studi belum dipilih!</span>': $data->nama_prodi; ?></td>
                    <td><?= $data->kelas; ?></td>
                    <td>
                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" href="<?php echo base_url('mahasiswa/edit/' . $data->id) ?>">
                          Edit
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="#">
                          Delete
                        </a>
                        <!-- <input name='id' type="text" value="<?= $data->id ?>" hidden>
                        <button type="submit" class="btn btn-danger m-1 delete-btn">
                          Delete
                        </button> -->
                      </div>
                      <!-- </form> -->
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


</div> 






