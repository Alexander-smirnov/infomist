<?
/*
 Plugin Name: news.yandex.ru WordPress RSS2.0
 Plugin URI: http://saintist.ru/
 Description: Support XML-based (http://www.w3.org/TR/REC-xml) RSS 2.0 (http://blogs.law.harvard.edu/tech/rss) from Yandex.
 Author: Khrapach Pavel {saintist}.
 Version: 0.2.5
 */
if ('news-yandex-ru.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not access this file directly. Thanks!');

define('NEWS_YANDEX_RU_VERSION', '0.2.5');
define('NEWS_YANDEX_RU_FOLDER_NAME', dirname(plugin_basename(__FILE__)));
define('NEWS_YANDEX_RU_PATH', ABSPATH.'wp-content/plugins/' . NEWS_YANDEX_RU_FOLDER_NAME);
define('NEWS_YANDEX_RU_URL', get_option('url').'/wp-content/plugins/' . NEWS_YANDEX_RU_FOLDER_NAME);

class news_yandex_ru
{
	var $cfg=array();

	function news_yandex_ru()
	{
        //remove_action('do_feed_news.yandex.ru', 'do_feed_news.yandex.ru');
		add_action('do_feed_news.yandex.ru', array(&$this,'feed'), 1);

		add_action('init', array(&$this,'init'));
        add_action('activate_news-yandex-ru/news-yandex-ru.php',array(&$this,'activate'));
        add_action('deactivate_news-yandex-ru/news-yandex-ru.php',array(&$this,'deactivate'));
		add_action('admin_menu', array(&$this,'menu'));

		add_action( 'save_post', array(&$this,'save_post'), 10, 2 );
		add_action( 'edit_post', array(&$this,'save_post'), 10, 2 );

		add_action( 'add_meta_boxes', array(&$this,'metabox') );
	}

	function feed($comments)
	{

    	if (!$comments)
    	{

        	global $wp_query;
	    	if($wp_query->query_vars['feed']=='news.yandex.ru')
	    	{
            	/*выводим  за последние 7 дней*/
		   		function filter_where($where = '') {
					$today_date = get_the_date('Y-m-d');
					//posts between publish date of wrap-up and 7 days prior
					// commented
					// $where .= " AND post_date >= '" . date('Y-m-d', strtotime('-7 days')) . "' AND post_date <= '" . date('Y-m-d', strtotime('+1 days')) . "'";
					// added
					$where .= " AND wp_posts.post_date >= '" . date('Y-m-d', strtotime('-7 days')) . "' AND wp_posts.post_date <= '" . date('Y-m-d', strtotime('+1 days')) . "'";
					return $where;
				}
		   		add_filter('posts_where', 'filter_where');
            	load_template( NEWS_YANDEX_RU_PATH.'/template.php');
				//exit;
	    	}

		}

	}
	
	/* added */
	function post_types($categoryId=false){

		$ret='';
		/*получаем все пользовательские типы записей*/
        $post_types=get_post_types(array(
			'public' => true,
			'_builtin' => false,
		), 'objects'); 
		foreach ($post_types as $post_type) {
		  $ret .= '<strong>'. $post_type->labels->singular_name. '</strong>';
		  $ret .= '<p class="news-yandex-ru-description">выберите рубрики посты из которых выводить в rss для яндекса. У выбранной рубрики в фид также будут включены все записи дочерних ей рубрик.</p>';
		  $ret .= '<p>';
		  /*получаем все иерархические taxonomies для типа записи*/
		  $taxonomies=get_taxonomies(array(
			'hierarchical' => true,
		    'public' => true,
			'_builtin' => false,
			'object_type' => array($post_type->name),
		  ), 'objects');
		  foreach ($taxonomies as $taxonomy) {
		    $ret .= $this->taxonomies(0, $taxonomy->name, $post_type->name);
		  }
		  $ret .= '</p>';
		}
    	return $ret;
		
    }

