<div class="col-xl-3 col-lg-3 mb-30">
						<div class="widget mb-35">
                            <div class="sidebar-form">
                                <form id="search" class="search-form" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                                    <input placeholder="Search ..." type="text" name="s">
                                    
                                    <button type="submit">
                                        <span class="ti-search"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
						<div class="widget mb-35">
                            <h4 class="widget-title">最新推荐</h4>
                            <div class="sidebar-rc-post">
                                <ul>
                                    
                                    <?php $this->widget('Widget_Contents_Post_Recent','pageSize=5')->to($news);?>
                                    <?php if($news->have()):?>
                                    <?php while($news->next()): ?>
                                    <li>
                                        <div class="rc-post-thumb">
                                            <a href="<?php $news->permalink();?>">
                                            <?php if ($news->fields->img): ?>  <!--如果有自定义img-->
											<img src="<?php $news->fields->img(); ?>" alt="">
										    <?php else: ?>
											<img src="<?php $news->options->themeUrl(); ?>img/thumbnail.png" alt="">
										    <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="<?php $news->permalink();?>"><?php $news->title(); ?></a>
                                            </h4>
                                            <div class="widget-date"><?php $news->date('Y-m-d'); ?></div>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    
                                    
                                </ul>
                            </div>
                        </div>
						<div class="widget mb-35">
                            <h4 class="widget-title">分类栏目</h4>
							<ul class="blog-sidebar-link">
							    
					<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
					<?php while($category->next()): ?>
					<li><a href="<?php $category->permalink(); ?>"><span class="ti-angle-double-right"></span><?php $category->name(); ?></a></li>
					<?php endwhile; ?>
		
							</ul>
                        </div>
						<!--<div class="widget">
						   <h4 class="widget-title">Follow Us</h4>	
                           <div class="widget-social">
								<a href="#"><span class="ti-twitter"></span></a>
								<a href="#"><span class="ti-vimeo"></span></a>
								<a href="#"><span class="ti-dribbble"></span></a>
								<a href="#"><span class="ti-instagram"></span></a>
							</div>
                        </div>-->
					</div>