<?php

/**
 * Function menampilkan shortcode
 * Hook: add_shortcode
 */

add_shortcode('wp-brad', 'show_table');
function show_table()
{
    ob_start();
    include LANDING_ . 'tampil.php';
    return ob_get_clean();
}
