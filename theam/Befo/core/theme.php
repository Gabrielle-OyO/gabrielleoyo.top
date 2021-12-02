<?php
define("THEME_URL", str_replace('//usr', '/usr', str_replace(Helper::options()->siteUrl, Helper::options()->rootUrl . '/', Helper::options()->themeUrl)));
$str1 = explode('/themes/', (THEME_URL . '/'));
$str2 = explode('/', $str1[1]);
define("THEME_NAME", $str2[0]);



/**
* 首页作品导航
*/
function indexnav() {
 
        $settings = Helper::options()->indexnav;	
        $navtops_list = array();
        if (strpos($settings,'|')) {
			//解析关键词数组
			$kwsets = array_filter(preg_split("/(\r|\n|\r\n)/",$settings));
			foreach ($kwsets as $kwset) {
			$navtops_list[] = explode('|',$kwset);
			}
		}
        ksort($navtops_list);  //对关键词排序，短词排在前面	
    if($navtops_list){
        $readnum = 0;
		$i = 0;
		$j = 1;		
        foreach ($navtops_list as $key => $val) {			
            
            $str = '<button data-filter=".'.$val[$i].'">'.$val[$j].'</button>';
            
                $readnum += 1;
				echo $str;
                //$content = substr_replace($content,$str,$str_index,$len);
                //$content = $this->str_replace_limit($title,$str,$content,$this->limit);

		}
    }
    
}




/**
* 首页作品文章
*/
function indexnews() {
 
        $settings = Helper::options()->indexnews;	
        $navtops_list = array();
        if (strpos($settings,'|')) {
			//解析关键词数组
			$kwsets = array_filter(preg_split("/(\r|\n|\r\n)/",$settings));
			foreach ($kwsets as $kwset) {
			$navtops_list[] = explode('|',$kwset);
			}
		}
        ksort($navtops_list);  //对关键词排序，短词排在前面	
    if($navtops_list){
   
		$i = 0;
		$j = 1;		
        foreach ($navtops_list as $key => $val) {			
            

            Typecho_Widget::widget('Widget_Archive@kans'.$val[$i], 'pageSize=1&type=post', 'cid='.$val[$i])->to($ji);
            
            
            
            $simg = $ji->fields->img;
            $cate = '栏目';
            $str = '<div class="col-xl-3 col-lg-3 col-md-6 grid-item '.$val[$j].'">
						<div class="portfolio-wrapper mb-30">
							<div class="portfolio-img">
								<a href="'.$ji->permalink.'"><img src="'.$simg.'" alt="" /></a>
								<div class="portfolio-content">
									<h4><a href="'.$ji->permalink.'">'.$ji->title.'</a></h4>
									<span>'.$cate.'</span>
								</div>
							</div>
						</div>
					</div>';
            
              
				echo $str;
                //$content = substr_replace($content,$str,$str_index,$len);
                //$content = $this->str_replace_limit($title,$str,$content,$this->limit);

		}
    }
    
}




// 生成地图
function getxml(){

        $doc = new \DOMDocument('1.0','utf-8');//引入类并且规定版本编码
        $urlset = $doc->createElement("urlset");//创建节点 
        
        $db = Typecho_Db::get();
        $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit(100)
        ->order('created', Typecho_Db::SORT_DESC)
        );
        if($result){
        foreach($result as $val){            
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $permalink = $val['permalink'];
            $created = date('Y-m-d', $val['created']);   
                
        /*循环输出节点*/        
        $url = $doc->createElement("url");//创建节点  
		$loc = $doc->createElement("loc");//创建节点
		$lastmod = $doc->createElement("lastmod");//创建节点
		$urlset->appendChild($url);//
        $url->appendChild($loc);//讲loc放到url下
		$url->appendChild($lastmod );
        $content = $doc -> createTextNode($permalink);//设置标签内容
        $contime = $doc -> createTextNode($created);//设置标签内容
        $loc  -> appendChild($content);//将标签内容赋给标签
		$lastmod  -> appendChild($contime);//将标签内容赋给标签    
        
        }}

        $doc->appendChild($urlset);//创建顶级节点
        $doc->save("./../sitemap.xml");//保存代码
        echo "<script>alert('地图生成')</script>";
}






/** HTML压缩功能 */
function compressHtml($html_source) {
    $chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
    $compress = '';
    foreach ($chunks as $c) {
        if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
            $c = substr($c, 19, strlen($c) - 19 - 20);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
            $c = substr($c, 12, strlen($c) - 12 - 13);
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
            $compress .= $c;
            continue;
        } else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, "\r") !== false || strpos($c, "\n") !== false)) {
            $tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
            $c = '';
            foreach ($tmps as $tmp) {
                if (strpos($tmp, '//') !== false) {
                    if (substr(trim($tmp), 0, 2) == '//') {
                        continue;
                    }
                    $chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
                    $is_quot = $is_apos = false;
                    foreach ($chars as $key => $char) {
                        if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
                            $is_quot = !$is_quot;
                        } else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
                            $is_apos = !$is_apos;
                        } else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
                            $tmp = substr($tmp, 0, $key);
                            break;
                        }
                    }
                }
                $c .= $tmp;
            }
        }
        $c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
        $c = preg_replace('/\\s{2,}/', ' ', $c);
        $c = preg_replace('/>\\s</', '> <', $c);
        $c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
        $c = preg_replace('/<!--[^!]*-->/', '', $c);
        $compress .= $c;
    }
    return $compress;
}

/**
 * 文章内容替换为内链
 * @param $content
 * @return mixed
 */
function get_glo_keywords($content)
{   
	$settings = Helper::options()->Keywordspress;	
	$keywords_list = array();
	if (strpos($settings,'|')) {
			//解析关键词数组
			$kwsets = array_filter(preg_split("/(\r|\n|\r\n)/",$settings));
			foreach ($kwsets as $kwset) {
			$keywords_list[] = explode('|',$kwset);
			}
		}
	ksort($keywords_list);  //对关键词排序，短词排在前面
	
    if($keywords_list){
        $readnum = 0;
		$i = 0;
		$j = 1;
        foreach ($keywords_list as $key => $val) {
			
            $title = $val[$i];
            $len = strlen($title);
            $str = '<a href="'.$val[$j].'" target="_blank">'.$title.'</a>';
            $str_index = mb_strpos($content, $title);            
			$content = preg_replace('/(?!<[^>]*)'.$title.'(?![^<]*>)/',$str,$content,1); 
			
            if(is_numeric($str_index)){
                $readnum += 1;
            }
            if($readnum == 8) {
			return $content; //匹配到8个关键词就退出
			$i += 2;
            $j += 2;
            }
		}
    }
    return $content;
}







/**
 * 加载时间
 * @return bool
 */
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime  = explode( ' ', microtime() );
    $timeend  = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r   = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
    echo $r;
    }
    return $r;
}

