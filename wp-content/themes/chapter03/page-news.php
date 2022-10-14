<?php
/*
 Template Name: News
 */

get_header();

?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="c-headpage">
        <h1 class="c-title"><?= get_the_title(); ?></h1>
    </div>
    <div class="p-news__content p-news__catcont">
        <div class="l-container">
            <?php
            $args = array(
                'hide_empty' => 0,
                'taxonomy' => 'category',
                'orderby' => 'id',
            );
            $cats = get_categories($args);
            ?>
            <ul class="c-tabcat">
                <li class="active">すべて</li>
                <?php
                foreach ($cats as $cate) {
                    echo '<li class="item' . $cate->cat_ID . '"><a href="' . get_category_link($cate->cat_ID) . '">' . $cate->name . '</a></li>';
                } ?>
            </ul>
            <div class="c-tabs__cat">
                <div id="result_ajaxp">
                    <?= do_shortcode('[ajax_pagination post_type="post" posts_per_page="5" paged="1" cat=0 ]'); ?>
                </div>
                <?php

                // The Loop tab pagination
                /*
                foreach ($cats as $cat) :
                ?>
                    <div id="result_ajaxp<?=$cat->term_id?>">
                        <?= do_shortcode('[ajax_pagination post_type="post" posts_per_page="5" paged="1" cat="' . $cat->term_id . '"]'); ?>
                    </div>
                <?php endforeach; */ ?>

            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>