<?php
/**
 * Infomist functions and definitions
 *
 * @package Infomist
 */

if ( ! function_exists( 'infomist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function infomist_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Infomist, use a find and replace
	 * to change 'infomist' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'infomist', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Footer Menu'),
        'news_menu' => esc_html__( 'Меню новин'),
        'events_menu' => esc_html__( 'Меню подій'),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'infomist_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // infomist_setup

add_action( 'after_setup_theme', 'infomist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function infomist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'infomist_content_width', 640 );
}
add_action( 'after_setup_theme', 'infomist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function infomist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'infomist' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar2', 'infomist' ),
        'id'            => 'sidebar-2',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar3', 'infomist' ),
        'id'            => 'sidebar-3',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Над шапкой сайта', 'infomist' ),
        'id'            => 'top-header',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s top-header">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Под мостом', 'infomist' ),
        'id'            => 'bottom-header',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s hot-message">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="hot-phone">',
        'after_title'   => '</div>',
    ) );
}
add_action( 'widgets_init', 'infomist_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function infomist_scripts() {
	wp_enqueue_style( 'infomist-style', get_stylesheet_uri() );

	wp_enqueue_script( 'infomist-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'infomist-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'infomist_scripts' );
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';

define( SINGLE_PATH, TEMPLATEPATH . '/single' );

add_filter( 'single_template', 'my_single_template' );

function my_single_template( $single ) {
    global $wp_query, $post;

    foreach ( (array) get_the_category() as $cat ) :

        if ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->slug . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif ( file_exists( SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php' ) ) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }
    endforeach;
    if ( file_exists( SINGLE_PATH . '/single.php' ) ) {
        return SINGLE_PATH . '/single.php';
    }

    return $single;
}
function dimox_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home'] = 'Головна'; // текст ссылки "Главная"
    $text['category'] = 'Архів рубрики "%s"'; // текст для страницы рубрики
    $text['search'] = 'Результати пошуку по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Нотатки з тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статті автора %s'; // текст для страницы автора
    $text['404'] = 'Помилка 404'; // текст для страницы 404
    $text['page'] = 'Сторінка %s'; // текст 'Страница N'
    $text['cpage'] = 'Сторінка коментарів %s'; // текст 'Страница комментариев N'

    $delimiter = '\\'; // разделитель между "крошками"
    $delim_before = '<span class="divider">'; // тег перед разделителем
    $delim_after = '</span>'; // тег после разделителя
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_title = 1; // 1 - показывать подсказку (title) для ссылок, 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $before = '<span class="current">'; // тег перед текущей "крошкой"
    $after = '</span>'; // тег после текущей "крошки"
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_link = home_url('/');
    $link_before = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
    $link_after = '</span>';
    $link_attr = ' itemprop="url"';
    $link_in_before = '<span itemprop="title">';
    $link_in_after = '</span>';
    $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = $post->post_parent;
    $delimiter = ' ' . $delim_before . $delimiter . $delim_after . ' ';

    if (is_home() || is_front_page()) {

        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';

    } else {

        echo '<div class="breadcrumbs">';
        if ($show_home_link == 1) echo sprintf($link, $home_link, $text['home']);

        if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $delimiter);
                $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                if ($show_home_link == 1) echo $delimiter;
                echo $cats;
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                echo $delimiter . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current == 1) echo $delimiter . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }

        } elseif ( is_search() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif ( is_day() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ($show_home_link == 1) echo $delimiter;
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0 || get_query_var('cpage')) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ( get_query_var('cpage') ) {
                    echo $delimiter . sprintf($link, get_permalink(), get_the_title()) . $delimiter . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current == 1) echo $before . get_the_title() . $after;
                }
            }

            // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( get_query_var('paged') ) {
                echo $delimiter . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current == 1) echo $delimiter . $before . $post_type->label . $after;
            }

        } elseif ( is_attachment() ) {
            if ($show_home_link == 1) echo $delimiter;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($show_home_link == 1) echo $delimiter;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            if ($show_current == 1) echo $delimiter . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif ( is_author() ) {
            if ($show_home_link == 1) echo $delimiter;
            global $author;
            $author = get_userdata($author);
            echo $before . sprintf($text['author'], $author->display_name) . $after;

        } elseif ( is_404() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . $text['404'] . $after;

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link == 1) echo $delimiter;
            echo get_post_format_string( get_post_format() );
        }

        echo '</div><!-- .breadcrumbs -->';

    }
} // end dimox_breadcrumbs()

add_action('wp','es_pageviews');
add_action('manage_posts_custom_column','display_pageviews_row',10,2);
add_filter('manage_pages_columns', 'display_pageviews');
add_filter('manage_posts_columns', 'display_pageviews');

function es_pageviews(){
    if(is_single() || is_page()){
        global $post;
        $pv = get_post_meta($post->ID, '_pageviews',true);
        update_post_meta($post->ID, '_pageviews', $pv+1);
    }
}

