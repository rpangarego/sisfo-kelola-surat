<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pencarian Laporan <?= (!$_GET['jenis']) ? 'Harian' : $_GET['jenis'] ; ?></h1>
<hr>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">

      <form method="GET">
        <input type="hidden" name="m" value="laporan_cari">
    <div class="row mb-3">
      <div class="col">
        <div class="form-group">
            <label for="tgl_dari">Dari Tanggal</label>
            <input type="date" class="form-control" id="tgl_dari" name="tgl_dari" value="<?= ($_GET['tgl_dari']) ? $_GET['tgl_dari'] : date('Y-m-d', strtotime('-30 days')) ;?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
            <label for="tgl_sampai">Sampai Tanggal</label>
            <input type="date" class="form-control" id="tgl_sampai" name="tgl_sampai" value="<?= ($_GET['tgl_sampai']) ? $_GET['tgl_sampai'] : date('Y-m-d') ;?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" class="form-control" id="jenis">
              <?php if ($_GET['jenis']): ?>
                <option hidden value="<?= $_GET['jenis']; ?>"><?= $_GET['jenis']; ?></option>
              <?php endif ?>
              <option value="Harian">Harian</option>
              <option value="Bulanan">Bulanan</option>
              <option value="Tahunan">Tahunan</option>
            </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" class="form-control" id="kategori">
              <?php if ($_GET['kategori']): ?>
                <option hidden value="<?= $_GET['kategori']; ?>"><?= $_GET['kategori']; ?></option>
              <?php endif ?>
              <option value="Surat Keluar">Surat Keluar</option>
              <option value="Surat Masuk">Surat Masuk</option>
            </select>
        </div>
      </div>
      <div class="col-auto d-flex">
        <button type="submit" class="btn btn-primary align-self-center">Submit</button>
      </div>
      </form>
    </div>

    <?php 
      // set tgl
      if (!$_GET['tgl_dari'] && !$_GET['tgl_sampai']) {
        $dari = date('m', strtotime('-30 days'));
        $sampai = date('m');
      }else{
        $dari = date('m', strtotime($_GET['tgl_dari']));
        $sampai = date('m', strtotime($_GET['tgl_sampai']));
      }

      $kategori = ($_GET['kategori']) ? $_GET['kategori'] : 'Surat Keluar';

      if (!$_GET['jenis'] || $_GET['jenis']=='Harian') {
        // laporan harian
        $rows = $db->get_results("SELECT tgl_buat, kategori,count(Kategori) AS total FROM tb_surat WHERE Month(tgl_buat) BETWEEN $dari AND $sampai AND Jenis_Surat='$kategori' GROUP BY Kategori,Right(tgl_Buat,5),Jenis_Surat ORDER BY Right(tgl_Buat,5) ASC");
      }elseif ($_GET['jenis']=='Bulanan') {
        // laporan bulanan
        $rows = $db->get_results("SELECT CASE
            WHEN Month(tgl_Buat) = 1 THEN 'Jan' WHEN Month(tgl_Buat) = 2 THEN 'Feb'
            WHEN Month(tgl_Buat) = 3 THEN 'Mar' WHEN Month(tgl_Buat) = 4 THEN 'Apr'
            WHEN Month(tgl_Buat) = 5 THEN 'May' WHEN Month(tgl_Buat) = 6 THEN 'Jun'
            WHEN Month(tgl_Buat) = 7 THEN 'Jul' WHEN Month(tgl_Buat) = 8 THEN 'Ags'
            WHEN Month(tgl_Buat) = 9 THEN 'Sep' WHEN Month(tgl_Buat) = 10 THEN 'Okt'
            WHEN Month(tgl_Buat) = 11 THEN 'Nov' WHEN Month(tgl_Buat) = 12 THEN 'Des' 
            END AS 'bulan',
            kategori,count(kategori)as total from tb_surat
            where Month(tgl_buat) Between $dari and $sampai AND Jenis_Surat='$_GET[kategori]' group by kategori,month(Tgl_Buat) order by kategori Asc");
      }else{
        // laporan tahunan
        $rows = $db->get_results("SELECT Year(tgl_buat)as 'tahun',kategori,count(kategori)as total from tb_surat where Month(tgl_buat) Between $dari and $sampai AND Jenis_Surat='$_GET[kategori]' group by Kategori,Year(Tgl_Buat) order by kategori ASC");
      }
    ?>

    <div class="table-responsive">
      <!-- utk menggunakan datatableJS tambahkan atribute id="dataTable" -->
      <table class="table table-hover" width="100%" cellspacing="0"> 
        <thead>
          <tr>
              <th scope="col">No.</th>
        <?php if ($_GET['jenis']=='Bulanan'): ?>
              <th>Bulan/Tahun</th>
        <?php elseif ($_GET['jenis']=='Tahunan') : ?>
              <th>Tahun</th>
        <?php else: ?>
              <th>Tanggal</th>
        <?php endif ?>
              <th>Keterangan</th>
              <th>Total</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $total=0; if (count($rows) > 0): ?>
            <?php foreach ($rows as $row): ?>
              <tr>
                <th><?= ++$i; ?></th>
                <?php if ((!$_GET['jenis'] || $_GET['jenis']=='Harian')): ?>
                  <td><?= date('d M', strtotime($row->tgl_buat)); ?></td>
                <?php elseif ($_GET['jenis']=='Bulanan') : ?>
                  <td><?= $row->bulan; ?></td>
                <?php elseif ($_GET['jenis']=='Tahunan') : ?>
                  <td><?= $row->tahun; ?></td>
                <?php endif ?>
              
                <td><?= $row->kategori; ?></td>
                <td><?php echo $row->total;  $total += $row->total; ?></td>
              </tr> 
            <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
          <?php endif ?>
          
         
        </tbody>
      </table>
    </div>

    <div class="row">
      <?php if (count($rows) > 0): ?>
        <div class="col">
          <span>Total Laporan <?= $_GET['jenis'].' '.$_GET['kategori'].' '.$total ?>  </span>
        </div>
        <div class="col">
          <a href="laporan_unduh?tgl_dari=<?= $_GET['tgl_dari']; ?>&tgl_sampai=<?= $_GET['tgl_sampai']; ?>&jenis=<?= $_GET['jenis']; ?>&kategori=<?= $_GET['kategori']; ?>" class="btn btn-outline-primary float-right">Unduh Laporan</a>
        </div>  
      <?php endif ?>
    </div>
  </div>
</div>

