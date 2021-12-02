<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
		<!-- breadcrumb-area-start -->
		<div class="breadcrumb-area pt-100 pb-100 gray-bg be_bg">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
						<div class="breadcrumb-text text-center">
							<h3><?php $this->title(); ?></h3>
							<p><?php $this->excerpt(80, '...');?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area-end -->
		<!-- project-details-area-start -->
		<div class="project-details-area pt-70 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-10 col-lg-10 offset-lg-1 offset-xl-1">
						<div class="projct-details-wrapper">
							<div class="project-details-text">
							
								<div class="project-details-meta">
									<span><?php $this->author->screenName(); ?></span>
									<span><?php echo date('m-d' , $this->modified); ?></span>
									<span><?php $this->category(',', true, 'none'); ?></span>
								</div>
								
								<div class="entry-content clearfix">
				                <?php $this->content(); ?>
			                    </div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- project-details-area-end -->
		<?php $this->need('footer.php'); ?>