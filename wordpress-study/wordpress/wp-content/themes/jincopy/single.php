<?php get_header() ?>

<div class="body">
    <div class="single-body">
            <div class="post">
            <?php while (have_posts()): the_post(); ?>
                <div class="post-content">
                    <div class="post-category">
                        <?php
                        $category = get_the_category();
                        echo $category[0]->cat_name;
                        ?>
                    </div>
                    <div class="post-title">
                        <p class="single-post-title"><?php the_title(); ?></p>
                    </div>
                    <div class="posted-date">                            
                        <p class="single-post-date"><?php the_time("n月 j, Y"); ?></p>
                    </div>
                    <div class="post-img">
                        <img class="single-post-img" src="<?php echo get_template_directory_uri(); ?>/img/SNSinfo-circle-picture.png">
                    </div>
                    <div class="post-sns">
                        <div class="post-twitter"><img class="post-twitter-img" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></div>
                        <div class="post-facebook"><img class="post-facebook-img" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></div>
                        <div class="post-B"><img class="post-B!-img" src="<?php echo get_template_directory_uri(); ?>/img/B!.png"></div>
                        <div class="post-pocket"><img class="post-pocket-img" src="<?php echo get_template_directory_uri(); ?>/img/pocket.png"></div>
                        <div class="post-line"><img class="post-line-img" src="<?php echo get_template_directory_uri(); ?>/img/line.png"></div>
                    </div>
                    <div class="post-text"><?php the_content() ?></div>
                </div>
                <div class="post-tag"></div>
                    <div class="post-sns-download">
                    <div class="post-twitter"><img class="post-twitter-img" src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"></div>
                    <div class="post-facebook"><img class="post-facebook-img" src="<?php echo get_template_directory_uri(); ?>/img/facebook.png"></div>
                    <div class="post-B"><img class="post-B-img" src="<?php echo get_template_directory_uri(); ?>/img/B!.png"></div>
                    <div class="post-pocket"><img class="post-pocket-img" src="<?php echo get_template_directory_uri(); ?>/img/pocket.png"></div>
                    <div class="post-line"><img class="post-line-img" src="<?php echo get_template_directory_uri(); ?>/img/line.png"></div>
                </div>
            <?php endwhile; ?>
            <div class="single-download">
                <p class="single-download-title">WordPressのテーマ「JIN」</p>
                <img class="download-picture" src="<?php echo get_template_directory_uri(); ?>/img/single-download-img.png">
                <p class="single-download-text1">JIN(ジン)は読む人も書く人も、どちらも心地よく使える最高のWordPressテーマを目指して作り上げました。</p>
                <p class="single-download-text2">月100万円以上稼ぐアフェリエイターのノウハウが凝縮されているテーマです。売れるメディア作りに必要なものは、このテーマ内にすべて揃えました。</p>
                <a class="post-download-botton" href="index.html">ダウンロード</a>
            </div>
            </div>
            <div class="related-post">
                <div class="related-post-title">RELATED POST</div>
                <div class="related-post-content">
                    <?php
                        // 同じカテゴリから記事を10件呼び出す
                        $categories = get_the_category($post->ID);
                        $category_ID = array();
                        foreach($categories as $category):
                            array_push( $category_ID, $category -> cat_ID);
                        endforeach ;
                        $args = array(
	                    // 今読んでいる記事を除く
	                    'post__not_in' => array($post -> ID),
	                    'posts_per_page'=> 10,
	                    'category__in' => $category_ID,
	                    // ランダムに記事を選ぶ
	                    'orderby' => 'rand',
                        );
                        $query = new WP_Query($args);
                        if( $query -> have_posts() ):
	                        while ($query -> have_posts()) :
	                            $query -> the_post();
                    ?>
                    <div class="target-related-post">
                        <a href="<?php the_permalink(); ?>">
                            <div class="related-post-head">
                            <?php if(has_post_thumbnail()): ?>
                                <p class="related-post-thumbnail"><?php the_post_thumbnail('large'); ?></p>
                                <?php else: ?><!--アイキャッチ画像がない場合は、デフォルトの画像を表示-->
                                <p class="related-post-thumbnail"><img src="<?php echo get_template_directory_uri(); ?>/img/SNSinfo-circle-picture.png" alt="デフォルトのアイキャッチ画像" width="240" height="140" /></p>
                            <?php endif; ?>
                                <div class="related-post-category">
                                    <?php
                                        $category = get_the_category();
                                        echo $category[0]->cat_name;
                                    ?>
                                </div>
                            </div>
	                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="related-post-date"><?php the_time("n月 j, Y"); ?></p>
                        </a>
                    </div>
                    <?php endwhile; endif; ?>
                        <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="previous-next-post">
                <?php 
                    $prevpost = get_adjacent_post(false, '', true); //前の記事 
                    $nextpost = get_adjacent_post(false, '', false); //次の記事 
                    if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき 
                ?> 
                <ul> 
                    <?php if ( $prevpost ) { //前の記事が存在しているとき 
                        echo '<a class="previous-next-post-link" href="' //echo内のhtmlは通常のhtmlと同様に読み込まれる。
                        . get_permalink($prevpost->ID) // ->はアロー演算子。指定した変数に入っている値を取り出す。
                        .'">'
                        .'<div><li>'
                        . get_the_post_thumbnail($prevpost->ID, 'medium') //echo内のピリオドは、連結の意味。
                        .'<div class="previous-next-post-title">'
                        . get_the_title($prevpost->ID) 
                        .'</div>'
                        . '</li></div></a>'; 
                        } 
                        else { //前の記事が存在しないとき 
                        echo '<div><a href="' 
                        . network_site_url('/') //ホームのURLをとってくる。()内の/はURLの最後が?になるようにするもの
                        . '">TOPへ戻る</a></div>'; 
                        }
                        if ( $nextpost ) { //次の記事が存在しているとき 
                        echo '<a class="previous-next-post-link" href="'
                        . get_permalink($nextpost->ID) 
                        . '">' 
                        .'<div><li>' 
                        . get_the_post_thumbnail($nextpost->ID, 'medium') 
                        .'<div class="previous-next-post-title">'
                        . get_the_title($nextpost->ID) 
                        .'</div>'
                        . '</li></div></a>';
                        } 
                        else { //次の記事が存在しないとき 
                        echo '<div><a href="' 
                        . network_site_url('/') 
                        . '">TOPへ戻る</a></div>'; 
                        } 
                    ?> 
                </ul> 
                <?php } ?>
            </div>
        <div class="path"></div>
    </div>
    <div class="single-side">
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>