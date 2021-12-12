<?php if(!defined('__TYPECHO_ADMIN__')) exit; ?>

<?php
if (isset($post) || isset($page)) {
    $cid = isset($post) ? $post->cid : $page->cid;

    if ($cid) {
        \Widget\Contents\Attachment\Related::alloc(['parentId' => $cid])->to($attachment);
    } else {
        \Widget\Contents\Attachment\Unattached::alloc()->to($attachment);
    }
}
?>

<div id="upload-panel" class="p">
    
    <div class="upload-area" draggable="true">
        拖放文件到这里<br>
        或者<a href="###" class="upload-file">选择文件上传</a><br>
        或者<input placeholder="在这里粘贴" name="pasteInput" id="pasteInput" class="pasteInput">
    </div>
    <ul id="file-list">
    <?php while ($attachment->next()): ?>
        <li class="files-item" data-cid="<?php $attachment->cid(); ?>" data-url="<?php echo $attachment->attachment->url; ?>" data-image="<?php echo $attachment->attachment->isImage ? 1 : 0; ?>"><input type="hidden" name="attachment[]" value="<?php $attachment->cid(); ?>" />
            <div class="left">
                <a class="insert" title="<?php _e('点击插入文件'); ?>" href="###"><?php $attachment->title(); ?></a>
                <div class="info">
                    <?php echo number_format(ceil($attachment->attachment->size / 1024)); ?> Kb
                    <a class="file" target="_blank" href="<?php $options->adminUrl('media.php?cid=' . $attachment->cid); ?>" title="<?php _e('编辑'); ?>"><i class="i-edit"></i></a>
                    <a href="###" class="delete" title="<?php _e('删除'); ?>"><i class="i-delete"></i></a>
                </div>
            </div>
            <?php if ($attachment->attachment->isImage): ?>
            <div class="right">
                <img src="<?php echo $attachment->attachment->url; ?>">
            </div>
            <?php endif; ?>
        </li>
    <?php endwhile; ?>
    </ul>
</div>
<style>
    .files-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .files-item .right img{
        width: 60px;
        height: 40px;
    }
    .pasteInput{
        width: 75px;
        border: 1px solid lightgray
    }
</style>