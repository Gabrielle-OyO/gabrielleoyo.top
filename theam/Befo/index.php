<?php
/**
 * Befo 是极简设计创意HTML5作品集模板，风格独特的和干净的代码
 *
 * @package Befo Theme
 * @author 小灯泡设计
 * @version 1.0.0
 * @link https://www.dpaoz.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
		<!-- slider-area-start -->
		<div class="slider-area">
			<div class="slider-wrapper pt-135 pb-140 be_bg">
				<div class="container">
					<div class="col-xl-8">
						<div class="slider-content">
							<h3>Hello</h3>
							<p><?php $this->options->introduce(); ?></p>	
							<div class="slider-icon">
								<span>Follow me :</span>
								<a href="#"><span class="ti-twitter"></span></a>
								<a href="#"><span class="ti-vimeo"></span></a>
								<a href="#"><span class="ti-dribbble"></span></a>
								<a href="#"><span class="ti-instagram"></span></a>
							</div>					
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- portfolio-area start -->
		<div class="portfolio-area  pt-95 pb-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="portfolio-menu mb-40">
							<button class="active" data-filter="*">All</button>
							<?php indexnav(); ?>
						</div>
					</div>
				</div>
				<div class="row grid">
				<?php indexnews(); ?>
				</div>

			</div>
		</div>
		<!-- portfolio-area end -->
<?php $this->need('footer.php'); ?>