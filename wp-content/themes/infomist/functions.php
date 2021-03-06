<?php
/**
 * Infomist functions and definitions
 *
 * @package Infomist
 */

if (!function_exists('infomist_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function infomist_setup()
    {

        load_theme_textdomain('infomist', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');


        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'primary' => esc_html__('Footer Menu'),
            'news_menu' => esc_html__('Меню новин'),
            'events_menu' => esc_html__('Меню подій'),
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        add_theme_support('custom-background', apply_filters('infomist_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif;

add_action('after_setup_theme', 'infomist_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function infomist_content_width()
{
    $GLOBALS['content_width'] = apply_filters('infomist_content_width', 640);
}

add_action('after_setup_theme', 'infomist_content_width', 0);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function infomist_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Голова сторінка права частина', 'infomist'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Голова сторінка ліва частина', 'infomist'),
        'id' => 'sidebar-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Над шапкой сайта', 'infomist'),
        'id' => 'top-header',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s top-header" style="max-width: 960px;" >',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Под мостом', 'infomist'),
        'id' => 'bottom-header',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s hot-message">',
        'after_widget' => '</div>',
        'before_title' => '<div class="hot-phone">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Новини список', 'infomist'),
        'id' => 'sidebar-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Новини одинична', 'infomist'),
        'id' => 'sidebar-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Від першої особи ліва частина', 'infomist'),
        'id' => 'sidebar-5',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
    'name' => esc_html__('Інтерв\'ю', 'infomist'),
    'id' => 'sidebar-6',
    'description' => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Над слайдером', 'infomist'),
        'id' => 'sidebar-7',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Под слайдером', 'infomist'),
        'id' => 'sidebar-8',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Архів', 'infomist'),
        'id' => 'sidebar-9',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
//    register_sidebar(array(
//        'name' => esc_html__('test_left', 'infomist'),
//        'id' => 'sidebar-t1',
//        'description' => '',
//        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//        'after_widget' => '</aside>',
//        'before_title' => '<h1 class="widget-title">',
//        'after_title' => '</h1>',
//    ));
//    register_sidebar(array(
//        'name' => esc_html__('Test_right', 'infomist'),
//        'id' => 'sidebar-t2',
//        'description' => '',
//        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//        'after_widget' => '</aside>',
//        'before_title' => '<h1 class="widget-title">',
//        'after_title' => '</h1>',
//    ));

    register_sidebar(array(
        'name' => esc_html__('Під одиничною новиною', 'infomist'),
        'id' => 'sidebar-10',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Под event календарем', 'infomist'),
        'id' => 'sidebar-11',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'infomist_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function infomist_scripts()
{
//    wp_enqueue_style('infomist-style', get_stylesheet_uri() . "/style.css");

    wp_enqueue_script('infomist-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('infomist-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'infomist_scripts');
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';

define(SINGLE_PATH, TEMPLATEPATH . '/single');

add_filter('single_template', 'my_single_template');

function my_single_template($single)
{
    global $wp_query, $post;
    foreach ((array)get_the_category() as $cat) :
        if (file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php')) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        } elseif (file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php')) {
            return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
        }
    endforeach;
    if (file_exists(SINGLE_PATH . '/single.php')) {
        return SINGLE_PATH . '/single.php';
    }

    return $single;
}

function dimox_breadcrumbs()
{

    /* === ОПЦИИ === */
    $text['home'] = 'Головна'; // текст ссылки "Главная"
    $text['category'] = 'Архів "%s"'; // текст для страницы рубрики
    $text['search'] = 'Результати пошуку по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Нотатки з тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статті автора %s'; // текст для страницы автора
    $text['404'] = 'Помилка 404'; // текст для страницы 404
    $text['page'] = 'Сторінка %s'; // текст 'Страница N'
    $text['cpage'] = 'Сторінка коментарів %s'; // текст 'Страница комментариев N'
    $delimiter = '\\'; // разделитель между "крошками"
    $delim_before = '<span class="divider">'; // тег перед разделителем
    $delim_after = '</span>'; // тег после разделителя
    $show_home_link = 0; // 1 - показывать ссылку "Главная", 0 - не показывать
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

        if (is_category()) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $delimiter);
                $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                if ($show_home_link == 1) echo $delimiter;
                echo $cats;
            }
            if (get_query_var('paged')) {
                $cat = $cat->cat_ID;
                echo $delimiter . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current == 1) echo $delimiter . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }

        } elseif (is_search()) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif (is_day()) {
            if ($show_home_link == 1) echo $delimiter;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            if ($show_home_link == 1) echo $delimiter;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if ($show_home_link == 1) echo $delimiter;
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0 || get_query_var('cpage')) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if (get_query_var('cpage')) {
                    echo $delimiter . sprintf($link, get_permalink(), get_the_title()) . $delimiter . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current == 1) echo $before . get_the_title() . $after;
                }
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if (get_query_var('paged')) {
                echo $delimiter . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current == 1) echo $delimiter . $before . $post_type->label . $after;
            }

        } elseif (is_attachment()) {
            if ($show_home_link == 1) echo $delimiter;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif (is_page() && !$parent_id) {
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif (is_page() && $parent_id) {
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
                    if ($i != count($breadcrumbs) - 1) echo $delimiter;
                }
            }
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            if ($show_current == 1) echo $delimiter . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif (is_author()) {
            if ($show_home_link == 1) echo $delimiter;
            global $author;
            $author = get_userdata($author);
            echo $before . sprintf($text['author'], $author->display_name) . $after;

        } elseif (is_404()) {
            if ($show_home_link == 1) echo $delimiter;
            echo $before . $text['404'] . $after;

        } elseif (has_post_format() && !is_singular()) {
            if ($show_home_link == 1) echo $delimiter;
            echo get_post_format_string(get_post_format());
        }

        echo '</div><!-- .breadcrumbs -->';

    }
}

