<?php
function my_setup() {
  add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
  add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
  add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
  add_theme_support( 'html5', array( /* HTML5のタグで出力 */
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
}
add_action( 'after_setup_theme', 'my_setup' );

function my_script_init() {
    wp_enqueue_style( 'style-name', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
  }
add_action( 'wp_enqueue_scripts', 'my_script_init' );

function my_menu_init() {
    register_nav_menus( array(
      'global'  => 'グローバルメニュー',
      'utility' => 'ユーティリティメニュー',
      'drawer'  => 'ドロワーメニュー',
    ) );
  }
  add_action( 'init', 'my_menu_init' );

function my_widget_init() {
    register_sidebar( array(
      'name'          => 'サイドバー',
      'id'            => 'sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title">',
      'after_title'   => '</div>',
    ) );
  }
add_action( 'widgets_init', 'my_widget_init' );

