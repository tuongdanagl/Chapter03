<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= get_bloginfo('name').' - '.get_the_title() ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php do_action('flatsome_after_body_open'); ?>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'flatsome'); ?></a>

    <div id="wrapper">

        <?php do_action('flatsome_before_header'); ?>

        <header id="header" class="c-header">
            <div class="l-container">

                <div class="c-logo"><a href="<?php echo home_url(); ?>"><?php if (function_exists('the_custom_logo')) {the_custom_logo();} ?></a></div>
                <nav class="c-gnav">
                    <?php wp_nav_menu(array('theme_location' => 'menu-main')); ?>
                </nav>
                <?php get_template_part('template-parts/header/header', 'wrapper'); ?>
            </div>
        </header>

        <?php do_action('flatsome_after_header'); ?>

        <main id="main">