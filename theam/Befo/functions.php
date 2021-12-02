<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/theme.php");
require_once("core/oin.php");
function themeConfig($form)
{
    $index = Helper::options()->siteUrl;
?>  
    <link rel="stylesheet" href="<?php echo THEME_URL ?>/core/setting.s.css">
    <script src="//cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>  
    <div class="j-setting-contain">
        <link href="<?php echo THEME_URL ?>/core/j.setting.min.css" rel="stylesheet" type="text/css" />
        <div>
            <div class="j-aside">
                <div class="logo">设置面板</div>
                <ul class="j-setting-tab">
                    <li data-current="j-setting-notice">最新公告 Noti</li>
                    <li data-current="j-setting-global">常规设置 Set</li>
                    <li data-current="j-setting-index">首页设置 Index</li>

                    <li data-current="j-setting-color">风格样式 Style</li>
                    <li data-current="j-setting-aside">边栏页脚 Side</li>
                    
                    <li data-current="j-setting-seo">SEO设置 Seo</li>
                    
                </ul>
                <?php require_once("core/backup.php"); ?>
            </div>
        </div>
        
    <div class="j-setting-notice">
    <!--公告-->  
    <div class="miracles-pannel pannel_clo">
    <span class="spimes_logo" href="javascript:;"></span>
	<h1>Befo 设置面板</h1>
	<p>Befo 是极简设计创意HTML5作品集模板，风格独特的和干净的代码。</p>
    <hr><p>提交sitemap可以向搜索提交网站的sitemap文件，帮助spider更好的抓取您的网站。</p>
    <p>sitemap.xml地图：<a href='<?php echo $index ?>sitemap.xml' target='_blank'><?php echo $index ?>sitemap.xml</a> <a href='https://ziyuan.baidu.com/linksubmit'>(地图提交)</a><p>
    <hr>

	</div>
	
	<!--公告-->  
    </div>
        <script src="<?php echo THEME_URL ?>/core/j.setting.min.js"></script>
    <?php
    
    //网站模式

	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon);
    $favicon->setAttribute('class', 'j-setting-content j-setting-global');
    

    $logoimg = new Typecho_Widget_Helper_Form_Element_Text('logoimg', NULL, NULL, _t('logo地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //'));
    $form->addInput($logoimg);
    $logoimg->setAttribute('class', 'j-setting-content j-setting-global');
    
    $introduce = new Typecho_Widget_Helper_Form_Element_Textarea('introduce', NULL, NULL, _t('官方介绍'), _t(''));
    $form->addInput($introduce);
    $introduce->setAttribute('class', 'j-setting-content j-setting-global');

    
    $topimg = new Typecho_Widget_Helper_Form_Element_Text('topimg', NULL, NULL, _t('头部背景'), _t(''));
    $form->addInput($topimg);
    $topimg->setAttribute('class', 'j-setting-content j-setting-global');
    
    
    $indexnav = new Typecho_Widget_Helper_Form_Element_Textarea('indexnav', NULL, NULL, _t('首页作品导航'), _t('格式：英文标识|中文描述,英文标识和下方的英文标识需要保持一致'));
    $form->addInput($indexnav);
    $indexnav->setAttribute('class', 'j-setting-content j-setting-global');
    
    $indexnews = new Typecho_Widget_Helper_Form_Element_Textarea('indexnews', NULL, NULL, _t('首页作品文章'), _t('格式：文章id|英文标识'));
    $form->addInput($indexnews);
    $indexnews->setAttribute('class', 'j-setting-content j-setting-global');
	
   
	
	$footlist = new Typecho_Widget_Helper_Form_Element_Text('footlist', NULL, NULL, _t('首页底部推荐栏目'), _t('首页底部推荐栏目'));
	$form->addInput($footlist); 
	$footlist->setAttribute('class', 'j-setting-content j-setting-index');
   
  

	$webcss = new Typecho_Widget_Helper_Form_Element_Textarea('webcss', NULL, NULL, _t('自定义CSS'), _t('自定义样式,内置nexzhu和webmo字体，切换可添加<b style="color: red;">body {font-family: webmo!important;}</b>'));
    $form->addInput($webcss);
    $webcss->setAttribute('class', 'j-setting-content j-setting-color');

	$tophtml = new Typecho_Widget_Helper_Form_Element_Textarea('tophtml', NULL, NULL, _t('页头代码'), _t('添加在页面</head>前,比如：站长平台HTML验证代码,谷歌分析代码'));
    $form->addInput($tophtml);
    $tophtml->setAttribute('class', 'j-setting-content j-setting-color');

	$foothtml = new Typecho_Widget_Helper_Form_Element_Textarea('foothtml', NULL, NULL, _t('页脚代码'), _t('添加在页面</body>前,比如：客服工具等js代码，注意 统计代码不在这里填！！'));
    $form->addInput($foothtml);
    $foothtml->setAttribute('class', 'j-setting-content j-setting-color');


  
	$footnav = new Typecho_Widget_Helper_Form_Element_Textarea('footnav', NULL, NULL, _t('页脚版权设置'), _t('页脚版权/备案信息，比如：版权所有 本站内容未经书面许可,禁止一切形式的转载。粤ICP备123456号-1. All rights reserved.'));
    $form->addInput($footnav);
    $footnav->setAttribute('class', 'j-setting-content j-setting-aside');


    $zztj = new Typecho_Widget_Helper_Form_Element_Text('zztj', NULL, NULL, _t('网站统计代码'), _t('在这里填入你的网站统计代码,这个可以到百度统计或者cnzz上申请。'));
    $form->addInput($zztj);
    $zztj->setAttribute('class', 'j-setting-content j-setting-aside');

	
 
  
    $seotitle = new Typecho_Widget_Helper_Form_Element_Text('seotitle', NULL, NULL, _t('首页标题<b style="color: red;">✱</b>'), _t('首页SEO标题，不设置默认显示[设置]里面的站点标题和描述，<b style="color: red;">关键字和描述，请到程序设置</b>'));
    $form->addInput($seotitle);
    $seotitle->setAttribute('class', 'j-setting-content j-setting-seo');

	$themecompress = new Typecho_Widget_Helper_Form_Element_Select('themecompress',array('0'=>'不开启','1'=>'开启'),'0','HTML压缩功能','是否开启HTML压缩功能,缩减页面代码');
    $form->addInput($themecompress);
    $themecompress->setAttribute('class', 'j-setting-content j-setting-seo');


	$Keywordspress = new Typecho_Widget_Helper_Form_Element_Textarea('Keywordspress', NULL, NULL, _t('关键字内链<b style="color: red;">✱</b>'), _t('文章详情页自动关键词链接,每行1组以"<b style="color: red;">关键词|(半角竖线)链接</b>"形式)'));
    $form->addInput($Keywordspress);
    $Keywordspress->setAttribute('class', 'j-setting-content j-setting-seo');

	



}


