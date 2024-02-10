<?php

/**
 * Function menampilkan menu
 * Hook: admin_menu
 */



add_action('admin_menu', 'sidebar');
function sidebar()
{
    add_menu_page(
        'WP BRAD', //Page Title
        'WP BRAD', //Menu Title
        'manage_options', //Capability
        'wp-brad', //Slug URL
        'tampil_cb', //Callback
        'dashicons-clipboard', //Menu Icon
    );
}

function tampil_cb()
{
    $aksi = isset($_POST['aksi']) ? $_POST['aksi'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($aksi == 'hapus') {
        // Mulai-Hapus data
        $where = array('id' => $id);
        $hapusData = deleteData('wp_brad', $where);
        if ($hapusData) {
            $notifikasi = '<div class="bg bg-success text-white p-3 mb-3 rounded text-center">Data <span class="text-dark">(id: ' . $id . ')</span> deleted successfully!</div>';
        }
        // Selesai-Hapus data
    }

    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    if (!empty($nama) && !empty($alamat)) {
        $data = array(
            'name' => $nama,
            'address' => $alamat
        );
        // Mulai-Tambah data
        $tambahData = addData('wp_brad', $data);
        if ($tambahData) {
            $notifikasi = '<div class="bg bg-success text-white p-3 mb-3 rounded text-center">New data <span class="text-dark">(id: ' . $tambahData . ')</span> added successfully!</div>';
        }
        // Selesai-Tambah data
    }
    include ADMIN_ . 'tampil.php';
}
