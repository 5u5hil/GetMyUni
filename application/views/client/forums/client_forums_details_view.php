<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-7"> 
                <div class="btn btn-sm"><a class="btn_back back_page" onclick="javascript:history.go(-1)" ><i class="fa fa-caret-left col_light_blue"></i> Back</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Forums</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-sm-9 col-md-9 col-xs-12">
                <div class="forum">
                    <div class="forum_title">
                        <h3><?= $forum_details[0]['fname'] ?></h3>
                    </div>
                    <div class="forum_detail">
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_topic">
                                    <span class="f_20"><?= $forum_details[0]['topics_cnt'] ?> </span> <i class="fa fa-lg fa-bars"></i> Topics
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_replies">
                                    <span class="f_20"><?= $forum_details[0]['replies_cnt'] ?> </span><i class="fa fa-lg fa-comment-o"></i> Replies
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3"></div>
                            <div class="col-sm-3 col-md-3">
                                <div class="new_topic mt10">
                                    <a href="#" data-toggle="modal" data-target="#<?= session('client_user_id') ? "myModal" : "myModalLogin" ?>"><i class="fa fa-plus"></i> New Topic</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row mt50">
            <div class="col-md-offset-3 col-sm-9 col-md-9 col-xs-12">
                <?php
                if ($topics) {
                    foreach ($topics as $topic) {
                        $followerz = json_decode($topic['followers'], true);
                        ?>
                        <div class="thread">
                            <h4 class="tcol_darkblue"><a href="<?= SITE_URL ?>forums/<?= urlclean(strtolower($topic['topic'])) ?>/<?= $topic['forum_id'] ?>/<?= $topic['id'] ?>/1/"> <?= $topic['topic'] ?> </a>  </h4>
                            <div class="row tcol_grey">
                                <div class="col-sm-3 col-md-3">
                                    <i class="fa fa-comment-o"></i> <?= $topic['replies_cnt'] ?>  Replies
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <i class="fa fa-hand-o-right"></i> <span class="fno<?= $topic['id'] ?>"><?= count($followerz); ?></span>  Followers
                                </div>
                                <div class="col-sm-1 col-md-1">
                                </div>
                                <div class="col-sm-5 col-md-5 text-right">
                                    <i class="fa fa-clock-o"></i> <?= date_time_diff($topic['updated_at']) ?>  
                                    <div class="new_topic mt0">
                                        <a href="javascript:void();" class="<?= in_array(session('client_user_id'), $followerz) ? 'unfollowNow' : 'followNow' ?>" data-fid="<?= $topic['forum_id'] ?>" data-tid="<?= $topic['id'] ?>" ><i class="fa fa-hand-o-right"></i> <?= in_array(session('client_user_id'), $followerz) ? 'Unfollow' : 'Follow' ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='alert alert-info mtm50'>No discussion threads have yet been started…Go ahead, start one</div>";
                }
                ?>  
                <div class="new_topic mt20">
                    <a href="#" data-toggle="modal" data-target="#<?= session('client_user_id') ? "myModal" : "myModalLogin" ?>"><i class="fa fa-plus"></i> New Topic</a>
                </div>
                <?= $pagination ?>
            </div>
        </div>
    </div>

    <div class="col-sm-2 sidebar">
        <?php $this->load->view(CLIENT_TICKER_VIEW); ?>
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
                    var user_id = "<?= session('client_user_id') ?>";
</script>
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
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_forum_module.js"></script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="tcol_darkblue mb20"> Start a New Topic </h2>
            </div>
            <form action="<?= CLIENT_SITE_URL ?>client_forums/topic_insert/" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" value="" id="tname" name="tname" data-helper="" class="form-control " data-progression="" placeholder="New Topic" required/>
                        </div>
                    </div>
                    <input type="hidden" name="forum_id" value="<?= $forum_details[0]['id'] ?>" />
                    <input type="hidden" name="uriseg" value="<?= $this->uri->segment(2, 0) ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLogin" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Login with one of the below options</h4>
            </div> 
            <div class="modal-body">
                <?php $this->load->view(CLIENT_USER_POPUP_VIEW); ?> 
            </div>
        </div> 
    </div>
</div> 

</body>
</html>
