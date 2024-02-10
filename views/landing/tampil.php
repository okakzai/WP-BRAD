<div class="container-fluid pt-3">
    <div class="d-flex align-items-center justify-content-between border-bottom border-dark mb-3 pb-1">
        <h3>WP BRAD</h3>
        <buttton onclick="window.location = 'https://t.me/didinstudio';" class="btn btn-primary "><i class="fa fa-telegram"></i> Developer</buttton>
    </div>

    <!-- Mulai-Tabel tampil data -->
    <table class="table" id="brad">
        <thead class="bg-dark text-white">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $tampilSemuaData = getData('wp_brad');
            foreach ($tampilSemuaData as $data) {
            ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $data->name; ?></td>
                    <td><?= $data->address; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Selesai-Tabel tampil data -->
</div>