function display_pageviews($columns){
    $columns['pv'] = __('PageViews');
    return $columns;
}

function display_pageviews_row($column_name,$post_id){
    if ($column_name != 'pv') return;
    $pv = get_post_meta($post_id, '_pageviews',true);
    echo $pv ? $pv : 0;
}

function the_pageview() {
    global $post;
    $pv = get_post_meta($post->ID, '_pageviews', true);
    echo $pv ? $pv : 0;
}
function latest_posts_by_author($array) {
    extract(shortcode_atts(array('author' => 'admin', 'show' => 5), $array));

    global $wpdb;
    $table = $wpdb->prefix . 'users';
    $result = $wpdb->get_results('SELECT ID FROM '.$table.' WHERE user_login = "'.$author.'"');
    $id = $result[0]->ID;
    $table = $wpdb->prefix . 'posts';
    $result = $wpdb->get_results('SELECT * FROM '.$table.' WHERE post_author = '.$id.' AND post_status = "publish" AND post_type = "post" ORDER BY post_date DESC');
    $i = 0;
    $html = '<ul>';
    foreach ($result as $numpost) {
        $html .= '<li><a href="'.$numpost->guid.'">'.$numpost->post_title.'</a></li>';
        $i++;
        if($i == $show){
            break;
        }
    }
    $html .= '</ul>';

    return $html;
}
add_shortcode('latestbyauthor', 'latest_posts_by_author');

function infomist_theme_scripts() {
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/js/flexslider.css');
    wp_enqueue_script('flexslider-init', get_template_directory_uri() . '/js/flexslider-init.js', array('jquery'), null, false);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'infomist_theme_scripts');

function subpage_peek() {
    global $post;
    $args = array(
        'post_parent' => $post->ID,
        'post_type' => 'page'
    );
    $subpages = new WP_query($args);
    if ($subpages->have_posts()) :
        $output = '<ul>';
        while ($subpages->have_posts()) : $subpages->the_post();
            $output .= '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong>
                        <p>'.get_the_excerpt().'<br />
                        <a href="'.get_permalink().'">Читать подробнее →</a></p></li>';
        endwhile;
        $output .= '</ul>';
    else :
        $output = '<p>Дочерних страниц не найдено.</p>';
    endif;
    wp_reset_postdata();
    return $output;
}
add_shortcode('subpage_peek', 'subpage_peek');

add_filter('widget_text', 'my_widget_execute_php', 100);
function my_widget_execute_php($text) {
    if(strpos($text,'<?') !== false) {
        ob_start();
        eval('?>'.$text);
        $text = ob_get_contents();
        ob_end_clean();
    }
    return $text;
}
function news() {
    $outputs = '';
$outputs = '<h1><a href="'. get_the_permalink(30).'">Новини</a></h1>';
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query("cat=3,-9,-10,-6,-15,-5"."&showposts=10");
$outputs .= '<ul class="all-news">';
    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
        $outputs .= '<li class="single-news">';

                $today = date("j");
                $post_date = get_the_time("d");
                $time_post = get_the_time("G:i");
            if ($today == $post_date) {
                $outputs .= '<div class="time">'.get_the_time("G:i").'</div>';
            } else {
                $outputs .= '<div class="time">'.get_the_time("d.m").'</div>';
            }
            $outputs .= '<p><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
        $outputs .= '</li>';
    endwhile;
$outputs .= '</ul>';
wp_reset_query();
    echo $outputs;
    return $outputs;
}

function top_news () {
    $outputs = '';
    $outputs .= '<h1><a href="'. get_the_permalink(32).'">Топ-новини</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query("cat=5"."&showposts=4");
    $outputs .= '<ul class="top-news">';
    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
        $outputs .= '<li class="single-news">';

        $outputs .= '<div class="thumb"><a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a></div>';
        $outputs .= '<p><span class="post-info">'.get_the_time('d.m.Y  |  G:i').'</span><a href="'.get_permalink().'">'. get_the_title().'</a></p>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}
function week() {
$outputs = '';
$outputs .= '<h2 class="slide"><a href="'.get_permalink(179).'">ТЕМА ТИЖНЯ</a></h2>';
    $outputs .= '<div class="week-wrapp">';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=15'.'&showposts=1');
    while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
        $outputs .= '<div class="week">';
        $outputs .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail().'</a>';
        $outputs .= '</div>';
    endwhile;
    echo $outputs;
    $outputs = '';
    wp_reset_query();
    $outputs .= '<div class="week-thema">';
        $wp_query = null;
        $wp_query = new WP_Query( 'page_id=179' );
        while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
            $outputs .= '<p>'.get_the_content().'</p>';
        endwhile;
        wp_reset_query();

$outputs .= '</div>';
$outputs .= '</div>';
      echo $outputs;
    return $outputs;
}