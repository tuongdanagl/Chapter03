<?php get_header();?>
<main class="c-error">
  
    <section class="c-errorpage">
        <div class="c-errorpage__wrapper l-container">
            <div class="c-errorpage__img">
            <img src="<?= get_template_directory_uri();?>/assets/img/4041.png" alt="page not found">
            </div>
            <div class="l-btn">
                <div class="c-btn c-btn--small">
                    <a href="<?= home_url();?>"> 家に帰れ</a>
                </div>
            </div>
       
        </div>
    </section>
</main>
<?php get_footer();?>