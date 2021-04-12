<?php get_header(); ?>
        <div class="body">
        <?php while (have_posts()): the_post(); ?>
            <div class="main">
                <div class="main-post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="main-post-head">
                            <img class="main-post-img" src="<?php echo get_template_directory_uri(); ?>/img/SNSinfo-circle-picture.png">
                            <p class="main-post-category"><?php the_category(’’); ?></p>
                        </div>
                        <p class="main-post-title"><?php the_title(); ?></p>
                        <p class="main-post-text"><?php the_excerpt(); ?></p>
                        <p class="main-post-date"><?php the_time("n月 j, Y"); ?></p>
                    </a>
            </div>
        <?php endwhile; ?>
<div class="side">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>