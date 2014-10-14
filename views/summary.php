<?php
/* @var $panel yii\debug\panels\DbPanel */
?>
<div class="yii-debug-toolbar-block">
    <a href="<?= $panel->getUrl() ?>" title="<?= $active ? "$callCount function calls." : "xhprof wasn't active for this request" ?>.">
        Xhprof <span class="label <?php echo $active ? 'label-success' : '' ?>"><?= $callCount ?></span>
    </a>
    <?php if($active): ?>
        <a href="#" title="Disable xhprof" onclick="document.cookie='_xhprof=1; expires=Thu, 01 Jan 1970 00:00:00 UTC'; return false"">
            <span class="label label-warning">Disable</span>
        </a>
    <?php else: ?>
        <a href="#" title="Enable xhprof" onclick="document.cookie='_xhprof=1'; return false"">
            <span class="label label-success">Enable</span>
        </a>
    <?php endif; ?>
</div>