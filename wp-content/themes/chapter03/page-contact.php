<?php
/*
 Template Name: Contact Page
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
        <h2 class="c-title"><?= get_the_title(); ?></h2>
    </div>
    <div class="p-contact__content">
        <div class="l-container">
            <h1>メールでのお問い合わせ</h1>
            <p class="notice">下記に必要事項をご記入の上送信下さい。弊所のコンサルタントからご連絡をさせて頂きます。</p>
            <?= do_shortcode('[mwform_formkey key="229"]'); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>