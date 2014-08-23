<?php $this->load->view(CLIENT_HEADER); ?>
<div class="row container-fluid">
    <div class="col-sm-10 col-md-10 col-xs-12">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="page_title">Communities</h1>
            </div>
            <div class="col-sm-4">
                <div class="create_communities_but mt30" data-toggle="modal" data-target="#<?= session('client_user_id') ? "myModal" : "myModalLogin" ?>"><a href="javascript:void();"><i class="fa fa-plus"></i> Create Communities</a></div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close pull-right" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title tcol_darkblue mb30" id="myModalLabel">Create Community</h3>
                        <form enctype="multipart/form-data" class="form-horizontal" action="<?= CLIENT_SITE_URL ?>client_communities/community_insert/" method="post" >
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="cname" placeholder="Type Name" required/>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                   <label for="name" class="col-sm-3 control-label"></label>
                                   <div class="col-sm-5">
                                       <div class="invite_members"> <a href="#">Invite Members </a></div>
                                   </div>
                               </div> -->

                            <div class="form-group">
                                <label for="uploadphoto" class="col-sm-3 control-label"></label>
                                <div class="col-sm-5">
                                    <input type="file" id="uploadphoto" placeholder="Type name" name="file" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="shortdesc" class="col-sm-3 control-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="desc" required> </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-8 col-sm-4">
                                    <input type="submit" value="Create" class="home_search_button">
                                    <input type="button" value="Cancel" class="btn btn-default">
                                </div>
                            </div>
                        </form>

                    </div>



                </div>
            </div>
        </div>

        <div class="row mt50">

            <?php foreach ($communities as $community) { ?>
                <a href="<?= SITE_URL . "communities/" . urlclean(strtolower($community["cname"])) . "/" . $community["id"] . "/" ?>">  <div class="community col-sm-3 col-md-3 col-xs-6 pull-left mb30">
                        <img src="<?= $community["pic"] != '' ? SITE_URL . 'uploads/comm_pics/' . $community["pic"] : CLIENT_IMAGES . "default_community.jpg" ?>" class="communityimg img-responsive">
                        <h3 class="tcol_darkblue"><?= $community["cname"] ?></h3>
                        <h4 class="tcol_darkblue"> Members : <?= count(json_decode($community["members"], true)) ?></h4>
                        <h4 class="tcol_darkblue"> Created: <?= date("d M y", strtotime($community["added_at"])) ?></h4>
                    </div> 
                </a>
            <?php } ?>


        </div>

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

