<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
		<!-- breadcrumb-area-start -->
		<div class="breadcrumb-area pt-100 pb-100 gray-bg be_bg">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
						<div class="breadcrumb-text text-center">
							<h3> <?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?></h3>
							<p><?php echo $this->getDescription(); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area-end -->
		<!-- blog-default-area-start -->
		<div class="blog-default-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-9 mb-30">
					    
					    <?php if ($this->have()): ?>
                 	    <?php while($this->next()): ?>
						<div class="blog-default-wrapper">
							<div class="blog-default-img">
								<img src="img/blog/blog1.jpg" alt="" />
							</div>
							<div class="blog-default-text mb-30">
								<h4><?php $this->title() ?></h4>
								<p><?php $this->excerpt(120, '...');?></p>
								<div class="blog-default-meta">
									<span><?php $this->author->screenName(); ?></span>
									<span><?php echo date('m-d' , $this->modified); ?></span>
									<span><?php $this->category(',', false, 'none'); ?></span>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
					    <?php endif;?>
						
						<div class="paginations text-center pt-20">
							<ul>
								<?php $this->pageNav('<', '>', 3, '...', array('wrapTag' => 'ul', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'nexts',)); ?>
							</ul>
						
						</div>
					</div>
					<?php $this->need('sidebar.php'); ?>
				</div>	
			</div>
		</div>
		<!-- blog-default-area-end -->
		<?php $this->need('footer.php'); ?>