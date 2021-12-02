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
		<!-- portfolio-area-start -->
		<div class="portfolio-area  pt-95 pb-100">
			<div class="container">
				<div class="row grid">
				    <?php if ($this->have()): ?>
                 	<?php while($this->next()): ?>
					<div class="col-xl-3 col-lg-3 col-md-6 grid-item cat2 cat3">
						<div class="portfolio-wrapper mb-30">
							<div class="portfolio-img">
								<a href="<?php $this->permalink() ?>"><img src="<?php $this->fields->img(); ?>" alt="<?php $this->title() ?>" /></a>
								<div class="portfolio-content">
									<h4><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h4>
									<span><?php $this->category(',', false, 'none'); ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif;?>
					
				</div>
				<div class="paginations text-center pt-20">
								<?php $this->pageNav('<', '>', 3, '...', array('wrapTag' => 'ul', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'nexts',)); ?>
				</div>
			</div>
		</div>
		<!-- portfolio-area end -->
<?php $this->need('footer.php'); ?>