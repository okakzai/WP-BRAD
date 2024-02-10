<div class="container-fluid pt-3">
    <div class="d-flex align-items-center justify-content-between border-bottom border-dark mb-3 pb-1">
        <h3>WP BRAD</h3>
        <button data-toggle="modal" data-target="#tambahModal" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
    </div>

    <!-- Mulai-Modal Form Tambah -->
    <div class="modal fade mt-5" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Add Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Name</label>
                            <input class="col-9 form-control" type="text" name="nama" placeholder="Enter a name">
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Address</label>
                            <input class="col-9 form-control" type="text" name="alamat" placeholder="Enter the address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Selesai-Modal Form Tambah -->

    <!-- Mulai-Notifikasi -->
    <?php if (isset($notifikasi)) echo $notifikasi; ?>
    <!-- Selesai-Notifikasi -->

    <!-- Mulai-Tabel tampil data -->
    <table class="table" id="brad">
        <thead class="bg-dark text-white">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $tampilSemuaData = getData('wp_brad');
            foreach ($tampilSemuaData as $data) {
                $id = $data->id;
                $tampilDataId = getDataId('wp_brad', $id);
            ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $data->name; ?></td>
                    <td><?= $data->address; ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#hapusModal<?= $id; ?>" class="btn btn-danger mb-1"><i class="fa fa-trash"></i> Delete</button>
                    </td>
                </tr>

                <!-- Mulai-Modal Form Hapus -->
                <div class="modal fade mt-5" id="hapusModal<?= $id; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <form action="" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Delete Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-5">
                                    <input hidden type="text" name="aksi" value="hapus">
                                    <input hidden type="text" name="id" value="<?= $tampilDataId->id; ?>">
                                    <div class="form-group row justify-content-between">
                                        <label class="col-4 col-form-label">Name</label>
                                        <label class="col-6 col-form-label text-right"><span class="badge badge-primary"><?= $tampilDataId->name; ?></span></label>
                                    </div>
                                    <div class="form-group row justify-content-between">
                                        <label class="col-4 col-form-label">Address</label>
                                        <label class="col-6 col-form-label text-right"><span class="badge badge-primary"><?= $tampilDataId->address; ?></span></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Selesai-Modal Form Hapus -->
            <?php } ?>
        </tbody>
    </table>
    <!-- Selesai-Tabel tampil data -->
</div>