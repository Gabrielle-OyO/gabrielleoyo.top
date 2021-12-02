		<!-- footer-area-start -->
		<footer>
			<div class="footer-area gray-bg pt-60 pb-40">
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-lg-5 col-md-5 mb-20">
							<div class="footer-icon">
								<a href="#"><span class="ti-twitter"></span></a>
								<a href="#"><span class="ti-vimeo"></span></a>
								<a href="#"><span class="ti-dribbble"></span></a>
								<a href="#"><span class="ti-instagram"></span></a>
							</div>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-7 mb-20">
							<div class="copyright text-md-right">
								<p>页面执行：<?php echo timer_stop();?> <?php $this->options->footnav(); ?><?php $this->options->zztj(); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer-area-end -->


		<!-- JS here -->
        <script src="<?php $this->options->themeUrl('js/vendor/modernizr-3.5.0.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/vendor/jquery-1.12.4.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/popper.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/owl.carousel.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/isotope.pkgd.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/jquery.magnific-popup.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/slick.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/jquery.meanmenu.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/ajax-form.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/wow.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/jquery.scrollUp.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/imagesloaded.pkgd.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/jquery.magnific-popup.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/plugins.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
        
        <?php if ($this->options->foothtml): ?>
        <?php $this->options->foothtml(); ?>
        <?php endif; ?>
        <?php if ($this->options->themecompress == '1'):?>
        <?php error_reporting(0); $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); ?>
        <?php endif; ?>
        <?php $this->footer(); ?>
        
    </body>
</html>
