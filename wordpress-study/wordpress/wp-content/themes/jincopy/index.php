        <?php get_header(); ?>
        <br>

        <div class="body">
            <div class="main">
            <?php while (have_posts()): the_post(); ?>
                    <a class="main-post-link" href="<?php the_permalink(); ?>">
                        <div class="main-post">
                            <div class="main-post-head">
                            <?php if(has_post_thumbnail()): ?>
                                <p class="main-post-thumbnail"><?php the_post_thumbnail('thumbnail'); ?></p>
                                <?php else: ?><!--アイキャッチ画像がない場合は、デフォルトの画像を表示-->
                                <p class="main-post-thumbnail"><img src="<?php echo get_template_directory_uri(); ?>/img/SNSinfo-circle-picture.png" alt="デフォルトのアイキャッチ画像" width="350" height="196" /></p>
                            <?php endif; ?>
                                <div class="main-post-category">
                                    <?php
                                    $category = get_the_category();
                                    echo $category[0]->cat_name;
                                     ?>
                                </div>
                            </div>
                            <h2 class="main-post-title"><?php the_title(); ?></h2>
                            <p class="main-post-date"><?php the_time("n月 j, Y"); ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <div class="side">
                <?php get_sidebar(); ?>
            </div>
        <?php get_footer(); ?>