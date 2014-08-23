
<?php $this->load->view(CLIENT_HEADER); ?>
<?php
//  display($this->session->all_userdata());
//display($user_data);
?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page_title">Forums</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                <div class="forum">
                    <div class="forum_title">
                        <h3>Thread Name</h3>
                    </div>
                    <div class="forum_detail">
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_topic">
                                    <span class="f_20">456 </span> <i class="fa fa-lg fa-reply"></i> Replies
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="forum_replies">
                                    <span class="f_20">4564 </span><i class="fa fa-lg fa-bars"></i> Followers
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="new_topic pull-right">
                                    <a href="#" > share</a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <div class="new_topic">
                                    <a href="#" > Follow</a>
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
                    <form class="newpostform">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Write Comment" />
                        </div>
                        <div class="text-right">
                            <input type="Submit" Value="Post" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt30">
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                <div class="commentbox">
                    <div class="mb10">
                        <div class="profilepic"><img src="<?php echo CLIENT_IMAGES; ?>defaultuser.jpg"></div>
                        <div class="tcol_blue f_18"> Arati</div> 
                        <div class="tcol_grey"> <i class="fa fa-clock-o"> </i> 1:57</div>
                    </div>
                    <div class="comments">what is the exact eligibility criteria for TISS MA in HRM?</div>
                    <div class="commentactions">
                        <a href="#"> <i class="fa fa-comment"> </i> Comment</a> - <a href="#"> <i class="fa fa-thumbs-up"> </i> Like</a> 
                    </div>
                    <input type="text" class="form-control" placeholder="Write Comment" />
                </div>
            </div>
        </div>

        <div class="row mt30 mb30">
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                <div class="commentbox">
                    <div class="mb10">
                        <div class="mb10">
                            <div class="profilepic"><img src="<?php echo CLIENT_IMAGES; ?>defaultuser.jpg"></div>
                            <div class="tcol_blue f_18"> Arati</div>
                            <div class="tcol_grey"> <i class="fa fa-clock-o"> </i> 1:57</div>
                        </div>
                        <div class="comments">what is the exact eligibility criteria for TISS MA in HRM?</div>
                        <div class="commentactions">
                            <a href="#"> <i class="fa fa-comment"> </i> Comment</a> - <a href="#"> <i class="fa fa-thumbs-up"> </i> Like</a> 
                        </div>
                    </div>  

                    <div class="row subsection">
                        <div class="subcomment">
                            <div class="subcommentbox">
                                <div class="mb10">
                                    <div class="profilepic"><img src="<?php echo CLIENT_IMAGES; ?>defaultuser.jpg"></div>
                                    <div class="tcol_blue f_16"> Arati</div>
                                    <div class="tcol_grey f_12"> <i class="fa fa-clock-o"> </i> 1:57</div>
                                </div>
                                <div class="subcomments">what is the exact eligibility criteria for TISS MA in HRM?</div>


                            </div>  
                        </div>
                        <div class="subcomment">
                            <div class="subcommentbox">
                                <div class="mb10">
                                    <div class="profilepic"><img src="<?php echo CLIENT_IMAGES; ?>defaultuser.jpg"></div>
                                    <div class="tcol_blue f_16"> Arati</div>
                                    <div class="tcol_grey f_12"> <i class="fa fa-clock-o"> </i> 1:57</div>
                                </div>
                                <div class="subcomments">what is the exact eligibility criteria for TISS MA in HRM?</div>


                            </div>
                        </div> 
                    </div>
                    <div class="mt10">
                        <input type="text" class="form-control" placeholder="Write Comment" />
                    </div>
                </div>


            </div>
        </div>


    </div>

    <div class="col-sm-2 sidebar">
        <img src="<?php echo CLIENT_IMAGES; ?>ticker.jpg" class="mt20 img-responsive">
        <img src="<?php echo CLIENT_IMAGES; ?>adspace.jpg" class="mt10 img-responsive">
        <img src="<?php echo CLIENT_IMAGES; ?>adspace2.jpg" class="mt10 img-responsive">
        <img src="<?php echo CLIENT_IMAGES; ?>adspace4.jpg" class="mt10 img-responsive">

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
<link href="<?php echo CLIENT_CSS; ?>bootstrap_hexagone.css" rel="stylesheet">
<script src="<?php echo CLIENT_SCRIPTS; ?>bootstrap-multiselect.js"></script>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_user_module_js.js"></script>


</body>
</html>
<script src="<?php echo CLIENT_SCRIPTS; ?>jquery-ui.min.js"></script>
<script src="<?php echo ADMIN_SCRIPTS; ?>plugins/plupload.full.min.js" type="text/javascript"></script>

