<?php get_header(); ?>
<main class="p-service">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="c-headpage">
        <div class="l-container2">
            <h1 class="c-title"><?= get_the_title(); ?></h1>
        </div>
        <?php the_content() ?>
    </div>

    <div class="feature_img">
        <?php
        $image = get_field('fea_img'); ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>

    <div class="p-service__consultation">
        <dl class="l-container2">
            <dt>このような方はご相談ください</dt>
            <?php
            if (have_rows('targets')) :
                while (have_rows('targets')) : the_row();
                    echo '<dd class="c-checkMark">' . get_sub_field('target') . '</dd>';
                endwhile;
            endif;
            ?>
        </dl>
    </div>

    <div class="p-service__merit">
        <div class="l-container2">
            <h3 class="p-service__title">ひかり税理士法人を選ぶメリット</h3>
            <dl>
                <?php
                if (have_rows('advantage')) :
                    while (have_rows('advantage')) : the_row();
                        echo '<dt class="c-checkMark">' . get_sub_field('advantage-title') . '</dt>';
                        echo '<dd>' . get_sub_field('advantage-description') . '</dd>';
                    endwhile;
                endif;
                ?>
            </dl>
        </div>
    </div>

    <div class="p-service__flow">
        <div class="l-container2">

            <h3 class="p-service__title">サービスの流れ</h3>
            <?php
            if (have_rows('step')) :
                while (have_rows('step')) : the_row();
                    // Get parent value.
                    $i++; ?>
                    <table>
                        <tbody>
                            <tr>
                                <th>STEP<?= $i ?></th>
                                <td>
                                    <h4 class="flow-title"><?= get_sub_field('step-tite'); ?></h4>
                                    <?php

                                    if (have_rows('subtitle')) :
                                        while (have_rows('subtitle')) : the_row(); ?>
                                            <h5 class="flow-subtitle"><?= get_sub_field('step-subtitle') ?></h5>
                                            <?php

                                            if (have_rows('description')) :
                                                while (have_rows('description')) : the_row(); ?>
                                                    <p class="c-checkMark"><?= get_sub_field('step-description') ?></p>
                                            <?php endwhile;
                                            endif;
                                            ?>
                                    <?php endwhile;
                                    endif;
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>

    <div class="p-service__division">
        <div class="l-container">
            <h3 class="p-service__subtitle">関連サービス</h3>
            <ul class="division-list c-flex">
                <li class="small-12 medium-4">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) {
                        $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
                    ?>
                        <a href="<?= get_permalink($prev_post->ID) ?>">
                            <p class="img">
                                <?php if (get_the_post_thumbnail()) :  the_post_thumbnail();
                                endif; ?>
                            </p>
                            <p class="text"><span class="arrow"><?= $prev_title ?></span></p>
                        </a>
                    <?php } ?>
                </li>
                <li class="small-12 medium-4">
                    <?php $next_post = get_next_post();
                    if ($next_post) {
                        $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
                    ?>
                        <a href="<?= get_permalink($next_post->ID) ?>">
                            <p class="img">
                                <?php if (get_the_post_thumbnail()) :  the_post_thumbnail();
                                endif; ?>
                            </p>
                            <p class="text"><span class="arrow"><?= $next_title ?></span></p>
                        </a>
                    <?php } ?>
                </li>
            </ul>

        </div>

        <div class="l-btn">
            <div class="c-btn c-btn--small">
                <a href="<?= home_url() ?>/services">ご提供サービス一覧へ</a>
            </div>
        </div>
    </div>


</main>

<?php get_footer(); ?>