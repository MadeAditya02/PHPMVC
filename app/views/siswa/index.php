<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS Online -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- Bootstrap CSS Offline -->
  <link rel="stylesheet" href="http://localhost/phpmvc/public/css/bootstrap.min.css">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

  <style>
    a {
      text-decoration: none;
    }
    .badge:hover {
      color: white;
      cursor: pointer;
    }
    tbody tr td a button i {
      font-size: 18px;
    }
  </style>

  <title><?php echo BASETITLE; ?></title>
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
     <a class="navbar-brand" href="<?php echo BASEURL; ?>">PHP MVC</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="navbar-nav">
         <a class="nav-link" href="<?php echo BASEURL; ?>">Home</a>
         <a class="nav-link active" aria-current="page" href="<?php echo BASEURL; ?>siswa/">Siswa</a>
         <a class="nav-link" href="<?php echo BASEURL; ?>about/">About</a>
       </div>
     </div>
   </div>
 </nav>

 <div class="container mt-4">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <h3>Daftar Siswa</h3>

      <br>

      <button type="button" class="btn btn-primary mb-2 tombolTambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-circle"></i> Tambah Data
      </button>

      <div class="input-group mb-2 mt-3">
        <input type="text" class="form-control" placeholder="Masukkan pencarian..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword">
        <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
      </div>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">NIS</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kelas</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach( $data['mhs'] as $siswa ) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $siswa['Nama']; ?></td>
              <td><?= $siswa['NIS']; ?></td>
              <td><?= $siswa['Jurusan']; ?></td>
              <td width="90"><?= $siswa['Kelas']; ?></td>
              <td>
                <a href="<?= BASEURL; ?>siswa/hapus/<?= $siswa['Id']; ?>">
                  <button type="button" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data siswa?');"><i class="bi bi-trash"></i></button>
                </a>
              </td>
              <td>
                <a href="#">
                  <button type="button" class="btn btn-warning tampilModalUbah" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $siswa['Id']; ?>" data-nama="<?= $siswa['Nama']; ?>" data-nis="<?= $siswa['NIS']; ?>" data-jurusan="<?= $siswa['Jurusan']; ?>" data-kelas="<?= $siswa['Kelas']; ?>">
                    <i class="bi bi-pencil-square"></i>
                  </button>
                </a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>siswa/tambah" method="post">
          <div class="mb-3">
            <input type="hidden" name="id" id="id">
            <label for="nama" class="form-label">Nama</label>
            <input required="required" type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input required="required" type="number" class="form-control" id="nis" name="nis">
          </div>
          <div class="mb-3">
            <label class="mb-2" for="jurusan">Jurusan</label>
            <select class="form-select" aria-label="Default select example" required="required" name="jurusan" id="jurusan">
              <option id="optjurusan" value="">Pilih Jurusan</option>
              <option value="Teknik Komputer Jaringan" id="tkj">Teknik Komputer Jaringan</option>
              <option value="Rekayasa Perangkat Lunak" id="rpl">Rekayasa Perangkat Lunak</option>
              <option value="Multimedia" id="mm">Multimedia</option>
              <option value="Desain Komunikasi Visual" id="dkv">Desain Komunikasi Visual</option>
              <option value="Animasi" id="an">Animasi</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="mb-2" for="kelas">Kelas</label>
            <select class="form-select" aria-label="Default select example" required="required" name="kelas" id="kelas">
              <option id="optkelas" value="">Pilih Kelas</option>
              <option value="X TKJ 1" class="xtkj">X TKJ 1</option>
              <option value="X TKJ 2" class="xtkj">X TKJ 2</option>
              <option value="X TKJ 3" class="xtkj">X TKJ 3</option>
              <option value="X RPL 1" class="xrpl">X RPL 1</option>
              <option value="X RPL 2" class="xrpl">X RPL 2</option>
              <option value="X RPL 3" class="xrpl">X RPL 3</option>
              <option value="X MM 1" class="xmm">X MM 1</option>
              <option value="X MM 2" class="xmm">X MM 2</option>
              <option value="X MM 3" class="xmm">X MM 3</option>
              <option value="X MM 4" class="xmm">X MM 4</option>
              <option value="X MM 5" class="xmm">X MM 5</option>
              <option value="X MM 6" class="xmm">X MM 6</option>
              <option value="X DKV" class="xdkv">X DKV</option>
              <option value="X Animasi" class="xan">X AN</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
  $(function() {

    $('.tombolTambahData').on('click', function() {
      $('#exampleModalLabel').html('Tambah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Tambah Data');
      $('#nama').val('');
      $('#nrp').val('');
      $('#email').val('');
      $('#jurusan').val('');
      $('#id').val('');
      $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/tambah');
    });


    $('.tampilModalUbah').on('click', function() {

      $('#exampleModalLabel').html('Ubah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/siswa/ubah');

      const id = $(this).data('id');
      const nama = $(this).data('nama');
      const nis = $(this).data('nis');
      const jurusan = $(this).data('jurusan');
      const kelas = $(this).data('kelas');

      $('#id').val(id);
      $('#nama').val(nama);
      $('#nis').val(nis);
      $('#jurusan').val(jurusan);
      $('#kelas').val(kelas);

    });

  });
</script>
</body>
</html>