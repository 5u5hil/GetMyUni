<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Forums</h1>
            </div>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($forums as $forum) { ?>
            <?= $i % 2 != 0 ? ' <div class="row">' : '' ?>
            <div class="<?= $i % 2 != 0 ? 'col-md-offset-3' : '' ?> col-sm-4 col-md-4 col-xs-12">
                <div class="forum">
                    <div class="forum_title">
                        <h3><a href="<?= SITE_URL ?>forums/<?= urlclean(strtolower($forum['fname'])) ?>/<?= $forum['id'] ?>/1/"><?= $forum['fname'] ?></a></h3>
                    </div>
                    <div class="forum_detail">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="forum_topic">
                                    <span><?= $forum['topics_cnt'] ?> </span> <i class="fa fa-bars"></i> Topics
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="forum_replies">
                                    <span><?= $forum['replies_cnt'] ?> </span><i class="fa fa-comment-o"></i> Replies
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= ($i % 2 == 0 || $i == count($forums)) ? ' </div>' : '' ?>

            <?php
            $i++;
        }
        ?>
        <?= $pagination ?>
    </div>

    <div class="col-sm-2 sidebar">
			 <?php  $this->load->view(CLIENT_TICKER_VIEW);?>
			 <?php $this->load->view(CLIENT_ADS_VIEW); ?>
           </div>

</div>

<footer>
    <?php $this->load->view(CLIENT_FOOTER); ?>
</footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo CLIENT_MODULES; ?>college_search_module.js"></script>

<script>
    $(document).ready(function() {

        $('.multiselect').multiselect({
            buttonWidth: '100%',
            maxHeight: 300,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterBehavior: 'both'
        });


    });
</script>


</body>
</html>