	/* added */
	function taxonomies($categoryId=false, $taxonomy='category', $post_type='post'){

        $full=false;
        $ret='<ul>';

        $args=array(
        	'hide_empty'=>0,
        	'hierarchical'=>0,
        	'parent'=>0

        );

        if($categoryId)
        {
        	$args['parent']=$categoryId;
        }

    	$terms=get_terms($taxonomy, $args);
        foreach($terms as $k=>$v)
    	{
        	$checked='';
        	if(isset($this->cfg['category'][$post_type][$taxonomy][$v->term_id]))
        	{
        		$checked=' checked';
        	}

        	$ret.='<li><div><input autocomplete="off" id="news_yandex_rucat'.$v->term_id.'" name="news_yandex_ru_category['.$post_type.']['.$taxonomy.']['.$v->term_id.']" type="checkbox" value="'.$v->term_id.'"'.$checked.'> <label for="news_yandex_rucat'.$v->term_id.'">'.$v->name.'</label></div>';

            $ret.=$this->taxonomies($v->term_id, $taxonomy, $post_type);

        	$ret.='</li>';
    	}

        $ret.='</ul>';
        if($ret!='<ul></ul>')
        {
        	$full=$ret;
        }

        if(!$categoryId)
        {
        	$ret='<div class="news-yandex-ru-category">'.$ret.'</div>';
        }
    	return $ret;

    }
	
	function category($categoryId=false){

        $full=false;
        $ret='<ul>';

        $args=array(
        	'hide_empty'=>0,
        	'hierarchical'=>0,
        	'parent'=>0

        );

        if($categoryId)
        {
        	$args['parent']=$categoryId;
        }


    	$category = get_categories( $args );
        foreach($category as $k=>$v)
    	{
        	$checked='';
        	if(isset($this->cfg['category'][$v->cat_ID]))
        	{
        		$checked=' checked';
        	}

        	$ret.='<li><div><input autocomplete="off" id="news_yandex_rucat'.$v->cat_ID.'" name="news_yandex_ru_category['.$v->cat_ID.']" type="checkbox" value="'.$v->cat_ID.'"'.$checked.'> <label for="news_yandex_rucat'.$v->cat_ID.'">'.$v->name.'</label></div>';

            $ret.=$this->category($v->cat_ID);

        	$ret.='</li>';
    	}

        $ret.='</ul>';
        if($ret!='<ul></ul>')
        {
        	$full=$ret;
        }

        if(!$categoryId)
        {
        	$ret='<div class="news-yandex-ru-category">'.$ret.'</div>';
        }
    	return $ret;

    }

    function init()
    {
    	$this->cfg=get_option('news_yandex_ru');

    	if(is_admin() && !empty($_POST['news_yandex_ru_update']))
    	{
    		if(!empty($_POST['news_yandex_ru_category']))
    		{
            	$this->cfg['category'] = $_POST['news_yandex_ru_category'];

    		}
    		else
    		{
             	$this->cfg['category']=array();
    		}

    		if(!empty($_POST['news_yandex_ru']))
    		{
    			if(!empty($_POST['news_yandex_ru']['url']) && trim($_POST['news_yandex_ru']['url'])!=$this->cfg['url'])
    			{
    				$this->cfg['url']=trim($_POST['news_yandex_ru']['url']);
    			}
                elseif(empty($_POST['news_yandex_ru']['url']))
    			{
                	$this->cfg['url']='';
    			}

    			if(!empty($_POST['news_yandex_ru']['alt']) && trim($_POST['news_yandex_ru']['alt'])!=$this->cfg['alt'])
    			{
    				$this->cfg['alt']=trim($_POST['news_yandex_ru']['alt']);
    			}
                elseif(empty($_POST['news_yandex_ru']['alt']))
    			{
                	$this->cfg['alt']='';
    			}

    			if(!empty($_POST['news_yandex_ru']['link']) && trim($_POST['news_yandex_ru']['link'])!=$this->cfg['link'])
    			{
    				$this->cfg['link']=trim($_POST['news_yandex_ru']['link']);
    			}
    			elseif(empty($_POST['news_yandex_ru']['link']))
    			{
                	$this->cfg['link']='';
    			}

    			if(!empty($_POST['news_yandex_ru']['count']) && trim($_POST['news_yandex_ru']['count'])!=$this->cfg['count'])
    			{
    				$this->cfg['count']=trim($_POST['news_yandex_ru']['count']);
    			}
    			elseif(empty($_POST['news_yandex_ru']['count']))
    			{
                	$this->cfg['count']=0;
    			}
    		}

    		update_option( 'news_yandex_ru', $this->cfg);
            $this->cfg=get_option('news_yandex_ru');
    	}


    }