add_action('wp', 'es_pageviews');
add_action('manage_posts_custom_column', 'display_pageviews_row', 10, 2);
add_filter('manage_pages_columns', 'display_pageviews');
add_filter('manage_posts_columns', 'display_pageviews');

function es_pageviews()
{
    if (is_single() || is_page()) {
        global $post;
        $pv = get_post_meta($post->ID, '_pageviews', true);
        update_post_meta($post->ID, '_pageviews', $pv + 1);
    }
}

function display_pageviews($columns)
{
    $columns['pv'] = __('PageViews');
    return $columns;
}

function display_pageviews_row($column_name, $post_id)
{
    if ($column_name != 'pv') return;
    $pv = get_post_meta($post_id, '_pageviews', true);
    echo $pv ? $pv : 0;
}

function the_pageview()
{
    global $post;
    $pv = get_post_meta($post->ID, '_pageviews', true);
    echo $pv ? $pv : 0;
}

function infomist_theme_scripts()
{
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/js/flexslider.css');
    wp_enqueue_script('flexslider-init', get_template_directory_uri() . '/js/flexslider-init.js', array('jquery'), null, false);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), null, true);
    wp_register_script('jq', 'http://code.jquery.com/jquery-latest.min.js');
    wp_enqueue_script('jq');
}

add_action('wp_enqueue_scripts', 'infomist_theme_scripts');

