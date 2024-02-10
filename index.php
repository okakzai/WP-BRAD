<?php

/**
 * Plugin Name: WP BRAD
 * Description: WP BRAD (Browse, Read, Add, Delete) is a wordpress plugin offers comprehensive functionality for effortlessly managing content. This plugin enables users to browse, create, display, and delete data. Data showing using Data Tables and can exported to Excel & PDF file.
 * Author: MajuAppZ
 * Author URI: https://fastwork.id/user/majuappz
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

// Act on plugin activation
register_activation_hook(__FILE__, "activate_myplugin");
function activate_myplugin()
{
    // Insert DB Tables
    init_db_myplugin();
}

// Initialize DB Tables
function init_db_myplugin()
{
    global $table_prefix, $wpdb;
    $customerTable = $table_prefix . 'wp_brad';

    // Create Customer Table if not exist
    if ($wpdb->get_var("show tables like '$customerTable'") != $customerTable) {
        // Query - Create Table
        $sql = "CREATE TABLE `$customerTable` (";
        $sql .= " `id` int(11) NOT NULL auto_increment, ";
        $sql .= " `name` varchar(500) NOT NULL, ";
        $sql .= " `address` varchar(150), ";
        $sql .= " `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, ";
        $sql .= " `updated_at` timestamp NULL,";
        $sql .= " PRIMARY KEY (`id`) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
        // Include Upgrade Script
        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        // Create Table
        dbDelta($sql);
    }
}

// Act on plugin de-activation
register_deactivation_hook(__FILE__, "deactivate_myplugin");
function deactivate_myplugin()
{
    // Delete DB Tables
    delete_db_myplugin();
}

// Delete DB Tables
function delete_db_myplugin()
{
    global $table_prefix, $wpdb;
    $customerTable = $table_prefix . 'wp_brad';

    // Query - Delete Table
    $sql = "DROP TABLE IF EXISTS `$customerTable` ;";
    // Delete Table
    $wpdb->query($sql);
}

define('ADMIN_', plugin_dir_path(__FILE__) . '/views/admin/');
define('LANDING_', plugin_dir_path(__FILE__) . '/views/landing/');
include 'php/helper.php';
include 'php/model.php';
include 'php/admin.php';
include 'php/landing.php';

// Mulai-Menyambungkan CSS dan JS ke WP Plugin
// Hooknya Backend admin_enqueue_scripts
// Hooknya Frontend wp_enqueue_scripts
add_action('admin_enqueue_scripts', 'admin_');
function admin_()
{
    wp_enqueue_style('brad_bs_css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('brad_dt_css', 'https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css');
    wp_enqueue_style('brad_dt_button_css', 'https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css');
    wp_enqueue_style('brad_custom_css', plugins_url('/css/custom-min.css', __FILE__, array(), rand(), true));

    wp_enqueue_script('brad_bs_js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js');
    wp_enqueue_script('brad_fa_js', 'https://kit.fontawesome.com/c00efe6860.js');
    wp_enqueue_script('brad_dt_js', 'https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js');
    wp_enqueue_script('brad_dt_button_js', 'https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js');
    wp_enqueue_script('brad_dt_zip_js', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js');
    wp_enqueue_script('brad_dt_pdf_js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
    wp_enqueue_script('brad_dt_pdf_font_js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
    wp_enqueue_script('brad_dt_button_html_js', 'https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js');
    wp_enqueue_script('brad_dt_print_js', 'https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js');

    wp_enqueue_script('brad_custom_js', plugins_url('/js/custom-min.js', __FILE__, array(), rand(), true));
}

add_action('wp_enqueue_scripts', 'landing_');
function landing_()
{
    wp_enqueue_style('brad_bs_css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('brad_dt_css', 'https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css');
    wp_enqueue_style('brad_dt_button_css', 'https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css');
    wp_enqueue_style('brad_custom_css', plugins_url('/css/custom-min.css', __FILE__, array(), rand(), true));

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.0.js');
    wp_enqueue_script('brad_bs_js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js');
    wp_enqueue_script('brad_fa_js', 'https://kit.fontawesome.com/c00efe6860.js');
    wp_enqueue_script('brad_dt_js', 'https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js');
    wp_enqueue_script('brad_dt_button_js', 'https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js');
    wp_enqueue_script('brad_dt_zip_js', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js');
    wp_enqueue_script('brad_dt_pdf_js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
    wp_enqueue_script('brad_dt_pdf_font_js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
    wp_enqueue_script('brad_dt_button_html_js', 'https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js');
    wp_enqueue_script('brad_dt_print_js', 'https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js');

    wp_enqueue_script('brad_custom_js', plugins_url('/js/custom-min.js', __FILE__, array(), rand(), true));
}
// Selesai-Menyambungkan CSS dan JS ke WP Plugin