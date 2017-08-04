<?php $this->layout('theme::layout/05_page') ?>
<article class="Page">
    <div class="pageHeader">
        <h1><?= $page['title'] ?></h1>
        <?php if ($params['html']['date_modified']) { ?>
            <div class="date"> <?= date("l, F j, Y g:i A", $page['modified_time']); ?></div>
        <?php } ?>
    </div>
    <div class="copy">
        <?= $page['content']; ?>
    </div>

    <?php
    $buttons = (!empty($page['prev']) || !empty($page['next']));
    $has_option = array_key_exists('jump_buttons', $params['html']);
    if ($buttons && (($has_option && $params['html']['jump_buttons']) || !$has_option)) {
    ?>
        <nav class="hidden-print">
            <ul class="pager">
                <?php if (!empty($page['prev'])) {
                ?>
                    <li class=pager-prev><a href="<?= $base_url . $page['prev']->getUrl() ?>">Previous</a></li>
                <?php
                } ?>
                <?php if (!empty($page['next'])) {
                ?>
                    <li class=pager-next><a href="<?= $base_url . $page['next']->getUrl() ?>">Next</a></li><?php
                } ?>
            </ul>
        </nav>
    <?php
    } ?>
</article>
