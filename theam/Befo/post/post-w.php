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
		<!-- blog-default-area-start -->
		<div class="blog-default-area pt-70 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-9 mb-30">
						<div class="blog-default-wrapper">

							<div class="blog-default-text mb-25">
								<div class="entry-content clearfix">
			                	<?php $this->content(); ?>
			                    </div>
								<div class="blog-default-meta">
									<span><?php $this->author->screenName(); ?></span>
									<span><?php echo date('m-d' , $this->modified); ?></span>
									<span><?php $this->category(',', true, 'none'); ?></span>
								</div>
								
							</div>

							<!--<div class="post-comments mt-40 mb-60">
								<div class="coment-title mb-35">
									<h2>Comments (3)</h2>
								</div>
								<div class="latest-comments">
									<ul>
										<li>
											<div class="comments-box mb-30">
												<div class="comments-avatar">
													<img src="img/blog/comments1.png" alt="">
												</div>
												<div class="comments-text">
													<div class="avatar-name">
														<h5>Sadat Bin Shaker <span>13 june, 2018</span></h5>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													<a href="#">Reply</a>
												</div>
											</div>
											<ul class="comments-reply">
												<li>
													<div class="comments-box mb-30">
														<div class="comments-avatar">
															<img src="img/blog/comments2.png" alt="">
														</div>
														<div class="comments-text">
															<div class="avatar-name">
																<h5>Jennifer S. Bowen <span>13 june, 2018</span></h5>
															</div>
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
															<a href="#">Reply</a>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<li>
											<div class="comments-box">
												<div class="comments-avatar">
													<img src="img/blog/comments3.png" alt="">
												</div>
												<div class="comments-text">
													<div class="avatar-name">
														<h5>Omar Elnagar <span>13 june, 2018</span></h5>
													</div>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
													<a href="#">Reply</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="post-comments-form">
								<div class="post-title mb-35">
									<h2>Leave a Comment</h2>
								</div>
								<form action="#">
									<div class="row">
										<div class="col-xl-6">
											<input placeholder="Name: " type="text">
										</div>
										<div class="col-xl-6">
											<input placeholder="Email: " type="email">
										</div>
										<div class="col-xl-12">
											<textarea name="comments" id="comments" cols="30" rows="10" placeholder="Comments"></textarea>
											<button type="submit">send</button>
										</div>
									</div>
								</form>
							</div>-->
							<style>
							/*评论区域*/
.comment-list{padding:0;margin:0;}
.comment-list li{list-style:none}
.comment-meta{line-height:1;margin-bottom:1em;color:#939393;font-size:12px;}
.comment-meta a{font-style:normal;color:#939393;font-size:12px;}
.comment-author{font-size:13px}
.comment-author img{float:left;margin:0 10px 0 0;width:40px;height:40px;}
.fn,.fn a{color: #18779d;padding-right: 3px;font-size: 14px;font-style: normal;}
.comment-reply-link{float:right;font-size:12px;line-height:20px;padding:0 6px;background:#18779d;border-radius:4px;display: none;cursor: pointer;}
.comment-reply-link a{color: #fff;}
.comment-body{padding:25px 0 0 0;border-bottom:1px solid #eee;position:relative;}
.comment-body .reply{position:absolute;top: 30px;right:0;}
.comment-body .reply a:hover{color: #fff;}
.comment-body:hover .comment-reply-link{display:block}
.comment-children{margin-left:50px;}
#comments p{margin-left:50px}

/*评论翻页*/
ol.page-navigator li{display:inline-block;color:#5f5f5f}
ol.page-navigator{margin:20px 0;padding:0;list-style:none;text-align:center}
ol.page-navigator li a{font-size:14px;padding:0 20px;color: rgba(0,0,0,.6);}
ol.page-navigator li.current a{color:#18779d;}

/*评论表单框*/

.respond textarea{font-size:14px}
.comment-reply-title {font-size:20px;font-weight:600;margin:0;font-family:PingFang SC,Hiragino Sans GB,Microsoft YaHei,STHeiti,WenQuanYi Micro Hei,Helvetica,Arial,sans-serif;}
.respond #new_comment_form{margin-top:15px;padding:24px 0 0;background:#f8f8f8;border-radius:8px;}
.respond #new_comment_form .input_body{padding-left:20px;padding-right:20px}
.respond #new_comment_form .input_body{padding-top:15px;padding-bottom:15px;height:48px;margin-top:12px;position:relative;background-color:#fbfbfb}
.respond #new_comment_form .input_body li,.respond #new_comment_form .input_body ul{list-style:none;margin:0;padding:0}
.respond #new_comment_form .input_body .ident{width:75%}
.respond #new_comment_form .input_body li{display:block;float:left;width:33.33%;line-height:0;}
.respond #new_comment_form .input_body li input{z-index:10;position:relative;background-color:transparent;padding-right:1.5em;padding-left:1.5em}
.respond #new_comment_form .input_body li:last-child{margin-right:0}
.respond #new_comment_form .new_comment{position:relative;z-index:12}
.respond #new_comment_form .comment_triggered{display:none}
.respond #new_comment_form input,.respond #new_comment_form textarea{padding:0;line-height:1.4;border:none;width:100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;outline:0}
.respond #new_comment_form textarea{line-height:1.8;padding:0 20px 0 20px;background-color:transparent;resize:none;}
.respond #new_comment_form .comment_submit_button{padding:0px 8px;width:auto;position:absolute;right:0;top:0;background-color:#000;color:#fff;height:32px;margin:8px 10px 8px 0;border-radius:4px;text-decoration:none;font-size:14px;}
.respond #new_comment_form .comment_submit_button:hover{background-color:#303538}
@media print,screen and (max-width:35.5em){.input_body li{float:none;width:100%;margin-bottom:.6em}
}

							</style>
							
							<?php $this->need('comments.php'); ?>
							
						</div>
					</div>
					<?php $this->need('sidebar.php'); ?>
				</div>	
			</div>
		</div>
		<!-- blog-default-area-end -->
		<?php $this->need('footer.php'); ?>