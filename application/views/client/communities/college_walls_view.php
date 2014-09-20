<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get My Uni</title>

        <!-- Bootstrap -->
        <link href="<?php echo CLIENT_CSS; ?>custom.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>style.css" rel="stylesheet">
        <link href="<?php echo CLIENT_CSS; ?>social-buttons.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo CLIENT_IMAGES; ?>GMU_favicon.png" />
        <link rel="stylesheet" href="<?php echo CLIENT_FONTS; ?>font-awesome/css/font-awesome.min.css">

        <link href="<?php echo CLIENT_CSS; ?>jquery-ui.css" rel="stylesheet">

        <script src="<?php echo ADMIN_SCRIPTS; ?>jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_review_rating_module.js"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_search_module.js"></script>
        <script src="<?php echo CLIENT_MODULES; ?>college_follow_module.js"></script>
        <script src="<?php echo CLIENT_MODULES; ?>client_rating_passcode_module_js.js"></script>
        <script>
            function chk_active(data)
            {
                var data1 = data;
                $(".homesearch_submenu li a").removeClass('active');
                $("#" + data1).addClass("active");
                $("#degree").val(data1);
            }
        </script>
        <script>

            function toggle_visibility(id)
            {
                var e = document.getElementById(id);
                var f = document.getElementById("signup_form_div")
                if (e.style.display == 'block')
                {
                    e.style.display = 'none';
                    f.style.display = 'none';
                }
                else
                {
                    e.style.display = 'block';
                    f.style.display = 'none';
                }
            }

        </script>


        <script type="text/javascript">
            SITE_URL = '<?php echo SITE_URL ?>';
            CLIENT_SIGNUP_LOGIN_VIEW = '<?php echo CLIENT_SIGNUP_LOGIN_VIEW ?>'
            CLIENT_IMAGES = '<?php echo CLIENT_IMAGES ?>';
            CURRENT_URL = '<?php echo current_url() ?>';
            CLIENT_SITE_URL = '<?php echo CLIENT_SITE_URL ?>';
        </script>
    </head>
    <body> 
        <div class="row mb50">
            <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12" id="toggle-walls">
                <div class="newpost">
                    <div class="postaction"> <span class="postt">Post</span> / <span class="upic">Upload Picture</span></div>
                    <form class="newpostform" enctype="multipart/form-data" action="<?= CLIENT_SITE_URL ?>client_forums/wall_discussion_insert/" method="post">
                        <div class="form-group">
                            <textarea name="dname" class="form-control" placeholder="Write Comment" style="resize: none;" required></textarea>
                        </div>
                        <div class="picupl"></div>
                        <input type="hidden" name="school_id" value="<?= $this->uri->segment(4, 0) ?>" />
                        <input type="hidden" name="uriseg" value="<?= $uriseg ?>" />
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
                //$pic = json_decode($discussion["profile_pic"], true);
                //$pic = $pic[0];
                $pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $discussion[0]["profile_pic"]));
                //display($pic);
                ?>

                <div class="row mt30 mb30">
                    <div class="col-md-offset-2 col-sm-10 col-md-10 col-xs-12">
                        <div class="commentbox" >
                            <div class="mb10 default_div">
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
                                <?php $postt = explode('|~~~~~~~~|', stripslashes($discussion['disc'])) ?>
                                <div class="comments text-center"><?= isset($postt[1]) ? "<img src='" . SITE_URL . "uploads/wall_pics/$postt[1]' class='img-responsive' style='margin: 10px auto;' />" : "" ?></div>
                                <div class="comments"><?= $postt[0] ?></div>
                                <?php $comments = json_decode($discussion['comments'], true); ?>
                                <div class="commentactions">
                                    <a href="javascript:void();" class="shwCm<?= $discussion['id'] ?>"> 
                                        <i class="fa fa-comment"></i> <span class="cmNo<?= $discussion['id'] ?>"><?= count($comments) > 0 ? count($comments) : "" ?></span> Comment<?= count($comments) > 1 ? "s" : "" ?></a> - 
                                    <?php $likes = json_decode($discussion['likes'], true); ?>
                                    <a href="javascript:void();" class="<?= in_array(session('client_user_id'), $likes) ? 'unlike' : 'like' ?>" data-did="<?= $discussion['id'] ?>" data-sid="<?= $discussion['school_id'] ?>" > <?= in_array(session('client_user_id'), $likes) ? 'Unlike' : '<i class="fa fa-thumbs-up"> </i> Like' ?>  </a>
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
                                               // $pic = json_decode($udetails[0]["profile_pic"], true);
                                               // $pic = $pic[0];
                                                $pic = stripslashes(str_replace(array("[", "]", "(", ")"), " ", $udetails[0]["profile_pic"]));
                                                ?>

                                                <div class="subcommentbox" id="default_comment_div">

                                                    <div class="row mb10">
                                                        <div class="col-sm-10 col-md-10">
                                                            <div class="profilepic"><img src=<?= $pic ? $pic : CLIENT_IMAGES . "defaultuser.jpg"; ?>></div>
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
                                <input type="text" class="form-control commentInput"  data-sid="<?= $discussion["school_id"] ?>" data-did ="<?= $discussion["id"] ?>" placeholder="Write Comment" />
                            </div>
                        </div>


                    </div>
                </div>

                <?php
            }
            echo $pagination;
        } else {
            echo "<div class='col-md-offset-2 col-sm-10 col-md-10 col-xs-12 mt20 alert alert-info'>No Discussion has been started yet!</div>";
        }
        ?> 
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
<script type="text/javascript" src="<?php echo CLIENT_MODULES ?>client_wall_module.js"></script>
</body>

</html>