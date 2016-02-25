<?php
header("Content-Type: text/css");
require_once('../../../wp-load.php');
?>
/*
Theme Name: Minty
Theme URI: http://c7sky.com/wordpress-theme-minty.html
Author: 小影
Author URI: http://c7sky.com/
Description: Minty 是一款小清新风格的 WordPress 主题，使用 HTML5&CSS3 实现响应式设计完美适配移动端，支持 WordPress 3.1 新增的所有文章格式，支持 AJAX 评论与列表页无限加载，内置 8 种主题色彩。主题取名为 Minty，希望能带给你清爽的浏览体验！
Version: 2.1
Tags: 绿色、蓝色、红色、蓝色、紫色、黄色、灰色、橙色、浅色系、深色、一栏、两栏、边栏在右侧、响应式布局、自定义背景、自定义菜单、特色图像、灵活顶部、小清新、微格式、文章形式、文章置顶、主题选项
*/
<?php

echo stripslashes(get_option('minty_custom_css'));

$iconNumber = 3;
$socialPlatforms = array(
	'weibo' => '新浪微博', 
	'tqq' => '腾讯微博',
	'twitter' => 'Twitter', 
	'renren' => '人人网', 
	'facebook' => 'Facebook', 
	'googleplus' => 'Google+', 
	'linkedin' => 'LinkedIn', 
	'flickr' => 'Flickr', 
	'github' => 'GitHub'
);
foreach ($socialPlatforms as $platform => $name) {
	$url = get_option('minty_' . $platform);
	if (!empty($url)) $iconNumber++;
}
echo '#header .connect { +width: ' . $iconNumber*35 . 'px }';

$colorName = get_theme_mod('minty_color_scheme', 'turquoise');

if ( !empty($colorName) && $colorName != 'turquoise' ) {

	$lighterColor = '#1abc9c';
	$darkerColor = '#16a085';
	
	switch ($colorName) {
		case 'emerland':
			$lighterColor = '#e74c3c';
			$darkerColor = '#c0392b';
			break;
		case 'peter-river':
			$lighterColor = '#3498db';
			$darkerColor = '#2980b9';
			break;
		case 'amethyst':
			$lighterColor = '#9b59b6';
			$darkerColor = '#8e44ad';
			break;
		case 'wet-asphalt':
			$lighterColor = '#34495e';
			$darkerColor = '#2c3e50';
			break;
		case 'sun-flower':
			$lighterColor = '#f1c40f';
			$darkerColor = '#f39c12';
			break;
		case 'carrot':
			$lighterColor = '#e67e22';
			$darkerColor = '#d35400';
			break;
		case 'alizarin':
			$lighterColor = '#e74c3c';
			$darkerColor = '#c0392b';
			break;
	}

?>
.commentlist .bypostauthor > div > div > .fn:after {
	background-color: <?php echo $darkerColor; ?>;
}

.commentlist .bypostauthor {
    _border-top-color: <?php echo $darkerColor; ?>;
}

a:hover,
.entry-cover:hover + .entry-header .entry-title a,
.entry-title a:hover,
.entry-meta a:hover,
.more-link,
.entry-summary a,
.entry-content a,
.wumii-text-a:hover,
#error404 a,
.commentlist .comment-author .fn,
.commentlist .comment-author .url,
.commentlist .comment-footer a,
.must-log-in a {
    color: #fff;
}


#nav a:hover,
#nav .current-menu-item a,
#nav .sub-menu,
#comment-settings {
    border-color: <?php echo $lighterColor; ?>;
}

.entry-footer .copyright,
#submit,
#submit:hover,
#submit:active,
#submit:disabled:hover {
    border-color: <?php echo $darkerColor; ?>;
}

#searchsubmit,
#nav .sub-menu a:hover,
a.entry-cover:before,
.pagination a:hover,
.page-title,
#submit,
#submit:hover,
#submit:active,
#submit:disabled:hover,
#nprogress .bar,
#featured-content.fccaption-cover a:hover h3 {
    background-color: <?php echo $lighterColor; ?>;
}
#nprogress .peg{box-shadow:0 0 10px <?php echo $lighterColor; ?>,0 0 5px <?php echo $lighterColor; ?>}
.widget_tag_cloud a:hover,
.widget-simpletags a:hover,
#featured-content.fccaption-below a:hover h3 {
    color: <?php echo $lighterColor; ?>!important;
}

.home .hentry.sticky {
    box-shadow: 0 2px 3px rgba(0,0,0,.1), 0 0 0 3px <?php echo $lighterColor; ?>;
}

::-moz-selection {
    background: <?php echo $lighterColor; ?>;
}

::selection {
    background: <?php echo $lighterColor; ?>;
} 


.entry-summary a:hover,
.entry-content a:hover {
    border-bottom-color: <?php echo $darkerColor; ?>
}
.entry-summary a:hover,
.entry-content a:hover,
#error404 a:hover,
.commentlist .comment-author .url:hover,
.commentlist .comment-footer a:hover,
.must-log-in a:hover {
    color: <?php echo $darkerColor; ?>;
}

.tags-links a:hover{color: #fff;}
<?php }; ?>
.commentlist .bypostauthor > div > div > .fn:after {
    content: "<?php echo get_option( 'minty_postauthor_text' ); ?>";
}
<?php
if (get_option('minty_show_post_summary_on_mobile') == 1) : ?>
@media only screen and (max-width: 540px) {
	.entry-summary { display:block; }
}
<?php endif;

if (get_option('minty_show_widget_title')) : ?>
.widget-title {
	padding-bottom: .5em;
}
.widget-title span {
	text-indent: 0;
	width: auto;
	background: none;
	display: block;
	height: auto;
}
<?php endif;

if (get_option('minty_sidebar_on_tablet') == '') : ?>
@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait),
only screen and (max-width: 800px) {
	#sidebar { display: none }
}
<?php endif;

if (get_option('minty_featured_image_noeffect') == 1) : ?>
a.entry-cover:before,
a.entry-cover:after {
	display:none;
}
a.entry-cover:hover img {
    -webkit-transform: none;
    -moz-transform: none;
    transform: none;
}
<?php endif;

if (get_option('minty_rounded_avatars') == 1) : ?>
.avatar,
.ds-avatar img {
    border-radius: 50%!important;
}
<?php endif;

if (get_option('minty_snowfall') != 'disabled') : ?>
body {
	overflow-x: hidden;
}
.snowflake {
    position: absolute;
    color: #fff;
    line-height: 1;
    pointer-events: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
<?php endif; ?>