//后台编辑器添加功能
function themeFields($layout) {
	
    $leipost = new Typecho_Widget_Helper_Form_Element_Radio('leipost',
	    array('0' => _t('文章页'),
	          '1' => _t('作品页'),		     
	    ),
	    '0', _t('文章页/作品页'), _t(''));
	$layout->addItem($leipost);
  
    $img = new Typecho_Widget_Helper_Form_Element_Text('img', NULL, NULL, _t('封面图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的缩略图，留空则显示默认缩略图'));
    $img->input->setAttribute('class', 'w-100 setfb');
    $layout->addItem($img);

	
}




function themeInit($archive) {
    
/* 强制用户关闭反垃圾保护 */
Helper::options()->commentsAntiSpam = false;
/* 强制用户关闭检查来源URL */
Helper::options()->commentsCheckReferer = false;
/* 强制用户强制要求填写邮箱 */
 Helper::options()->commentsRequireMail = true;
/* 强制用户强制要求无需填写url */
Helper::options()->commentsRequireURL = false;    

Helper::options()->commentsMaxNestingLevels = '5'; //最大嵌套层数
Helper::options()->commentsOrder = 'DESC'; //将最新的评论展示在前
Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <img src="" class=""> <code> <del>';

if ($archive->is('single')) {
        
        $archive->content = get_glo_keywords($archive->content);
        
}


}


?>

