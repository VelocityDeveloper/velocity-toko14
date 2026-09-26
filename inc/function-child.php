<?php

/**
 * Fuction yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('after_setup_theme', 'velocitychild_theme_setup', 9);

function velocitychild_theme_setup()
{


    //remove action from Parent Theme
    remove_action('justg_header', 'justg_header_menu');
    remove_action('justg_do_footer', 'justg_the_footer_open');
    remove_action('justg_do_footer', 'justg_the_footer_content');
    remove_action('justg_do_footer', 'justg_the_footer_close');
    remove_theme_support('widgets-block-editor');
}

if (!function_exists('justg_header_open')) {
    function justg_header_open()
    {
        echo '<header id="wrapper-header">';
        echo '<div id="wrapper-navbar" class="px-0" itemscope itemtype="http://schema.org/WebSite">';
    }
}
if (!function_exists('justg_header_close')) {
    function justg_header_close()
    {
        echo '</div>';
        echo '</header>';
    }
}

///add action builder part
add_action('justg_header', 'justg_header_toko14');
function justg_header_toko14()
{
    require_once(get_stylesheet_directory() . '/inc/part-header.php');
}
add_action('justg_do_footer', 'justg_footer_toko14');
function justg_footer_toko14()
{
    require_once(get_stylesheet_directory() . '/inc/part-footer.php');
}

add_action('justg_before_wrapper_content', 'justg_before_wrapper_content');
function justg_before_wrapper_content()
{
    echo '<div class="px-2">';
    echo '<div class="card rounded-0 border-0 p-2 container mx-auto">';
}
add_action('justg_after_wrapper_content', 'justg_after_wrapper_content');
function justg_after_wrapper_content()
{
    echo '</div>';
    echo '</div>';
}


/**
 * Halaman Katalog & Profil Saya VD Store (Pengaturan VD Store > Halaman, halaman ber-[wp_store_catalog]
 * / [wp_store_profile], atau template katalog tema) selalu tampil penuh tanpa sidebar.
 */
function velocity_toko14_halaman_penuh()
{
    if (!is_page()) {
        return false;
    }
    $s = (array) get_option('wp_store_settings', []);
    foreach (['page_catalog', 'page_profile'] as $kunci) {
        if (!empty($s[$kunci]) && is_page((int) $s[$kunci])) {
            return true;
        }
    }
    $isi = (string) get_post_field('post_content', get_queried_object_id());
    return has_shortcode($isi, 'wp_store_catalog') || has_shortcode($isi, 'wp_store_profile')
        || strpos((string) get_page_template_slug(), 'katalog') !== false;
}

if (!function_exists('justg_right_sidebar_check')) {
    /**
     * Right sidebar check
     * 
     */
    function justg_right_sidebar_check()
    {
        if (is_singular('fl-builder-template') || velocity_toko14_halaman_penuh()) {
            return;
        }
        if (!is_active_sidebar('main-sidebar')) {
            return;
        }
        if (is_tax(array('store_product_cat', 'brand'))) {
            echo '<div class="right-sidebar widget-area pe-md-2 col-sm-12 col-md-3 order-md-1 order-3 px-1" id="right-sidebar" role="complementary">';
            echo '<aside class="mb-3 d-none d-md-block">';
            echo do_shortcode('[wp_store_filters]');
            echo '</aside>';
            echo '</div>';
            return;
        }

?>
        <div class="widget-area right-sidebar col-sm-3 order-md-1 order-3 px-1" id="right-sidebar" role="complementary">
            <div class="sticky-top">
                <?php do_action('justg_before_main_sidebar'); ?>
                <?php dynamic_sidebar('main-sidebar'); ?>
                <?php do_action('justg_after_main_sidebar'); ?>
            </div>
        </div>
    <?php
    }
}

if (!function_exists('justg_left_sidebar_check')) {
    /**
     * Sidebar kedua (secondary-sidebar), tampil di kanan konten.
     */
    function justg_left_sidebar_check()
    {
        if (is_singular('fl-builder-template') || velocity_toko14_halaman_penuh()) {
            return;
        }
        if (!is_active_sidebar('secondary-sidebar')) {
            return;
        }
    ?>
        <div class="widget-area left-sidebar col-sm-3 order-3 px-1" id="left-sidebar" role="complementary">
            <div class="sticky-top">
                <?php do_action('justg_before_main_sidebar'); ?>
                <?php dynamic_sidebar('secondary-sidebar'); ?>
                <?php do_action('justg_after_main_sidebar'); ?>
            </div>
        </div>
    <?php
    }
}

function vd_limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
