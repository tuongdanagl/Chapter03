<?php
/*
 Archive Services
 */

get_header();

?>
<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="c-headpage">
        <h1 class="c-title">ご提供サービス</h1>
    </div>
    <div class="feature_img">
        <img src="<?= get_template_directory_uri() ?>/assets/img/img_services01.png" alt="">
    </div>
    <div class="p-service__content">
        <div class="l-container">
            <p class="notice">ひかり税理士法人がご提供するすべてのサービスを目的別に検索していただけます</p>
            <!-- =======checkArea====== -->
            <div class=" p-service__checkArea">
                <form id="serviceSearch" method="get" action="#">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'services',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'hide_empty' => 0,
                        'taxonomy' => 'cat-services',
                        'orderby' => 'id'
                    );
                    ?>
                    <div class="checkArea__form">
                        <?php $args['parent'] = '12';
                        $cates = get_categories($args); ?>
                        <legend class="servicesList-heading">サービスの対象で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php
                            foreach ($cates as $category) :
                                echo '<div class="c-w240"><label><input class="chkbutton" type="checkbox" data-id="' . $category->cat_ID . '" value="' . $category->cat_ID . '" >' . $category->name . '</label></div>';
                            endforeach;
                            ?>
                        </div>
                    </div>

                    <div class="checkArea__form form2">
                        <?php $args['parent'] = '13';
                        $cates = get_categories($args); ?>
                        <legend class="servicesList-heading">サービスの対象で選ぶ</legend>
                        <div class="checkArea__inner">
                            <?php
                            foreach ($cates as $category) :
                                if ($category->cat_ID == 21 || $category->cat_ID == 22) {
                                    $cls = 'c-w240';
                                } else {
                                    $cls = 'c-w156';
                                }
                                echo '<div class="' . $cls . '"><label><input class="chkbutton" type="checkbox" data-id="' . $category->cat_ID . '" value="' . $category->cat_ID . '" >' . $category->name . '</label></div>';
                            endforeach;
                            ?>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            $wp_query = new WP_Query($args);
            global $wp_query;
            $wp_query->in_the_loop = true;
            $total = $wp_query-> found_posts;
            ?>
            <p class="p-service__result"><span id="totalServices"><?= $total ?></span>件が該当しました</p>
            <ul class="c-column" id="services">
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <li class="c-column__item">
                        <a href="<?= get_the_permalink() ?>">
                            <?php if (get_the_post_thumbnail()) : the_post_thumbnail();
                            else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png" alt="">
                            <?php endif; ?>
                            <p><?= get_the_title() ?></p>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <div class="endcontent">
                <img src="<?= get_template_directory_uri() ?>/assets/img/img_more05.png" alt="<?= get_bloginfo('name') ?>">
                <img src="<?= get_template_directory_uri() ?>/assets/img/img_more06.png" alt="<?= get_bloginfo('name') ?>">
            </div>
        </div>
    </div>
    <input type="hidden" id="urlname" name="geturl" value="<?php echo home_url(); ?>">
</main>

<?php get_footer(); ?>