	function activate()
	{
		
    	$cfg=array(
    		'url'=>'',
    	    'alt'=>get_bloginfo('name'),
    	    'link'=>get_bloginfo('url'),
    	    'category'=>array()
    	);
		
		global $wpdb;
		$wpdb->query("INSERT INTO {$wpdb->prefix}postmeta (post_id, meta_key, meta_value)
				SELECT {$wpdb->prefix}posts.ID, 'news_yandex_ru_hide', '0'
				FROM {$wpdb->prefix}posts
				WHERE {$wpdb->prefix}posts.post_status = 'publish'
					AND {$wpdb->prefix}posts.ID NOT IN (
						SELECT {$wpdb->prefix}postmeta.post_id
						FROM {$wpdb->prefix}postmeta
						WHERE {$wpdb->prefix}postmeta.meta_key = 'news_yandex_ru_hide'
					)
			");
		
    	add_option( 'news_yandex_ru', $cfg);
	}

	function deactivate()
	{

    	delete_option('news_yandex_ru');
	}

	function menu()
	{
    	add_options_page('Параметры news.yandex.ru WordPress RSS2.0', 'news.yandex.ru', 10, __FILE__, array(&$this,'config'));
	}

	function config()
	{
    	include "config.php";
	}

	/*метабокс для постов*/
 	function metabox()
	{
		add_meta_box(
	        'newsyandexru',
	        'news.yandex.ru',
	        array(&$this,'metaboxform'),
	        'post',
	        'side'
    	);
		// added
		$post_types=get_post_types(array(
			'public' => true,
			'_builtin' => false,
		), 'name');
		foreach ($post_types as $post_type) {
			add_meta_box(
				'newsyandexru',
				'news.yandex.ru',
				array(&$this,'metaboxform'),
				$post_type->name,
				'side'
			);
		}
	}

	function metaboxform($post)
	{
    	?><style>
    	#newsyandexru{
    		border:1px solid #E6DB55;
    		background:#FFFFE0;
    	}

    	#newsyandexru .inside{
    		background:#FFFFE0;
    	}
    	#newsyandexru .inside label{
    		color:#21759B;
    	}
    	</style><?
    	$hide =  get_post_meta($post->ID, 'news_yandex_ru_hide', true);
    	$checked='';
    	if($hide)
    	{
    		$checked=' checked';
    	}
    	?><input id="news_yandex_ru_hide_<?=$post->ID?>" name="news_yandex_ru_hide" type="checkbox" value="1"<?=$checked?>> <label  for="news_yandex_ru_hide_<?=$post->ID?>">Не  отображать эту запись в фиде для news.yandex.ru</label><?
	}
	/*сохраняем метаданные для поста*/
	function save_post($postId)
	{
    	if(isset($_POST['news_yandex_ru_hide']))
    	{
        	update_post_meta($postId, 'news_yandex_ru_hide', 1);
    	}
    	else
    	{
			// commented
        	// delete_post_meta($postId, 'news_yandex_ru_hide');
			// added
			update_post_meta($postId, 'news_yandex_ru_hide', 0);
    	}
	}

}

$news_yandex_ru = new news_yandex_ru();
?>