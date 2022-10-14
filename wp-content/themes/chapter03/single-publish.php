<?php get_header();?>
<main class="p-publish">
    <div class="c-breadcrumb">
        <div class="l-container">
            <?php wp_breadcrumbs(); ?>
        </div>
    </div>
    <div class="l-container">
        <div class="p-publish__single">
            <div class="feature_img">
            <?php if( get_the_post_thumbnail() ) : ?>
                <div class = 'postImgCon'>
                    <div class="feat-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div> 
            <?php else: ?>
                <div class = 'postImgCon'>
                    <div class="feat-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.png" alt="">
                    </div>
                </div> 
            <?php endif; ?> 
            </div>
            <div class="p-publish__info">
                <h1><?php the_title( )?></h1>
                <p class="datepost"><?=get_the_date()?> 発行</p>
                <p class="author">
                    著者  : <?php the_field('author'); ?><br>
                    出版社 : <?php the_field('publisher'); ?>
                </p>
                <p class="price">¥<?php the_field('price'); ?> (税別)</p>

                <div class="desc">
                    <p><?php the_field('descrip'); ?></p>

                    <h4>目次</h4>
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <div class="l-btn">
            <div class="c-btn c-btn--small2">
                <a href="<?=home_url()?>/publish">出版物一覧へ</a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>