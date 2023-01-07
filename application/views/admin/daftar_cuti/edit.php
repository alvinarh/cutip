<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title">Tambah Pegawai</h4>
          </div>
          <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <form action="<?php echo base_url('/admin/Cuti/edit/') . $data->id_cuti; ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Pengajuan</label>
                <input type="date" class="form-control" name="tgl_pengajuan" value="" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Mulai Cuti</label>
                <input required type="text" class="form-control" name="mulai_cuti" value="" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Cuti Berakhir</label>
                <input required type="text" class="form-control" name="akhir_cuti" value="" required>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Pilih Keterangan Cuti:</label>
                <select name="ket_cuti" class="form-control">
                  <option value="<?= $select['id'] ?>"><?= $select['keterangan'] ?></option>
                  <?php foreach ($jenis as $pilihan) : ?>
                    <option value="<?= $pilihan['id_cuti'] ?>"><?= $pilihan['keterangan'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Pilih Pimpinan Untuk Verifikasi Cuti:</label>
                <select name="kode_pimpinan" class="form-control">
                  <option value="<?= $pilih['id'] ?>"><?= $pilih['nama_pimpinan'] ?></option>
                  <?php foreach ($nama as $pilihan) : ?>
                    <option value="<?= $pilihan['kode_pimpinan'] ?>"><?= $pilihan['nama_pimpinan'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Mulai Cuti</label>
                <input required type="text" class="form-control" name="mulai_cuti" value="" required>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-success text-right" name="submitData">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>