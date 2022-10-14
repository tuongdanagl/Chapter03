<?php

/**
 * The blog template file.
 *
 */

get_header();

?>

<div class="c-mainvisual">
    <div class="js-slider">
        <?php
        $images = get_field('images');
        if ($images) :
            foreach ($images as $image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<main class="p-home">
    <section class="service">
        <div class="l-container">
            <h2 class="c-title"><span>幅広い案件に対応できるひかりのワンストップサービス</span>目的に応じて、最適な方法をご提案できます</h2>
            <div class="service__inner">
                <?php
                $step = get_field('step');
                if ($step) :
                    foreach ($step as $image) : ?>
                        <div class="service__item"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="l-btn l-btn--2btn">
                <div class="c-btn">
                    <a href="services">ひかり税理士法人のサービス一覧を見る</a>
                </div>
                <div class="c-btn">
                    <a href="cases">ひかり税理士法人の成功事例を見る</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">ニュース</span>
                <span class="en">News</span>
            </h2>
            <div class="news__inner">
                <?php
                $args = array(
                    'hide_empty' => 0,
                    'taxonomy' => 'category',
                    'orderby' => 'id',
                );
                $cats = get_categories($args);
                ?>
                <ul class="c-tabs">
                    <li data-content="all" data-color="#0078d2" class="active">すべて</li>
                    <?php
                    foreach ($cats as $cate) {
                        echo '<li data-content="cat_' . $cate->term_id . '" data-color="' . $cate->description . '">' . $cate->name . '</li>';
                    } ?>
                </ul>
                <div class="c-tabs__content">
                    <!-- All Posts - Display 5 Posts-->
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'paged' => $paged
                    );
                    $the_query = new WP_Query($args);
                    global $wp_query;
                    $wp_query->in_the_loop = true;
                    ?>
                    <ul class="c-listpost active" id="all">
                        <?php
                        // The Loop
                        while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <li class="c-listpost__item">
                                <div class="c-listpost__info">
                                    <span class="datepost"><?= get_the_date() ?></span>
                                    <?php
                                    $cates = get_the_category(get_the_ID());
                                    foreach ($cates as $cate) :
                                    ?>
                                        <span class="cat">
                                            <i class="c-dotcat" style="background-color:<?= $cate->description; ?>"></i>
                                            <a href="<?= get_category_link($cate->cat_ID) ?>"><?= $cate->name; ?></a>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <h3 class="titlepost"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                    <?php
                    // The Loop
                    foreach ($cats as $cat) :
                    ?>
                        <!-- Posts of cat2 item - Display 5 Posts-->
                        <ul class="c-listpost" id="cat_<?= $cat->term_id ?>">
                            <?php $args['cat'] = $cat->term_id;
                            $the_query = new WP_Query($args);
                            global $wp_query;
                            $wp_query->in_the_loop = true;

                            // The Loop
                            while ($the_query->have_posts()) : $the_query->the_post();

                            ?>
                                <li class="c-listpost__item">
                                    <div class="c-listpost__info">
                                        <span class="datepost"><?= get_the_date() ?></span>
                                        <span class="cat">
                                            <i class="c-dotcat" style="background-color:<?= $cat->description; ?>"></i>
                                            <a href="<?= get_category_link($cat->cat_ID) ?>"><?= $cat->name; ?></a>
                                        </span>
                                    </div>
                                    <h3 class="titlepost"><a href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a></h3>
                                </li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endforeach; ?>
                    <!-- Posts of cat3 item - Display 5 Posts-->

                </div>
                <div class="l-btn">
                    <div class="c-btn c-btn--small">
                        <a href="news">ニュース一覧を見る</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="publish">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="ja">出版物</span>
                <span class="en">Publish</span>
            </h2>
            <div class="publish__inner">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'publish',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'paged' => $paged
                );
                $the_query = new WP_Query($args);
                global $wp_query;
                $wp_query->in_the_loop = true;
                ?>
                <ul class="c-gridpost">
                    <?php
                    // The Loop
                    while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                        <li class="c-gridpost__item">
                            <a href="<?= get_the_permalink() ?>">
                                <div class="c-gridpost__thumb">
                                    <?php if (get_the_post_thumbnail()) : the_post_thumbnail(); 
                                    else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <p class="datepost"><?= get_the_date() ?></p>
                                <h3><?= get_the_title() ?></h3>
                            </a>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="publish">出版物一覧を見る</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>