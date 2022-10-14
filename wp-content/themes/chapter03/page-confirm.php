<?php
/*
 Template Name: Comfirm Page
 */

get_header();
?>
<main class="p-contact">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="c-headpage">
        <h1 class="c-title"><?= get_the_title(); ?></h1>
    </div>

    <div class="p-contact__content">
        <div class="l-container confirm">
            <p class="notice">以下の内容を送信してもよろしいですか？</p>
            <?= do_shortcode('[mwform_formkey key="229"]'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>