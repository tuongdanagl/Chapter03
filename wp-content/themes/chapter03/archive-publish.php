<?php
/*
 Archive Publish
 */

get_header();

?>
<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="c-headpage">
        <h1 class="c-title">出版物</h1>
        <p>ひかり税理士法人では、税務・会計・経営・相続などに関する書籍の執筆を行っています。</p>
    </div>
    <div class="l-container">
        <div class="p-publish__content">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'publish',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'paged' => $paged
            );
            $the_query = new WP_Query($args);
            global $wp_query;
            $wp_query->in_the_loop = true;
            if ($the_query->have_posts()) :
            ?>
                <ul class="c-gridpost">
                    <?php
                    // The Loop
                    while ($the_query->have_posts()) : $the_query->the_post();
                        $price = get_field('price');
                    ?>
                        <li class="c-gridpost__item">
                            <div class="c-gridpost__thumb">
                                <a href="<?= get_the_permalink() ?>">
                                    <?php if (get_the_post_thumbnail()) : the_post_thumbnail(); 
                                    else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="c-gridpost__info">
                                <p class="datepost"><?= get_the_date() ?></p>
                                <h3><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                <p class="price">¥<?= the_field('price') ?> (税別)</p>
                                <a href="<?= get_the_permalink() ?>" class="c-btnview">詳しく見る</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>

                <div class="c-pagicat">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $the_query->max_num_pages,
                        'prev_text' => __('<', 'textdomain'),
                        'next_text' => __('>', 'textdomain'),
                    ));
                    ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>