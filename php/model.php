<?php
// Mulai-Tampil semua data
function getData($nama_table)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $sql = "SELECT * FROM " . $table_name;
    $query = $wpdb->get_results($sql);
    return $query;
}
// Selesai-Tampil semua data

// Mulai-Tampil data berdasarkan id
function getDataId($nama_table, $id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $sql = "SELECT * FROM " . $table_name . " WHERE id=" . $id;
    $query = $wpdb->get_row($sql);
    return $query;
}
// Selesai-Tampil data berdasarkan id

// Mulai-Tambah data
function addData($nama_table, $data = array())
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $wpdb->insert($table_name, $data);
    $id_insert = $wpdb->insert_id;
    return $id_insert;
}
// Selesai-Tambah data

// Mulai-Hapus data
function deleteData($nama_table, $where = array())
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $delete = $wpdb->delete($table_name, $where);
    return $delete;
}
// Selesai-Hapus data