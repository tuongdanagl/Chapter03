<?php

/**
 * A Category News
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
        <h1 class="c-title"><?php single_cat_title(); ?></h1>
    </div>
    <div class="p-news__content">
        <div class="l-container">
            <?php
            $category = single_term_title("", false);
            $catid = get_cat_ID($category);
            $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
            query_posts("cat=$catid&post_type=post&posts_per_page=10&post_status=publish&paged=$paged");
            if (have_posts()) :
                echo '<ul class="c-listpost">';
                while (have_posts()) :the_post();
                    echo '<li class="c-listpost__item">';
                    echo '<div class="c-listpost__info"><span class="datepost">' . get_the_date() . '</span>';
                    $cates = get_the_category(get_the_ID());
                    foreach ($cates as $cate) :
                        echo '<span class="cat"><i class="c-dotcat" style="background-color:' . $cate->description . '"></i>';
                        echo '<a href="' . get_category_link($cate->cat_ID) . '">' . $cate->name . '</a></span></div>';
                    endforeach;
                    echo '<h3 class="titlepost"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
                    echo '</li>';
                endwhile;
                echo '<div class="c-pagicat">';
                the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => __( '<', 'textdomain' ),
                    'next_text' => __( '>', 'textdomain' ),
                    ) );
                echo '</div></ul>';
            endif;
            wp_reset_query();
            
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>