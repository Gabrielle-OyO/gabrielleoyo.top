<?php

function getcateid($id){  //获取栏目id
   $db = Typecho_Db::get();
   $postnum=$db->fetchRow($db->select()->from ('table.relationships')->where ('cid=?',$id));
   return  $postnum['mid']; 
}

function catename($cateid){  //获取栏目名
   $db = Typecho_Db::get();
   $postnum=$db->fetchRow($db->select()->from ('table.metas')->where ('mid=?',$cateid)->where('type=?', 'category'));
   return  $postnum['name']; 
}




/**
* 阅读统计
* 调用<?php get_post_view($this); ?>
*/
function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    }
    

      echo $exist;
    
}


/**
* 评论者主页链接新窗口打开
* 调用<?php CommentAuthor($comments); ?>
*/
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {    //后两个参数是原生函数自带的，为了保持原生属性，我并没有删除，原版保留
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;    //原生参数，控制输出链接（开关而已）
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;    //原生参数，控制输出链接额外属性（也是开关而已...）
    if ($obj->url && $autoLink) {
        echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
    } else {
        echo $obj->author;
    }
}

