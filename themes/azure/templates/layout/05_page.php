<?php $this->layout('theme::layout/00_layout') ?>
<?php $this->insert('theme::partials/navbar_content', ['params' => $params]); ?>

<div id="content-wrapper" class="container-fluid">
    <div class="row hidden-print">
        <div class="col-md-10 col-md-offset-1 breadcrumbs">
            <a href="<?= $params['base_page'] . $params['index']->getUri(); ?>"><?= $params['title']; ?></a> / <?= $this->get_breadcrumb_title($page, $base_page) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-1 hidden-print">
            <div data-spy="affix" data-offset-top="100">
                <!-- Navigation -->
                <?php
                $rendertree = $tree;
                $path = '';

                if ($page['language'] !== '') {
                    $rendertree = $tree[$page['language']];
                    $path = $page['language'];
                }

                echo $this->get_navigation($rendertree, $path, isset($params['request']) ? $params['request'] : '', $base_page, $params['mode']);
                ?>

                <div class="Links">
                    <?php if (!empty($params['html']['links'])) {
                    ?>
                        <hr/>
                        <?php foreach ($params['html']['links'] as $name => $url) {
                        ?>
                            <a href="<?= $url ?>" target="_blank"><?= $name ?></a>
                            <br />
                        <?php
                        } ?>
                    <?php
                    } ?>

                    <div class="pdf-link">
                        <hr />
                        <a href="[pdf_link]"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Download PDF</span></a>
                    </div>

                    <?php if (!empty($params['html']['twitter'])) {
                    ?>
                        <hr/>
                        <div class="Twitter">
                            <?php foreach ($params['html']['twitter'] as $handle) {
                            ?>
                                <iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:162px; height:20px;" src="https://platform.twitter.com/widgets/follow_button.html?screen_name=<?= $handle; ?>&amp;show_count=false"></iframe>
                                <br />
                                <br />
                            <?php
                            } ?>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?= $this->section('content'); ?>
        </div>
        <div class="col-md-2 hidden-print">
            <div class="article-links" data-spy="affix" data-offset-top="100">
                [article_map]
            </div>
        </div>
    </div>
</div>

<?php $this->insert('theme::partials/footer', ['params' => $params]); ?>