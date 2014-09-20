
<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>


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
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                <div class="forum">
                    <div class="forum_title">
                        <h3><?= $topic_details[0]['topic'] ?></h3>
                    </div>
                    <div class="forum_detail">
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_topic">
                                    <span class="f_20"><?= $topic_details[0]['replies_cnt'] ?></span> <i class="fa fa-lg fa-reply"></i> Replies
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_replies">
                                    <?php $followerz = json_decode($topic_details[0]['followers'], true); ?>
                                    <span class="f_20 fno<?= $topic_details[0]['id'] ?>"><?= count($followerz); ?> </span><i class="fa fa-lg fa-bars"></i> Followers
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class=" mt10 pull-right">
                                    <span class='st_sharethis_large' displayText='ShareThis'></span>
                                    <script type="text/javascript">var switchTo5x = true;</script>
                                    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                    <script type="text/javascript">stLight.options({publisher: "51ac1de5-3198-4417-b1b5-1279597b1231", onhover: false, doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="new_topic mt10">
                                    <a href="javascript:void();" class="<?= in_array(session('client_user_id'), $followerz) ? 'unfollowNow' : 'followNow' ?>" data-fid="<?= $topic_details[0]['forum_id'] ?>" data-tid="<?= $topic_details[0]['id'] ?>" ><i class="fa fa-hand-o-right"></i> <?= in_array(session('client_user_id'), $followerz) ? 'Unfollow' : 'Follow' ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                <div class="newpost">
                    <div class="postaction"> Post</div>
                    <form class="newpostform" action="<?= CLIENT_SITE_URL ?>client_forums/discussion_insert/" method="post">
                        <div class="form-group">
                            <input type="text" name="dname" class="form-control" placeholder="Write Comment" required/>
                        </div>
                        <input type="hidden" name="forum_id" value="<?= $topic_details[0]['forum_id'] ?>" />
                        <input type="hidden" name="id" value="<?= $topic_details[0]['id'] ?>" />
                        <input type="hidden" name="uriseg" value="<?= $this->uri->segment(2, 0) ?>" />
                        <div class="text-right">
                            <input type="Submit" Value="Post" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if ($discussions) {
            foreach ($discussions as $discussion) {
               // $pic = json_decode($discussion["profile_pic"], true);
                //$pic = $pic[0];
                $pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $discussion["profile_pic"]));
                ?>

                <div class="row mt30 mb30">
                    <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                        <div class="commentbox" >
                            <div class="mb10 default_div" >
                                <div class="mb10">
                                    <div class="col-sm-9 col-md-9">
                                        <div class="profilepic"><img src=<?= $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg"; ?>></div>
                                        <div class="tcol_blue f_18"><?= $discussion['name'] ?></div>
                                        <div class="tcol_grey"> <i class="fa fa-clock-o"> </i><?= date_time_diff($discussion['updated_at']) ?> </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3">
                                        <div class="pull-left tcol_grey"><i class="fa fa-calendar"></i> <?= date("j M Y", strtotime($discussion['updated_at'])) ?> </div>
                                        <div class="pull-right">
                                            <i class="fa fa-caret-square-o-down dropdown-toggle tcol_darkblue hidden_div" data-toggle="dropdown" ></i>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="javascript:void();" class="dspam" data-did="<?= $discussion['id'] ?>"> <i class="fa fa-warning"></i> Spam</a></li>
                                                <?php if (session('is_admin') && session('client_user_id')) { ?>   <li><a href="javascript:void();" class="ddel" data-did="<?= $discussion['id'] ?>"><i class="fa fa-trash-o"></i> Delete</a></li> <?php } ?>       
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="comments"><?= $discussion['disc'] ?></div>
                                <?php $comments = json_decode($discussion['comments'], true); ?>
                                <div class="commentactions">
                                    <a href="javascript:void();" class="shwCm<?= $discussion['id'] ?>"> 
                                        <i class="fa fa-comment"></i> <span class="cmNo<?= $discussion['id'] ?>"><?= count($comments) > 0 ? count($comments) : "" ?></span> Comment<?= count($comments) > 1 ? "s" : "" ?></a> - 
                                    <?php $likes = json_decode($discussion['likes'], true); ?>
                                    <a href="javascript:void();" class="<?= in_array(session('client_user_id'), $likes) ? 'unlike' : 'like' ?>" data-did="<?= $discussion['id'] ?>" data-tid="<?= $topic_details[0]['id'] ?>" data-fid="<?= $topic_details[0]['forum_id'] ?>" > <?= in_array(session('client_user_id'), $likes) ? 'Unlike' : '<i class="fa fa-thumbs-up"> </i> Like' ?>  </a>
                                </div>
                            </div>  

                            <div class="row subsection d<?= $discussion['id'] ?>">
                                <div class="subcomment">
                                    <div class="subCB" id="shwCm<?= $discussion['id'] ?>">
                                        <?php
                                        if (!empty($comments)) {

                                            foreach ($comments as $comment) {
                                                $udetails = get_user_details($comment["uid"]);
                                                $name = $udetails[0]["name"];
                                                $pic = json_decode($udetails[0]["profile_pic"], true);
                                                $pic = $pic[0];
                                                ?>

                                                <div class="subcommentbox default_comment_div" >

                                                    <div class="row mb10">
                                                        <div class="col-sm-10 col-md-10">
                                                            <div class="profilepic"><img src="<?= $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg"; ?>"></div>
                                                            <div class="tcol_blue f_16"><?= $name ?></div>
                                                            <div class="tcol_grey f_12"> <i class="fa fa-clock-o"> </i> <?= date_time_diff($comment['time']) ?></div>
                                                            <div class="subcomments"><?= $comment['comment'] ?></div>
                                                        </div>
                                                        <div class="col-sm-2 col-md-2">
                                                            <div class="pull-right">
                                                                <i class="fa fa-caret-square-o-down dropdown-toggle tcol_darkblue " data-toggle="dropdown"  class="hidden_comment_div"></i>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="javascript:void();" class="cspam" data-did="<?= $discussion['id'] ?>" data-cid="<?= $comment['cid'] ?>"> <i class="fa fa-warning"></i> Spam</a></li>
                                                                    <?php if (session('is_admin') && session('client_user_id')) { ?>   <li><a href="javascript:void();" class="cdel" data-did="<?= $discussion['id'] ?>" data-cid="<?= $comment['cid'] ?>"><i class="fa fa-trash-o"></i> Delete</a></li> <?php } ?>       
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>  

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt10">
                                <input type="text" class="form-control commentInput" data-tid="<?= $topic_details[0]['id'] ?>" data-fid="<?= $topic_details[0]['forum_id'] ?>" data-did ="<?= $discussion["id"] ?>" placeholder="Write Comment" />
                            </div>
                        </div>


                    </div>
                </div>

                <?php
            }
            echo $pagination;
        } else {
            echo "<div class='col-md-offset-2 col-sm-10 col-md-10 col-xs-12 mt20 alert alert-info'>No discussion threads have yet been started…Go ahead, start one!</div>";
        }
        ?>  
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
<div class="modal fade" id="mySpam" tabindex="-1" role="dialog" aria-labelledby="mySpam" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="text-center text-danger"><h4>Are you sure you want to report Spam? </h4> </div>
                <div class="text-center mt30"><button value="0" class="btn btn-primary">Report</button> <button value="1" class="btn btn-danger">Not Now</button> </div>
            </div>
        </div> 
    </div>
</div> 

<div class="modal fade" id="myCSpam" tabindex="-1" role="dialog" aria-labelledby="myCSpam" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="text-center text-danger"><h4>Are you sure you want to report Spam? </h4></div>
                <div class="text-center mt30"><button value="0" class="btn btn-primary">Report</button> <button value="1" class="btn btn-danger">Not Now</button> </div>
            </div>
        </div> 
    </div>
</div> 

<div class="modal fade" id="myDel" tabindex="-1" role="dialog" aria-labelledby="myDel" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                <div class="text-center text-danger"><h4> Are you sure you want to report Spam? </h4></div>
                <div class="text-center mt30"><button class="btn btn-primary" value="0">Delete</button> <button value="1" class="btn btn-danger">Not Now</button> </div>
            </div>
        </div> 
    </div>
</div> 

<div class="modal fade" id="myCDel" tabindex="-1" role="dialog" aria-labelledby="myCDel" aria-hidden="true"> 
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="text-center text-danger"><h4>Are you sure you want to report Spam?</h4></div>
                <div class="text-center mt30"><button  class="btn btn-primary" value="0">Delete</button> <button class="btn btn-danger" value="1">Not Now</button> </div>
            </div>
        </div> 
    </div>
</div> 

<script>
    var user_id = "<?= session('client_user_id') ?>";
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery.min.js"></script>
<script type="text/javascript" language="javascript" >

    $(document).ready(function() {


        $('.hidden_div').hide();
        $('.hidden_comment_div').hide();

    });

    $('.default_div').hover(function() {

        $(this).find('.hidden_div').show();

    });


    $('.default_div').on("mouseleave", function() {

        $(this).find('.hidden_div').hide();

    });

    $('.default_comment_div').hover(function() {

        $(this).find('.hidden_comment_div').show();

    });


    $('.default_comment_div').on("mouseleave", function() {

        $(this).find('.hidden_comment_div').hide();

    });


</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap.min.js"></script>
<link href="<?php echo CLIENT_CSS; ?>bootstrap-multiselect.css" rel="stylesheet">
<link href="<?php echo CLIENT_CSS; ?>bootstrap_hexagone.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script>


</body>
</html>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_forum_module.js"></script>

