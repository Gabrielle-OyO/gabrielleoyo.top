<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php if ($this->options->seotitle && $this->is('index')):?>
        <title><?php $this->options->seotitle(); ?></title> 
        <?php else : ?>  
        <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s的主页')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        <?php endif; ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">

		<?php if($this->options->favicon): ?><link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif;?>  
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/owl.carousel.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/animate.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/magnific-popup.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontawesome-all.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/meanmenu.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/themify-icons.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/slick.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/default.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/responsive.css'); ?>">
        
        <?php if ($this->options->webcss): ?>
        <style type="text/css"><?php $this->options->webcss(); ?></style>
        <?php endif; ?> 
        <?php if ($this->options->tophtml): ?>
        <?php $this->options->tophtml(); ?>
        <?php endif; ?> 
        <style>
        .be_bg{ background-image: url(<?php $this->options->topimg(); ?>); }
        </style>
        <!-- 通过自有函数输出HTML头部信息 -->
        <?php $this->header(); ?>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		<header>
			<!-- header-top-area-start -->
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-3">
							<div class="logo">
								<a href="index.html"><img src="<?php $this->options->logoimg();?>" alt="<?php $this->options->title() ?>" /></a>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9">
							<div class="main-menu text-right">
								<nav id="mobile-menu">
									<ul>
									   <li class="active"><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
									    
									    	<!-- dropdown -->
<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>						
<?php if ($categorys->levels === 0): ?>
<?php $children = $categorys->getAllChildren($categorys->mid); ?>
<?php if (empty($children)) { ?>
<li><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a></li>
<?php } else { ?>
<li class="active"><a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
											<ul class="sub-menu text-left">
											    <?php foreach ($children as $mid) { ?>
                                                <?php $child = $categorys->getCategory($mid); ?>
												<li><a href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?></a></li>
												<?php } ?>
											</ul>
										</li>
<?php } ?>
<?php endif; ?>
<?php endwhile; ?>
<!-- end dropdown -->
									    

									</ul>
								</nav>
							</div>
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- header-top-area-end -->
		</header>