function subpage_peek()
{
    global $post;
    $args = array(
        'post_parent' => $post->ID,
        'post_type' => 'page'
    );
    $subpages = new WP_query($args);
    if ($subpages->have_posts()) :
        $output = '<ul>';
        while ($subpages->have_posts()) : $subpages->the_post();
            $output .= '<li><strong><a href="' . get_permalink() . '">' . get_the_title() . '</a></strong>
                        <p>' . get_the_excerpt() . '<br />
                        <a href="' . get_permalink() . '">Читать подробнее →</a></p></li>';
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
function my_widget_execute_php($text)
{
    if (strpos($text, '<?') !== false) {
        ob_start();
        eval('?>' . $text);
        $text = ob_get_contents();
        ob_end_clean();
    }
    return $text;
}

function news()
{
    $outputs = '';
    $outputs = '<h1><a href="' . get_the_permalink(30) . '">Новини</a></h1>';
    $wp_query = null;

    $tax_query = array(
        array(
            'taxonomy' => 'tribe_events_cat',
            'terms'    => array( 5860 ),
            'field'    => 'tag_ID',
        ),
        array(
            'taxonomy' => 'cat',
            'terms'    => array( 79 ),
            'field'    => 'term_id',
        ),
        'relation' => 'OR'
    );

    $args      = array(
        'tax_query'      => $tax_query,
        'category__in'   => array( 79 ),
        'posts_per_page' => 15,
    );
    $wp_query  = new WP_Query( $args );
    $outputs .= '<ul class="all-news">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $style = '';
        $refresh = '';
        if (in_category('refresh')) {
            $refresh = 'refresh';
        };
        $outputs .= '<li class="single-news '. $refresh .'">';
        $today = date("j");
        $post_date = get_the_time("d");
        if ($today == $post_date) {
            $outputs .= '<div class="time">' . get_the_time("H:i") . '</div>';
        } else {
            $outputs .= '<div class="time">' . get_the_time("d.m") . '</div>';
        }
        if (in_category('black_news')) {
            $style = 'style="font-weight:700; color:#000;"';
        };
        $outputs .= '<p><a href="' . get_permalink() . '"';
        $outputs .= $style;
        $outputs .= '>' . get_the_title() . '</a></p>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '<li class="link-to-all-news">';
    $outputs .= '<a href="' . get_the_permalink(30) . '" class="all-news-link">Усі новини</a>';
    $outputs .= '</li>';
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function top_news()
{
    $outputs = '';
    $outputs = '<h1><a href="' . get_the_permalink(32) . '">ТОП-новини</a></h1>';
    $wp_query = null;

    $wp_query = new WP_Query();
    $wp_query->query("cat=5" . "&showposts=4");
    $outputs .= '<ul class="all-news">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $style = '';
        $refresh = '';
        if (in_category('refresh')) {
            $refresh = 'refresh';
        };
        $outputs .= '<li class="single-news top-news'. $refresh .'">';
        $post_id = get_the_ID();
        $outputs .= '<div class="time">' . get_the_post_thumbnail( $post_id, 'top_news_thumb' ) .  '</div>';
        if (in_category('black_news')) {
            $style = 'style="font-weight:700; color:#000;"';
        };
        $outputs .= '<p><a href="' . get_permalink() . '"';
        $outputs .= $style;
        $outputs .= '>' . get_the_title() . '</a></p>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function week()
{
    $outputs = '';
    $outputs .= '<h2 class="slide"><a href="' . get_permalink(179) . '">ТЕМА ТИЖНЯ</a></h2>';
    $outputs .= '<div class="week-wrapp">';
    $outputs .= '<div class="week-thumb-wrapp">';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=15' . '&showposts=1');
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= '<div class="week">';
        $outputs .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a>';
        $outputs .= '</div>';
    endwhile;
    echo $outputs;
    $outputs = '';
    wp_reset_query();
    $outputs .= '<div class="week-thema">';
    $wp_query = null;
    $wp_query = new WP_Query('page_id=179');
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= '<p>' . get_the_content() . '</p>';
    endwhile;
    wp_reset_query();

    $outputs .= '</div>';
    $outputs .= '</div>';
    echo $outputs;
    $outputs = '';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=15' . '&showposts=3');
    $outputs .= '<ul class="week-news">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $tempvar = date('d.m.Y', strtotime("last Monday"));
        $tempvar = strtotime($tempvar);
        $publish = get_the_date('d.m.Y');
        $publish = strtotime($publish);
        $result =  $publish - $tempvar;
        if ( $result >= 0 ){
        $outputs .= '<li class="single-week-news"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
    endwhile;
    $outputs .= '</ul>';
    $outputs .= '</div>';
    echo $outputs;
    return $outputs;
}

function interview()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(94) . '">Інтерв\'ю</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=10' . '&showposts=2');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function first_face()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(88) . '">Від першої особи</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=9 ' . '&showposts=2');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= '<li class="single-news">';
        $outputs .= '<div class="time">' . get_wp_user_avatar($authordata->ID, 72, "left") . '</div>';
        $author = get_the_author();
        $user_description = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $author . '</a></h2>';
        $outputs .= '<h4><a href="' . get_permalink() . '">' . $user_description . '</a></h4>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    echo $outputs;
    return $outputs;
}

function summary()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(197) . '">Публікації</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=4020' . '&showposts=3');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function networking()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(203) . '">Обговорюють у мережі</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=21' . '&showposts=2');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function charity()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(209) . '">Благодійність</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=22' . '&showposts=2');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function more_interview()
{
    $outputs = '';
    $outputs .= '<h1><a href="' . get_the_permalink(94) . '">Інтерв\'ю</a></h1>';
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('cat=10' . '&showposts=4');
    $outputs .= '<ul class="interview">';
    while ($wp_query->have_posts()) : $wp_query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function projects()
{
    $outputs = '';
    $link = get_home_url() . "/spets-proekty/";
    $outputs .= '<h1><a href="' . $link . '">Спецпроекти</a></h1>';
    $projects = get_terms('spec_projects');
    foreach ($projects as $project) {
        $projects_id[] = $project->term_id;
    }
    $tax_query = array(
        array(
            'taxonomy' => 'spec_projects',
            'terms' => $projects_id,
        )
    );
    $args = array(
        'tax_query' => $tax_query,
        'posts_per_page' => 2,
    );
    $query = new WP_Query($args);
    $outputs .= '<ul class="interview">';
    while ($query->have_posts()) : $query->the_post();
        $outputs .= ' <li class="single-news">';
        $outputs .= '<div class="time">' . get_the_post_thumbnail() . '</div>';
        $name = get_the_title();
        $outputs .= '<h2><a href="' . get_permalink() . '">' . $name . '</a></h2>';
        $outputs .= '</li>';
    endwhile;
    $outputs .= '</ul>';
    wp_reset_query();
    echo $outputs;
    return $outputs;
}

function custom_admin_css()
{
    print "<style>th#wpseo-focuskw, th#wpseo-metadesc, td.wpseo-metadesc, td.wpseo-focuskw  {display: none} th#title {width: 200px} th#wpseo-title {width: 150px} th#pv {width: 40px}</style>";
}

add_action('admin_head', 'custom_admin_css');

add_action('wp_footer', 'add_google_analytics');
function add_google_analytics()
{ ?>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-64836252-1', 'auto');
        ga('send', 'pageview');

    </script>

<?php }

function fancybox()
{

    wp_enqueue_script('fancybox', get_stylesheet_directory_uri() . '/fancybox/source/jquery.fancybox.js', null, false);
    wp_enqueue_style('fancy_style', get_stylesheet_directory_uri() . '/fancybox/source/jquery.fancybox.css', null, false);
    wp_register_script('fancybox_sc', get_stylesheet_directory_uri() . '/js/scripts.js');
    wp_enqueue_script('fancybox_sc');
}

add_action('wp_enqueue_scripts', 'fancybox');

function evgmoskalenko_copyright()
{ ?>
    <script>
        document.oncopy = function () {
            var bodyElement = document.body;
            var selection = getSelection();
            var href = document.location.href;
            var copyright = "<br><br>Джерело: <a href='" + href + "'> infomist.ck.ua </a><br>© infomist.ck.ua";
            var text = selection + copyright;
            var divElement = document.createElement('div');
            divElement.style.position = 'absolute';
            divElement.style.left = '-99999px';
            divElement.innerHTML = text;
            bodyElement.appendChild(divElement);
            selection.selectAllChildren(divElement);
            setTimeout(function () {
                bodyElement.removeChild(divElement);
            }, 0);
        };
    </script>
<?php }
add_action('wp_footer', 'evgmoskalenko_copyright', 95);

add_action('init', 'create_taxonomy');
function create_taxonomy()
{
    $labels = array(
        'name' => 'Спецпроекти',
        'singular_name' => 'Спецпроект',
        'search_items' => 'Шукати спецпроекти',
        'all_items' => 'Усі спецпроекти',
        'edit_item' => 'Редагувати спецпроект',
        'update_item' => 'Оновити спецпроект',
        'add_new_item' => 'Додати новий спецпроект',
        'new_item_name' => 'Новий спецпроект',
        'menu_name' => 'Спецпроекти',
    );
    $args = array(
        'label' => '',
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => false,
        'capabilities' => array(),
        'meta_box_cb' => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column' => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin' => false,
        'show_in_quick_edit' => null, // по умолчанию значение show_ui
    );
    register_taxonomy('spec_projects', array('post'), $args);
}

add_action('spec_projects_term_edit_form_tag', 'edit_form_tag');
add_action('spec_projects_edit_form_fields', ('additional_week_fields'), 10, 2);
add_action('edited_spec_projects', 'save_week_fields');

add_action('after_setup_theme', 'projects_theme_setup_thumbnail');
function projects_theme_setup_thumbnail()
{
    add_image_size( 'wordpress-thumbnail', 140, 100, array( 'center', 'top' ) );
}

function news_thumbnail() {
    add_image_size( 'top-news-thumbnail', 120, 100, array( 'center', 'top' ) );
}
add_action('after_setup_theme', 'news_thumbnail');

function new_home_thumb() {
    add_image_size( 'home_thumb', 320, auto, array( 'center', 'top' ) );
}
add_action('after_setup_theme', 'new_home_thumb');
function top_news_thumb_f() {
    add_image_size( ' top_news_thumb', 85, auto, array( 'center', 'top' ) );
}
add_action('after_setup_theme', 'top_news_thumb_f');

function do_not_cache_feeds(&$feed) {
    $feed->enable_cache(false);
}

add_action( 'wp_feed_options', 'do_not_cache_feeds' );