<a href="index?m=surat_cari">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Hasil Pencarian <?= ucwords($_GET['jenis']); ?></h1>
<hr>

<?php 
  $kategori = ($_GET['kategori'] != 'semua') ? $_GET['kategori'] : '';

  if ($_GET['jenis']=='Surat Masuk') {
      // query utk surat masuk
      $rows = $db->get_results("SELECT tb_surat.id, tb_surat.tgl_buat, tb_surat.kategori, tb_pengguna.username as pembuat, tb_surat.disposisi, tb_surat.file from tb_surat JOIN tb_pengguna ON tb_pengguna.id = tb_surat.id_pembuat WHERE jenis_surat LIKE '%$_GET[jenis]%' AND tb_surat.tgl_buat BETWEEN '$_GET[tgl_dari]' AND '$_GET[tgl_sampai]' AND tb_surat.kategori LIKE '%$kategori%'");
  }else{
      // query utk surat keluar
      $rows = $db->get_results("SELECT tb_surat.id, tb_surat.tgl_buat, tb_dtsuratkeluar.no_surat, tb_surat.kategori, tb_pengguna.username as pembuat, tb_surat.disposisi, tb_dtsuratkeluar.isi, tb_surat.file from tb_surat JOIN tb_pengguna ON tb_pengguna.id=tb_surat.id_pembuat JOIN tb_dtsuratkeluar ON tb_dtsuratkeluar.id_surat = tb_surat.id WHERE tb_surat.jenis_surat LIKE '%$_GET[jenis]%' AND tb_surat.tgl_buat BETWEEN '$_GET[tgl_dari]' AND '$_GET[tgl_sampai]'
        AND tb_surat.kategori LIKE '%$kategori%'");
  }
?>

<!-- DataTable -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="row mb-3">
      <div class="col">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalFilterPencarian">
          Lihat Filter Pencarian
        </button>
      </div>
    </div>

    <div class="table-responsive">
      <!-- utk menggunakan datatableJS tambahkan atribute id="dataTable" -->
      <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable"> 
          <!-- template table surat -->
        <?php if ($_GET['jenis'] == 'Surat Masuk'): ?>
          <!-- template table surat masuk -->
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Kategori</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
            </thead>
          <tbody>
            <?php foreach ($rows as $row): ?>
              <tr>
                <td><?= date('d M Y', strtotime($row->tgl_buat)); ?></td>
                <td><?= $row->kategori; ?></td>
                <td><?= $row->disposisi; ?></td>
                <td>
                  <button type="button"  class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#detailModal<?= $row->id; ?>">Detail</button>
                  <a href="../img/berkas/<?= $row->file; ?>" class="btn btn-sm btn-outline-success" download>Unduh</a>
                  <a href="aksi?act=surat_hapus&id=<?= $row->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus surat <?= $row->no_surat; ?>?')">Hapus</a>

                </td>
              </tr>
              
              <!-- Modal detail surat -->
              <div class="modal fade" id="detailModal<?= $row->id; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Surat : <br><b><?= $row->no_surat; ?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label>Kategori</label>
                          <input type="text" class="form-control" value="<?= $row->kategori; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" class="form-control" value="<?= $row->disposisi; ?>" readonly>
                        </div>
                        <img src="../img/berkas/<?= $row->file; ?>" alt="surat" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </tbody>
        <?php else: ?>  
          <!-- template table surat keluar -->
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">No Surat</th>
              <th scope="col">Kategori</th>
              <th scope="col">Disposisi</th>
              <th scope="col">Aksi</th>
            </tr>
            </thead>
          <tbody>
            <?php foreach ($rows as $row): ?>
              <tr>
                <td><?= date('d M Y', strtotime($row->tgl_buat)); ?></td>
                <td><?= $row->no_surat; ?></td>
                <td><?= $row->kategori; ?></td>
                <td><?= $row->disposisi; ?></td>
                <td>
                  <button type="button"  class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#detailModal<?= $row->id; ?>">Detail</button>
                  <a href="../templates/results/<?= $row->file; ?>" class="btn btn-sm btn-outline-success" download>Unduh</a>
                  <a href="aksi?act=surat_hapus&id=<?= $row->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus surat <?= $row->no_surat; ?>?')">Hapus</a>
                </td>
              </tr>
              
              <!-- Modal detail surat -->
              <div class="modal fade" id="detailModal<?= $row->id; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Surat : <br><b><?= $row->no_surat; ?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label>Kategori</label>
                          <input type="text" class="form-control" value="<?= $row->kategori; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>No Surat</label>
                          <input type="text" class="form-control" value="<?= $row->no_surat; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Isi Surat <br></label>
                            <div class="ml-3">
                            <?php 
                              $isi = explode('@', $row->isi); //ekstrak isi surat ke dalam array
                              foreach ($isi as $data) : ?>
                                <?= $data; ?><br>
                            <?php endforeach ?>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </tbody>
        <?php endif ?>
        
      </table>
    </div>
  </div>
</div>


<!-- Modal filter pencarian -->
<div class="modal fade" id="modalFilterPencarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Filter Pencarian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="jenis">Jenis Surat</label>
            <input type="text" class="form-control" value="<?= ucwords($_GET['jenis']); ?>" readonly>
        </div>
        <div class="form-group">
          <label for="tgl_dari">Rentang Tanggal</label>
          <input type="text" class="form-control" value="<?= date('d M Y', strtotime($_GET['tgl_dari'])).' - '.date('d M Y', strtotime($_GET['tgl_sampai'])); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori Surat</label>
            <input type="text" class="form-control" value="<?= ucwords($_GET['kategori']); ?>" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>



