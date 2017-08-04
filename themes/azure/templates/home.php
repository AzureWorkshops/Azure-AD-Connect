<?php $this->layout('theme::layout/00_layout') ?>
<?php $this->insert('theme::partials/navbar_content', ['params' => $params]); ?>

<div id="content-wrapper" class="container-fluid">
    <div class="container">
        <div class="home row">
            <div class="col-md-12">
                <?php if ($params['title']) {
                    echo '<h1 class="home">' . $params['title'] . '</h1>';
                } ?>
                <?php if ($params['html']['date_modified']) { ?>
                    <div class="home date"> <?= date("l, F j, Y g:i A", $page['modified_time']); ?></div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <hr />
                <div class="hidden-print">
                    <?php
                        foreach ($page['entry_page'] as $key => $node) {
                            echo '<a href="' . $node . '" class="home-button"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span>' . $key . '</span></a>';
                        }
                        if(isset($params['html']['buttons']) && is_array($params['html']['buttons'])) {
                            foreach ($params['html']['buttons'] as $button ) {
                                echo '<a href="' . $button['url'] . '" class="home-button"><i class="fa ' . $button['icon'] . '" aria-hidden="true"></i> <span>' . $button['name'] . '</span></a>';
                            }
                        }
                    ?>
                    <a href="[pdf_link]" class="home-button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Download PDF</span></a>
                    <?php    
                        if ($params['html']['repo']) {
                            echo '<a href="https://github.com/' . $params['html']['repo'] . '" class="Button Button--secondary Button--hero">View On GitHub</a>';
                        }
                    ?>
                    <hr />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copy">
                    <?php
                        if ($params['lead']) {
                            echo '<p class="home lead">' . $params['lead'] . '</p>';
                        }

                        if ($params['description']) {
                            echo '<p class="home desc">' . $params['description'] . '</p>';
                        }
                    ?>
                    <div class="row">
                        <?php
                            if ($params['learn']) {
                                echo '<div class="col-md-6"><h4>What You Will Learn</h4><ul>';
                                foreach ($params['learn'] as $learn) {
                                    echo '<li>' . $learn . '</li>';
                                }
                                echo '</ul></div>';
                            }
                        
                            if ($params['audience']) {
                                echo '<div class="col-md-6"><h4>Ideal Audience</h4><ul>';
                                foreach ($params['audience'] as $audience) {
                                    echo '<li>' . $audience . '</li>';
                                }
                                echo '</ul></div>';
                            }
                        ?>
                    </div>
                    <?= $page['content']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->insert('theme::partials/footer', ['params' => $params]); ?>