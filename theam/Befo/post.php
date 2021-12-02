<?php if ($this->fields->leipost==1): ?>
<?php $this->need('post/post-p.php'); ?>
<?php else: ?>
<?php $this->need('post/post-w.php'); ?>
<?php endif; ?>
