<div class="row">
  <div class="col-12 grid-margin">
    <div class="card" style="background: #2c2d30;">
      <div class="card-body">
        <div class="row mb-3">
          <div class="col">
            <h4 class="card-title text-white">Tambah Project</h4>
          </div>
          <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-white" style="background: #2c2d30;">

            <form action="" method="POST" enctype="multipart/form-data">
                        <input type="text" value="" name="id_user" hidden>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea class="form-control" id="alasan" name="alasan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="perihal_cuti">Perihal Cuti</label>
                            <input type="text" class="form-control" id="perihal_cuti" aria-describedby="perihal_cuti"
                                name="perihal_cuti" required>
                        </div>
                        <div class="form-group">
                            <label for="mulai">Mulai Cuti</label>
                            <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="berakhir">Berakhir Cuti</label>
                            <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir"
                                name="berakhir" required>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
