<?php

/**
 * The blog template file.
 *
 */

get_header();
?>
<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>

    <div class="p-news__content">
        <div class="l-container">
            <div class="feature_img">
                <img src="<?= get_template_directory_uri() ?>/assets/img/img_news.png" alt="<?= get_the_title( )?>">
            </div>

            <div class="c-ttlpostpage">
                <h2><?php the_title( )?></h2>
                <span><?=get_the_date()?></span>
                <?php
                $cates = get_the_category();
                foreach ($cates as $cate) :
                    echo '<span class="cat"><i class="c-dotcat" style="background-color:' . $cate->description . '"></i>';
                    echo '<a href="' . get_category_link($cate->cat_ID) . '">' . $cate->name . '</a></span>';
                endforeach;
                ?>
            </div>

            <div class="single__content">
                <?php the_content() ?>
            </div>

            <div class="l-btn">
                <div class="c-btn c-btn--small2">
                    <a href="<?=home_url()?>/news">ニュース一覧を見る</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>